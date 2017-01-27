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
        // jimport('joomla.filesystem.folder');
        // jimport('joomla.filesystem.file'); 
        $config = JFactory::getConfig();
        $app = JFactory::getApplication();
        $input = JFactory::getApplication()->input;
        $file = $input->files->get('simplecallback_file'); 
        $data = $input->post->getArray();
        $session = JFactory::getSession();
        $domainsite = str_replace('https', '', JURI::base());
        $domainsite = str_replace('http', '', $domainsite);
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
        
        //Token check
        $session->checkToken() or die( 'Invalid Token' );
        
        // Load language
        $app->getLanguage()->load('mod_simplecallback');

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
        $emailclient = strip_tags($data['simplecallback_emailclient']);
        $recaptcha_enabled = $params->get('simplecallback_recaptcha_enabled', 0);
        $message = strip_tags($data['simplecallback_message']);
        $page_title = strip_tags($data['simplecallback_page_title']);
        $custom_data = strip_tags($data['simplecallback_custom_data']);
        $reviewStars = strip_tags($data['reviewStars']);
        $rating_enabled = $params->get('simplecallback_rating_enabled', 0);
        $simplecallback_city_field_label = strip_tags($data['simplecallback_city_field_label']);
        $simplecallback_city_field_labe2 = strip_tags($data['simplecallback_city_field_labe2']);
        $simplecallback_city_field_labe3 = strip_tags($data['simplecallback_city_field_labe3']);
        $page_url = strip_tags($data['simplecallback_page_url']);
        $body = "\n";
        if(!empty($name)) :     $body .= "\n". $params->get('simplecallback_name_field_label') . ": "  . $name; endif;
        if(!empty($phone)) :    $body .= "\n". $params->get('simplecallback_phone_field_label') . ": "  . $phone; endif;
        if(!empty($emailclient)) :    $body .= "\nEmail: " . $emailclient; endif;
        if(!empty($custom_data)) :  $body .= "\n" . JText::_( 'MOD_SIMPLECALLBACK_CUSTOM_DATA_LABEL' ) . ": " . $custom_data;  endif;
        if(!empty($simplecallback_city_field_label)) :  $body .= "\nCity: " .  $simplecallback_city_field_label;  endif;
        if(!empty($simplecallback_city_field_labe2)) :  $body .= "\n" .  $simplecallback_city_field_labe2;  endif;
        if(!empty($simplecallback_city_field_labe3)) :  $body .= "\n" .  $simplecallback_city_field_labe3;  endif;
        if(!empty($rating_enabled)) :  $body .= "\n" . $params->get('simplecallback_rating_field_label') . ": " . $reviewStars; endif;
        if(!empty($message)) :  $body .= "\n" . $params->get('simplecallback_message_field_label') . ": " . $message; endif;
        $smsru_enable = $params->get('simplecallback_smsru_enable');
        $telegram_enabled = $params->get('simplecallback_telegram_enabled');
        $pushall_enabled = $params->get('simplecallback_pushall_enabled');
        $trello_enabled = $params->get('simplecallback_trello_enabled');
        $mail_enabled = $params->get('simplecallback_mail_enabled');
        $slack_enabled = $params->get('simplecallback_slack_enabled');
        $smsru_translit = $params->get('simplecallback_smsru_translit');
        $smsru_test = $params->get('simplecallback_smsru_test');
        $smsru_api_id = $params->get('simplecallback_smsru_api_id');
        $telegram_chat_id = $params->get('simplecallback_telegram_chat_id');
        $pushall_id = $params->get('simplecallback_pushall_id');
        $pushall_key = $params->get('simplecallback_pushall_key');
        $smsru_phone = $params->get('simplecallback_smsru_phone');
        $slack_webhookurl = $params->get('simplecallback_slack_webhookurl');
        $trello_key = $params->get('simplecallback_trello_key');
        $trello_token = $params->get('simplecallback_trello_token');
        $trello_idlist = $params->get('simplecallback_trello_idlist');
        $slack_username = $params->get('simplecallback_slack_username','SimpleCallbackBot');
        $slack_icon_emoji = $params->get('simplecallback_slack_icon_emoji',':rabbit:');
        $datemsg = date('d.m.Y H:i');
        $body .= "\n" .  date('d.m.Y H:i');
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


        if (!empty($file['tmp_name']))
        {
            $mail->addAttachment($file['tmp_name'], $file['name']);  
        }


        $mail->setSubject($subject);

        // $mail->IsHTML( true );

        $mail->setBody($body);

