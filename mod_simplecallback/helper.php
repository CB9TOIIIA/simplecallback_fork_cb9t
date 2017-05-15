<?php

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
        if(isset($data['simplecallback_phone'])) { $phone = strip_tags($data['simplecallback_phone']); } else { $phone = null;}
        if(isset($data['simplecallback_name'])) {$name = strip_tags($data['simplecallback_name']); } else { $name = null;}
        if(isset($data['simplecallback_emailclient'])) { $emailclient = strip_tags($data['simplecallback_emailclient']);} else { $emailclient = null;}
        $recaptcha_enabled = $params->get('simplecallback_recaptcha_enabled', 0);
        if(isset($data['simplecallback_message'])) {  $message = strip_tags($data['simplecallback_message']);} else { $message = null;}
        if(isset($data['simplecallback_page_title'])) {  $page_title = strip_tags($data['simplecallback_page_title']);} else { $page_title = null;}
        if(isset($data['simplecallback_custom_data'])) { $custom_data = strip_tags($data['simplecallback_custom_data']);} else { $custom_data = null;}
        if(isset($data['reviewStars'])) {  $reviewStars = strip_tags($data['reviewStars']);} else { $reviewStars = null;}
        $rating_enabled = $params->get('simplecallback_rating_enabled', 0);
        $zakonrf_mode = $params->get('simplecallback_zakonrf_mode');
        $page_url = $params->get('simplecallback_page_url');
        if(isset($data['zakonrf'])) {  $zakonrf = strip_tags($data['zakonrf']);} else { $zakonrf = null;}
        
        if(isset($data['simplecallback_city_field_label'])) { $simplecallback_city_field_label = strip_tags($data['simplecallback_city_field_label']);  } else { $simplecallback_city_field_label = null;}
        if(isset($data['simplecallback_city_field_labe2'])) { $simplecallback_city_field_labe2 = strip_tags($data['simplecallback_city_field_labe2']);   } else { $simplecallback_city_field_labe2 = null;}
        if(isset($data['simplecallback_city_field_labe3'])) { $simplecallback_city_field_labe3 = strip_tags($data['simplecallback_city_field_labe3']);   } else { $simplecallback_city_field_labe3 = null;}

        if(isset($data['custom_textsimple'])) { $simplecallback_custom_textsimple = strip_tags($data['custom_textsimple']);   } else { $simplecallback_custom_textsimple = null;}
        $custom_textsimple_enabled = $params->get('simplecallback_custom_textsimple_enabled');
        $custom_textsimple = $params->get('simplecallback_custom_textsimple');
        if(isset($data['simplecallback_page_url'])) { $page_url = strip_tags($data['simplecallback_page_url']);   } else { $page_url = null;}
        if(isset($data['custom_textsimple'])) {  $custom_textsimple = strip_tags($data['custom_textsimple']);} else { $custom_textsimple = null;}


        $body = "\n";
        if(!empty($name)) :     $body .= "\n". $params->get('simplecallback_name_field_label') . ": "  . $name; endif;
        if(!empty($phone)) :    $body .= "\n". $params->get('simplecallback_phone_field_label') . ": "  . $phone; endif;
        if(!empty($emailclient)) :    $body .= "\nEmail: " . $emailclient; endif;
        if(!empty($custom_data)) :  $body .= "\n" . JText::_( 'MOD_SIMPLECALLBACK_CUSTOM_DATA_LABEL' ) . ": " . $custom_data;  endif;
        if(!empty($simplecallback_city_field_label)) :  $body .= "\nCity: " .  $simplecallback_city_field_label;  endif;
        if(!empty($simplecallback_city_field_labe2)) :  $body .= "\n" .  $simplecallback_city_field_labe2;  endif;
        if(!empty($simplecallback_city_field_labe3)) :  $body .= "\n" .  $simplecallback_city_field_labe3;  endif;
        if(!empty($simplecallback_custom_textsimple)) :  $body .= "\n" .  $simplecallback_custom_textsimple;  endif;
        if(!empty($rating_enabled)) :  $body .= "\n" . $params->get('simplecallback_rating_field_label') . ": " . $reviewStars; endif;
        if(!empty($message)) :  $body .= "\n" . $params->get('simplecallback_message_field_label') . ": " . $message; endif;
        if(!empty($page_url) && $params->get('simplecallback_page_url') == 1) :  $body .= "\n" . $params->get('simplecallback_page_url') . ": " . $page_url; endif;
        $redirect_url_title = '';
        if($params->get('simplacallback_redirect_url_title') == 1) :  $redirect_url_title = JFactory::getApplication()->getParams()->get('page_title', ''); endif;
        if(!empty($redirect_url_title) && $params->get('simplacallback_redirect_url_title') == 1) :  $body .= "\n" . $params->get('simplacallback_redirect_url_title') . ": " . $redirect_url_title; endif;
        if(!empty($simplecallback_custom_textsimple)) :  $body .= "\n" . $custom_textsimple . ": " . $simplecallback_custom_textsimple; endif;
        if(!empty($redirect_url_title)) { $redirect_url_title = 'Со страницы: '. $redirect_url_title; }

        preg_match("/\d{1,}.\d{1,}.\d{1,}/", PHP_VERSION, $MyPHPver);
        $MyPHPv = $MyPHPver[0];
        $smsru_enable = $params->get('simplecallback_smsru_enable');
        $telegram_enabled = $params->get('simplecallback_telegram_enabled');
        $pushall_enabled = $params->get('simplecallback_pushall_enabled');
        $trello_enabled = $params->get('simplecallback_trello_enabled');
        $vk_enabled = $params->get('simplecallback_vk_enabled');
        $mail_enabled = $params->get('simplecallback_mail_enabled');
        $slack_enabled = $params->get('simplecallback_slack_enabled');
        $mattermost_enabled = $params->get('simplecallback_mattermost_enabled');
        $smsru_translit = $params->get('simplecallback_smsru_translit');
        $smsru_test = $params->get('simplecallback_smsru_test');
        $smsru_api_id = $params->get('simplecallback_smsru_api_id');
        $telegram_chat_id = $params->get('simplecallback_telegram_chat_id');
        $pushall_id = $params->get('simplecallback_pushall_id');
        $pushall_key = $params->get('simplecallback_pushall_key');
        $smsru_phone = $params->get('simplecallback_smsru_phone');
        $slack_webhookurl = $params->get('simplecallback_slack_webhookurl');
        $mattermost_webhookurl = $params->get('simplecallback_mattermost_webhookurl');
        $trello_key = $params->get('simplecallback_trello_key');
        $trello_token = $params->get('simplecallback_trello_token');
        $trello_idlist = $params->get('simplecallback_trello_idlist');
        $pozvonim_enabled = $params->get('simplecallback_pozvonim_enabled');
        $pozvonim_key = $params->get('simplecallback_pozvonim_key');
        $pozvonim_uid = $params->get('simplecallback_pozvonim_uid');
        $pozvonim_siteid = $params->get('simplecallback_pozvonim_siteid');
        $redirect_enabled = $params->get('simplacallback_redirect_enabled');
        $redirect_url = $params->get('simplacallback_redirect_url');
        $checkacy = '';
        $acy_extra1 = $params->get('simplecallback_acy_extra1');
        $acy_extra2 = $params->get('simplecallback_acy_extra2');
                
        $bitrix24_enabled = $params->get('simplecallback_bitrix24_enabled');
        $bitrix24_crm_host = $params->get('simplecallback_bitrix24_crm_host');
        $bitrix24_crm_port = $params->get('simplecallback_bitrix24_crm_port', 443);
        $bitrix24_crm_path = $params->get('simplecallback_bitrix24_crm_path', '/crm/configs/import/lead.php');
        $bitrix24_crm_login = $params->get('simplecallback_bitrix24_crm_login');
        $bitrix24_crm_password = $params->get('simplecallback_bitrix24_crm_password');
        $bitrix24_crm_assigned = $params->get('simplecallback_bitrix24_crm_assigned', 1);

        $acy_enabled = $params->get('simplecallback_acy_enabled', 1);
        $acy_subscribe = $params->get('simplecallback_acy_subscribe');
        $acy_subscribe_active = $params->get('simplecallback_acy_subscribe_active', 1);

        $amocrm_enabled = $params->get('simplecallback_amocrm_enabled');
        $amocrm_crm_host = $params->get('simplecallback_amocrm_subdomain');
        $amocrm_crm_login = $params->get('simplecallback_amocrm_crm_login');
        $amocrm_crm_password = $params->get('simplecallback_amocrm_crm_hash');
        $amocrm_crm_status_id = $params->get('simplecallback_amocrm_crm_status_id');
        $amocrm_crm_custom_fields_phone = (int)$params->get('simplecallback_amocrm_crm_custom_fields_phone');
        $amocrm_crm_custom_fields_emailclient = (int)$params->get('simplecallback_amocrm_crm_custom_fields_emailclient');
        $amocrm_crm_custom_fields_tags = $params->get('simplecallback_amocrm_crm_custom_fields_tags');
        $amocrm_crm_custom_fields_element_type = (int)$params->get('simplecallback_amocrm_crm_custom_fields_element_type');
        $amocrm_crm_custom_fields_task_type = (int)$params->get('simplecallback_amocrm_crm_custom_fields_task_type');
        $amocrm_crm_custom_fields_complete_till = (int)$params->get('simplecallback_amocrm_crm_custom_fields_complete_till');

        $megaplan_enabled = $params->get('simplecallback_megaplan_enabled');
        $megaplan_host = $params->get('simplecallback_megaplan_host');
        $megaplan_login = $params->get('simplecallback_megaplan_login');
        $megaplan_password = $params->get('simplecallback_megaplan_password');
        $megaplan_deadline = $params->get('simplecallback_megaplan_deadline');
        $megaplan_responsible = $params->get('simplecallback_megaplan_responsible');
        $megaplan_severity = $params->get('simplecallback_megaplan_severity');
        $megaplan_middleName = $params->get('simplecallback_megaplan_middleName');

        $vk_access_token = $params->get('simplecallback_vk_access_token');
        $vk_group_id = $params->get('simplecallback_vk_group_id');
        $vk_topic_id = $params->get('simplecallback_vk_topic_id');
        $vk_count = $params->get('simplecallback_vk_count', 1);
        $vk_offset = $params->get('simplecallback_vk_offset', 1);
        $vk_filter = $params->get('simplecallback_vk_filter');
        $vk_sort = $params->get('simplecallback_vk_sort');
        $vk_userpush = $params->get('simplecallback_vk_userpush');
        $vk_from_group = $params->get('simplecallback_vk_from_group');
        $vk_board_comment = $params->get('simplecallback_vk_board_comment');
        $vk_wall_post = $params->get('simplecallback_vk_wall_post');
        $slack_username = $params->get('simplecallback_slack_username','SimpleCallbackBot');
        $slack_icon_emoji = $params->get('simplecallback_slack_icon_emoji',':rabbit:');
        $mattermost_username = $params->get('simplecallback_mattermost_username','SimpleCallbackBot');
        $mattermost_icon_emoji = $params->get('simplecallback_mattermost_icon_emoji',':rabbit:');
        $datemsg = date('d.m.Y H:i');
        $body .= "\n" .  date('d.m.Y H:i');
        $body .= " | " . $domainsite;

        // Prepare and send Email
        $mail = JFactory::getMailer();
        $mail->addRecipient($recipients);
        
        if (!empty($sender)) {
            $mail->setSender(array($sender, $fromname));
            $mail->addReplyTo(array($sender, $fromname));
        } else {
            $sender = array(
            $config->get( 'mailfrom' ),
            $config->get( 'fromname' )
            );
            
            $mail->setSender($sender);
            $mail->addReplyTo($sender);
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
                $telegram_text = urlencode($datemsg . "\n" . $subject . "\n" .  $name . "\n" . $emailclient . "\n" . $phone. "\n" . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple ."\n" . $message  . "\n" . $page_url  . "\n" . $redirect_url_title);
                $telegram_request_url = 'https://telegram.cb9t.ru/modsimplecallbackbot/fromweb.php?chatid=' . $telegram_chat_id . '&text=' . $telegram_text;
                $telegram_result = file_get_contents($telegram_request_url);
            }


           if ($pozvonim_enabled === '1' && !empty($pozvonim_key)) {
                $Tokenurl = 'https://api.pozvonim.com/v2u/auth/token?';
                $ProfileUrl = 'https://api.pozvonim.com/v2u/profile?';
                $rephone = urlencode($phone);
                $InputVars = array(
                'uid'  => $pozvonim_uid,
                'sign' => md5("{$pozvonim_key}uid={$pozvonim_uid}")
                 );
                $ToketGet = $Tokenurl.http_build_query($InputVars,null,'&');
                $getprofile = json_decode(file_get_contents($ToketGet));
                $getprofilear = json_decode(json_encode($getprofile), true);
                $Token = $getprofilear['token'];
                $TokenExpire = $getprofilear['expire'];
                $VarsGET = md5("{$Token}uid={$pozvonim_uid}");
                $VarsGETPhone = md5("{$Token}phone={$rephone}&uid={$pozvonim_uid}");
                $VarsGETPhonenoMD5 = "{$Token}phone={$rephone}&uid={$pozvonim_uid}";
                $POZVONIM_Post_Call = "https://api.pozvonim.com/v2u/sites/{$pozvonim_siteid}/call?";
                $dataCall = array(
                "phone" => $phone,
                "uid" =>  $pozvonim_uid,
                "sign" => $VarsGETPhone
                );
                $jsondataCall = json_encode($dataCall);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $POZVONIM_Post_Call);
                curl_setopt($ch, CURLOPT_TIMEOUT, 0);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondataCall);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
                $resultPostCall = curl_exec($ch);
                curl_close($ch);
            }

            if ($pushall_enabled === '1' && !empty($pushall_id)) {
                $pushall_text = urlencode($datemsg . "\n" . $subject . "\n" .  $name . "\n" . $emailclient . "\n" . $phone. "\n" . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple .  "\n" . $message  . "\n" . $page_url  . "\n" . $redirect_url_title);
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
                    'text'  =>  $datemsg . PHP_EOL . $subject . PHP_EOL .  $name . PHP_EOL . $emailclient . PHP_EOL . $phone. PHP_EOL . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple .  PHP_EOL . $message  . "\n" . $page_url  . "\n" . $redirect_url_title . '----------------------',
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
     
            if ($mattermost_enabled === '1' && !empty($mattermost_webhookurl)) {
                $url = $mattermost_webhookurl;
                $ch = curl_init();
                $payload = array(
                    'username'  =>  $mattermost_username,
                    'icon_emoji'  =>  $mattermost_icon_emoji,
                    'text'  =>  $datemsg . PHP_EOL . $subject . PHP_EOL .  $name . PHP_EOL . $emailclient . PHP_EOL . $phone. PHP_EOL . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple .  PHP_EOL . $message  . "\n" . $page_url  . "\n" . $redirect_url_title . '----------------------',
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
                $mattermost_result = curl_exec($ch);
                curl_close($ch);
            }
          
		    if ($vk_enabled === '1' && !empty($vk_access_token)) {

                function vkpush($method, $post = false) {
                $ch = curl_init("https://api.vk.com/method/".$method);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
                curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
                if ($post) {
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                }
                $response = curl_exec($ch);
                curl_close($ch);
                $json = json_decode($response, true);
                if (isset($json["error"]["error_msg"])) {
                    return $json["error"];
                    } 
                else {
                    return $json["response"];
                    }           
                }
                
				$vk_message = $datemsg . "\n" . $subject . "\n" .  $name . "\n" . $emailclient . "\n" . $phone. "\n" . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple .  "\n" . $message  . "\n" . $page_url  . "\n" . $redirect_url_title . " ".$vk_userpush;

                if ($vk_wall_post === '1') {

                vkpush('wall.post', array('owner_id' => '-'.$vk_group_id,  'from_group' => $vk_from_group, 'message' => $vk_message,  'access_token' => $vk_access_token));

                }
                
                if ($vk_board_comment === '1') {

                vkpush("board.createComment", array("group_id" => $vk_group_id, "topic_id" => $vk_topic_id, "message" => $vk_message,  "from_group" => $vk_from_group,  "access_token" => $vk_access_token));

                }

            }

            if ($trello_enabled === '1' && !empty($trello_key) && !empty($trello_token) && !empty($trello_idlist)) {
                $urlTrello = "https://api.trello.com/1/cards";
                $ch = curl_init();
                $payloadTrello = array(
                'name'  =>  $name.' - '.$phone.'  '.$emailclient,
                'desc'  =>  $datemsg . PHP_EOL . $subject . PHP_EOL .  $name . PHP_EOL . $emailclient . PHP_EOL . $phone. PHP_EOL . $simplecallback_city_field_label.  $simplecallback_city_field_labe2.  $simplecallback_city_field_labe3 . $simplecallback_custom_textsimple .  PHP_EOL . $message  . $page_url,
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
               
            if ($bitrix24_enabled === '1' && !empty($bitrix24_crm_host) && !empty($bitrix24_crm_login) && !empty($bitrix24_crm_password))
                {   
                
              $message_b24 = $datemsg . " " . $simplecallback_city_field_label.   " " .$simplecallback_city_field_labe2. " " .  $simplecallback_city_field_labe3 . " " .$simplecallback_custom_textsimple ." " . $message  ." " . $page_url  ." " . $redirect_url_title;

                $postData = array(
                    'LOGIN' => $bitrix24_crm_login,
                    'PASSWORD' => $bitrix24_crm_password,
                    'TITLE' => $subject,
                    'NAME' => $name,
                    'SOURCE_ID' => 'WEB',
                    'PHONE_MOBILE' => $phone,
                    'WEB_OTHER' => $page_url,
                    'EMAIL_WORK' => $emailclient,
                    'SOURCE_DESCRIPTION' => $page_url,
                    'ASSIGNED_BY_ID' => (int) $bitrix24_crm_assigned,
                    'COMMENTS' => $message_b24
                );

                // open socket to CRM
                $fp = fsockopen("ssl://".$bitrix24_crm_host, $bitrix24_crm_port, $errno, $errstr, 30);
                if ($fp)
                {
                    // prepare POST data
                    $strPostData = '';
                    foreach ($postData as $key => $value)
                    $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

                    // prepare POST headers
                    $str = "POST ".$bitrix24_crm_path." HTTP/1.0\r\n";
                    $str .= "Host: ".$bitrix24_crm_host."\r\n";
                    $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
                    $str .= "Content-Length: ".strlen($strPostData)."\r\n";
                    $str .= "Connection: close\r\n\r\n";

                    $str .= $strPostData;

                    // send POST to CRM
                    fwrite($fp, $str);

                    // get CRM headers
                    $result = '';
                    while (!feof($fp))
                    {
                    $result .= fgets($fp, 128);
                    }
                    fclose($fp);

                    // cut response headers
                    $response = explode("\r\n\r\n", $result);
                        //  dump($response,1,'response');
                    // $output = '<pre>'.print_r($response[1], 1).'</pre>';
                }
                         else
                     {
                             echo 'Connection Failed! '.$errstr.' ('.$errno.')';
                        }
             }
            if ($amocrm_enabled === '1' && !empty($amocrm_crm_host) && !empty($amocrm_crm_login) && !empty($amocrm_crm_password))
                {   
                            
                $message_amocrm = $datemsg . " " . $simplecallback_city_field_label.   " " .$simplecallback_city_field_labe2. " " .  $simplecallback_city_field_labe3 . " " .$simplecallback_custom_textsimple ." " . $message;

                $subdomain = $amocrm_crm_host;
                $user=array(
                    'USER_LOGIN'=>$amocrm_crm_login,
                    'USER_HASH'=>$amocrm_crm_password
                );

                $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';    
                $curl=curl_init(); 
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
                curl_setopt($curl,CURLOPT_URL,$link);
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
                curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
                curl_setopt($curl,CURLOPT_HEADER,false);
                curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); 
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

                $out=curl_exec($curl);
                $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
                $Response=json_decode($out,true);

                $new_lead_title = $subject;

                    $leads['request']['leads']['add']=array(
                    array(
                        'name'=>$new_lead_title,
                        'status_id'=>$amocrm_crm_status_id,
                    )
                 );

                $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
                $curl=curl_init();

                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
                curl_setopt($curl,CURLOPT_URL,$link);
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
                curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
                curl_setopt($curl,CURLOPT_HEADER,false);
                curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

                $out=curl_exec($curl);
                $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
                $Response=json_decode($out,true);

                $newleadid = $Response['response']['leads']['add'][0]['id'];
                $lead_user_new = 1;
                $contact=array(
                            'responsible_user_id'=>$lead_user_new,
                            'custom_fields'=>array()
                        );

                $contact['custom_fields'][]=array(
                        'id' => $amocrm_crm_custom_fields_phone, 
                        'values'=>array(
                        array(
                            'value'=>$phone,
                            'enum'=>'HOME'
                        )
                        )
                    );

                $contact['custom_fields'][]=array(
                        'id' => $amocrm_crm_custom_fields_emailclient,  
                        'values'=>array(
                        array(
                            'value'=>$emailclient,
                            'enum'=>'WORK'
                        )
                        )
                    );

                $contact['name'] = $name;
                $contact['tags'] = $amocrm_crm_custom_fields_tags;
                $contact['linked_leads_id'] = Array($newleadid);
                $contact_params=Array();
                $contact_params['request']['contacts']['add'][]=$contact;

                $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
                $curl=curl_init();

                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
                curl_setopt($curl,CURLOPT_URL,$link);
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contact_params));
                curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
                curl_setopt($curl,CURLOPT_HEADER,false);
                curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

                $out=curl_exec($curl);
                $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);

                $leadRess = json_decode($out);
                // Ставим задачу
                $tasks['request']['tasks']['add']=array(
                array(
                    'element_id' => $newleadid,
                    'element_type' => $amocrm_crm_custom_fields_element_type, // Type: 1 - контакт, 2 - сделка
                    'task_type' => $amocrm_crm_custom_fields_task_type, #Встреча
                    'text'=> $message_amocrm,
                    'complete_till' => time() + $amocrm_crm_custom_fields_complete_till,
                )
                );

                $link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/tasks/set';
                $curl=curl_init();

                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
                curl_setopt($curl,CURLOPT_URL,$link);
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($tasks));
                curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
                curl_setopt($curl,CURLOPT_HEADER,false);
                curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
                curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);

                $out=curl_exec($curl);
                $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
                $Response=json_decode($out,true);

             }

            if ($megaplan_enabled === '1') {
               
            require_once dirname(__FILE__) . '/crm/megaplan/Request.php';

                // Авторизуемся в Мегаплане
                $request = new SdfApi_Request( '', '', $megaplan_host, true );
                $response = json_decode(
                        $request->get(
                            '/BumsCommonApiV01/User/authorize.api',
                                array(
                                    'Login' => $megaplan_login,
                                    'Password' => md5( $megaplan_password )
                                    )
                                )
                            );

                // Получаем AccessId и SecretKey
                $accessId = $response->data->AccessId;
                $secretKey = $response->data->SecretKey;

                // Переподключаемся с полученными AccessId и SecretKey
                unset( $request );
                $request = new SdfApi_Request( $accessId, $secretKey, $megaplan_host, true );

                // Создаем задачу
                $raw = $request->post('/BumsCrmApiV01/Contractor/save.api',array(
                        'Model[FirstName]' => $name,
                        'Model[TypePerson]' => "human",		
                        'Model[LastName]' => " ",
                        'Model[MiddleName]' => $megaplan_middleName,
                        'Model[Email]' => $emailclient,
                        'Model[Phones]' => array("ph_m{$phone}\tSimpleCallback"),	
                        'Model[Responsible]' => $megaplan_responsible,	
                        ) );

                // Чистый форматированный JSON (ответ сервера с ID созданной задачи)
                $queryContact = json_decode($raw, true);     

                $NewCustomerId = $queryContact['data']['contractor']['Id'];

                $dateDeadline = date('d.m.Y', strtotime($megaplan_deadline));

                $raw = $request->post('/BumsTaskApiV01/Task/create.api',array(
                        'Model[Name]' => $subject,
                        'Model[DeadlineDate]' => $dateDeadline,
                        'Model[Responsible]' => $megaplan_responsible,
                        'Model[Customer]' => $NewCustomerId,
                        'Model[Severity]' => $megaplan_severity,
                        'Model[Statement]' => $message,
                        ) );

                // Чистый форматированный JSON (ответ сервера с ID созданной задачи)
                $query = json_decode($raw, true);
               
           }

           if ($acy_enabled === '1' && !empty($emailclient)) {
                            
                if (!include_once (rtrim(JPATH_ADMINISTRATOR, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_acymailing' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'helper.php')) {
                    // false
                }
                else {

                    $subscribe = explode(',',$acy_subscribe); 
                    $newSubscription = array();

                    if (!empty($subscribe)) {
                        foreach($subscribe as $listId) {
                            $newList = array();
                       if ($acy_subscribe_active == 1) {  
                           
                            $newList['status'] = 1; } 
                       
                       else {
                                $newList['status'] = 0;
                       }
                            $newSubscription[$listId] = $newList;
                        }
                    }

                    $myUser = new stdClass();
                    $myUser->email = $emailclient;


                    if (empty($name)) {
                        $name = $emailclient;
                    }
                    
                    $myUser->name = $name; 

                    if (!empty($phone)) {
                       $myUser->phone = $phone; 
                    }

                    if (!empty($message)) {
                       $myUser->message = $message; 
                    }

                    $subscriberClass = acymailing_get('class.subscriber');
                    $subidSub = $subscriberClass->save($myUser);
                    $SaveToSub = $subscriberClass->saveSubscription($subidSub, $newSubscription);

    }
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