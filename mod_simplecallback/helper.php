<?php
/**
* Helper class for Simple Callback module
*
* @link http://startler.ru/joomla/
* @license        GNU/GPL, see LICENSE.php
* mod_simplecallback is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
class modSimpleCallbackHelper
{
    public static function getAjax()
    {
        jimport('joomla.application.module.helper');
        $config = JFactory::getConfig();
        $app = JFactory::getApplication();
        $input = JFactory::getApplication()->input;
        $data = $input->post->getArray();
        $session = JFactory::getSession();
        $domainsite = str_replace('http', '', JURI::base());
        $domainsite = str_replace(':', '', $domainsite);
        $domainsite = str_replace('/', '', $domainsite);
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select($db->quoteName(array('id', 'title', 'params')));
        $query->from($db->quoteName('#__modules'));
        $query->where($db->quoteName('id') . '='. $data['module_id']);
        $db->setQuery($query);
        $module = $db->loadObject();
        $params = new JRegistry();
        $params->loadString($module->params);
        
        //CAPTCHA
        $captcha_enabled = $params->get('simplecallback_captcha', 0);
        
        if ($captcha_enabled === "1") {
            if ($session->get('module-'.$module->id) != $data['simplecallback_captcha']) {
                echo json_encode(array(
                'success' => false,
                'error' => true,
                'message' => $params->get('simplacallback_captcha_error_msg', JText::_( 'MOD_SIMPLECALLBACK_CAPTCHA_MSG_ERROR_DEFAULT' ))
                ));
                die();
            } else {
                $session->clear('module-'.$module->id);
            }
        }
        
        //Token check
        $session->checkToken() or die( 'Invalid Token' );
        
        // Load language
        $app->getLanguage()->load('mod_simplecallback');
        // Set Email params
        
        //Not using this 2 params at moment, but maybe in future
        $sender = $params->get('simplecallback_mailsender');
        $fromname = $params->get('simplecallback_emailfrom');
        
        $honeypot = strip_tags($data['simplecallback_username']);
        
        if (!empty($honeypot)) {
            die("GTFO");
        }
        
        $recipients_array = explode(";", $params->get('simplecallback_emails'));
        $recipients = !empty($recipients_array) && !empty($recipients_array[0]) ? $recipients_array : array($config->get('mailfrom'), $config->get('fromname'));
        $subject = $params->get('simplecallback_email_subject');
        $client_ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
        $phone = strip_tags($data['simplecallback_phone']);
        $name = strip_tags($data['simplecallback_name']);
        $message = strip_tags($data['simplecallback_message']);
        $page_title = strip_tags($data['simplecallback_page_title']);
        $custom_data = strip_tags($data['simplecallback_custom_data']);
        $simplecallback_city_field_label = strip_tags($data['simplecallback_city_field_label']);
        $simplecallback_city_field_labe2 = strip_tags($data['simplecallback_city_field_labe2']);
        $simplecallback_city_field_labe3 = strip_tags($data['simplecallback_city_field_labe3']);
        $page_url = strip_tags($data['simplecallback_page_url']);
        $body = "\n";
        if(!empty($name)) :     $body .= "" . $params->get('simplecallback_name_field_label') . ": " . $name; endif;
        if(!empty($phone)) :    $body .= "\nTel: " . $phone; endif;
        if(!empty($message)) :  $body .= "\n" . $params->get('simplecallback_message_field_label') . ": " . $message; endif;
        if(!empty($custom_data)) :  $body .= "\n" . JText::_( 'MOD_SIMPLECALLBACK_CUSTOM_DATA_LABEL' ) . ": " . $custom_data;  endif;
        if(!empty($simplecallback_city_field_label)) :  $body .= " | " .  $simplecallback_city_field_label;  endif;
        if(!empty($simplecallback_city_field_labe2)) :  $body .= " | " .  $simplecallback_city_field_labe2;  endif;
        if(!empty($simplecallback_city_field_labe3)) :  $body .= " | " .  $simplecallback_city_field_labe3;  endif;
        $smsru_enable = $params->get('simplecallback_smsru_enable');
        $smsru_translit = $params->get('simplecallback_smsru_translit');
        $smsru_test = $params->get('simplecallback_smsru_test');
        $smsru_api_id = $params->get('simplecallback_smsru_api_id');
        $smsru_phone = $params->get('simplecallback_smsru_phone');
        $body .= " | " . date('d.m.Y H:i');
        $body .= " | " . $domainsite;
        // Prepare and send Email
        $mail = JFactory::getMailer();
        $mail->addRecipient($recipients);
        
        if (!empty($sender)) {
            $mail->setSender(array($sender, $fromname));
        } else {
            $sender = array(
            $config->get( 'mailfrom' ),
            $config->get( 'fromname' )
            );
            
            $mail->setSender($sender);
        }
        
        $mail->setSubject($subject);
        $mail->setBody($body);
        $sent = $mail->Send();
        //debug :) $sent = true;
        
        if (JComponentHelper::isEnabled('com_simplecallback', true)) {
            $db_message = new stdClass();
            $db_message->name = $name;
            $db_message->phone = $phone;
            $db_message->message= $message;
            $db_message->ip = $client_ip;
            $db_message->page = $page_url;
            $db_message->custom = $custom_data;
            $db_message->created = JFactory::getDate()->toSql();
            $db_message->updated = $db_message->created;
            
            $db_result = JFactory::getDbo()->insertObject('#__simplecallback_messages', $db_message);
        }
        
        if (true == $sent) {
            //SMS.RU SEND
            if ($smsru_enable === '1' && !empty($smsru_api_id)) {
                if (($smsru_translit  === '1')) { $smsru_translit = '&translit=1'; }
                else {$smsru_translit = '';}
                if (($smsru_test  === '1')) { $smsru_test = '&test=1'; }
                else {$smsru_test = '';}
                $smsru_text = urlencode($subject . ' ' . $name . ' ' . $phone. ' ' . $simplecallback_city_field_label. ' ' . $simplecallback_city_field_labe2. ' ' . $simplecallback_city_field_labe3);
                $smsru_request_url = 'http://sms.ru/sms/send?api_id=' . $smsru_api_id . '&to=' . $smsru_phone . '&text=' . $smsru_text. '&partner_id=133224'.$smsru_translit.$smsru_test;
                $smsru_result = file_get_contents($smsru_request_url);
            }
            
            echo json_encode(array(
            'success' => true,
            'error' => false,
            'message' => $params->get('simplacallback_ajax_success_msg', JText::_( 'MOD_SIMPLECALLBACK_AJAX_MSG_SUCCESS_DEFAULT' ))
            ));
            die();
        } else {
            echo json_encode(array(
            'success' => false,
            'error' => true,
            'message' => $params->get('simplacallback_ajax_error_msg', JText::_( 'MOD_SIMPLECALLBACK_AJAX_MSG_ERROR_DEFAULT' ))
            ));
            die();
        }
    }
}
?>