if ( trim( $input->getString( 'g-recaptcha-response' ) ) === '' && $recaptcha_enabled == 1) {
   echo json_encode(array(
            'success' => false,
            'error' => true,
            'message' => $params->get('simplacallback_ajax_error_captcha_msg', JText::_( 'MOD_SIMPLECALLBACK_AJAX_MSG_ERROR_DEFAULT' ))
            ));
            die();
} else {

        if($mail_enabled === '1'){
            $sent = true;
        } else {
           $sent = $mail->Send();
        }

}

     // $sent = true;

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
                $smsru_text = urlencode($datemsg . " - " . $subject . " "  . $name . "  " . $emailclient . " - " . $phone. " - " . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . " " . $message);
                $smsru_request_url = 'http://sms.ru/sms/send?api_id=' . $smsru_api_id . '&to=' . $smsru_phone . '&text=' . $smsru_text. '&partner_id=133224'.$smsru_translit.$smsru_test;
                $smsru_result = file_get_contents($smsru_request_url);
            }

            if ($telegram_enabled === '1' && !empty($telegram_chat_id)) {
                $telegram_text = urlencode($datemsg . "\n" . $subject . "\n" .  $name . "\n" . $emailclient . "\n" . $phone. "\n" . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . "\n" . $message);
                $telegram_request_url = 'https://telegram.cb9t.ru/modsimplecallbackbot/fromweb.php?chatid=' . $telegram_chat_id . '&text=' . $telegram_text;
                $telegram_result = file_get_contents($telegram_request_url);
            }

            if ($pushall_enabled === '1' && !empty($pushall_id)) {
                $pushall_text = urlencode($datemsg . "\n" . $subject . "\n" .  $name . "\n" . $emailclient . "\n" . $phone. "\n" . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . "\n" . $message);
                $pushall_request_url = 'https://pushall.ru/api.php?type=self&id='. $pushall_id .'&key='. $pushall_key .'&title=' . $subject . '&text=' . $pushall_text;
                $pushall_result = file_get_contents($pushall_request_url);
            }

            if ($slack_enabled === '1' && !empty($slack_webhookurl)) {
                $slack_webhookurl = str_replace('https://hooks.slack.com/services/','',$slack_webhookurl);
                $url = "https://hooks.slack.com/services/".$slack_webhookurl;
                $ch = curl_init();
                $payload = array(
                    'username'  =>  $slack_username,
                    'icon_emoji'  =>  $slack_icon_emoji,
                    'text'  =>  $datemsg . PHP_EOL . $subject . PHP_EOL .  $name . PHP_EOL . $emailclient . PHP_EOL . $phone. PHP_EOL . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . PHP_EOL . $message.'----------------------',
                );
                $jsonDataEncoded = json_encode($payload);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERAGENT, 'joomla-bot');
                curl_setopt($ch, CURLOPT_TIMEOUT, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
                $slack_result = curl_exec($ch);
                curl_close($ch);
            }

            if ($trello_enabled === '1' && !empty($trello_key) && !empty($trello_token) && !empty($trello_idlist)) {
                $urlTrello = "https://api.trello.com/1/cards";
                $ch = curl_init();
                $payloadTrello = array(
                'name'  =>  $name.' - '.$phone.'  '.$emailclient,
                'desc'  =>  $datemsg . PHP_EOL . $subject . PHP_EOL .  $name . PHP_EOL . $emailclient . PHP_EOL . $phone. PHP_EOL . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . PHP_EOL . $message,
                'pos'  =>  'top',
                'due'  =>  null,
                'key'  =>  $trello_key,
                'token'  =>  $trello_token,
                'idList'  =>  $trello_idlist);
                $jsonDataEncodedq = json_encode($payloadTrello);
                curl_setopt($ch, CURLOPT_URL, $urlTrello);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsTrello);
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncodedq);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
                $Trello_result = curl_exec($ch);
                curl_close($ch);
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