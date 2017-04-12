<?php
// No direct access
defined('_JEXEC') or die;
$app = JFactory::getApplication();
JHtml::_('jquery.framework');
$menu = $app->getMenu()->getActive()->id;
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'media/mod_simplecallback/css/simplecallback.css');
$document->addScript(JUri::base() . 'media/mod_simplecallback/js/simplecallback.js');
$document->addStyleSheet(JUri::base() . 'media/mod_simplecallback/css/sweetalert.css');
$document->addScript(JUri::base() . 'media/mod_simplecallback/js/sweetalert.min.js');
JHTML::_('behavior.formvalidation');
$overlayed = $params->get('simplecallback_overlay');
$namemod_enabled = $params->get('namemod_enabled', 0);
$telmod_enabled = $params->get('telmod_enabled', 0);
$emailclient_enabled = $params->get('emailclient_enabled', 0);
$recaptcha_enabled = $params->get('simplecallback_recaptcha_enabled', 0);
$rating_enabled = $params->get('simplecallback_rating_enabled', 0);
$city_enabled = $params->get('city_enabled', 0);
$message_enabled = $params->get('simplecallback_message', 0);
$simplecallback_file_enabled = $params->get('simplecallback_file_enabled', 0);
$captcha_enabled = $params->get('simplecallback_captcha', 0);
$phone_mask = $params->get('simplecallback_phone_field_mask');
$simplecallback_city_field_label = trim($params->get('simplecallback_city_field_label'));
$simplecallback_city_field_labe2 = trim($params->get('simplecallback_city_field_labe2'));
$simplecallback_city_field_labe3 = trim($params->get('simplecallback_city_field_labe3'));
$header_tag = $params->get('header_tag', 'h3');
$header_class = $params->get('header_class', '');
$show_title = $module->showtitle;
$name_req = $params->get('simplecallback_name_field_label_req', 0);
$emailclient_req = $params->get('simplecallback_emailclient_field_label_req', 0);
$phone_req = $params->get('simplecallback_phone_field_label_req', 0);
$message_req = $params->get('simplecallback_message_req', 0);
$name_req = ($name_req == 1) ? 'required' : '' ;
$emailclient_req = ($emailclient_req == 1) ? 'required' : '' ;
$phone_req = ($phone_req == 1) ? 'required' : '' ;
$message_req = ($message_req == 1) ? 'required' : '' ;
$zv_name_req = ($name_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_emailclient_req = ($emailclient_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_phone_req = ($phone_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_message_req = ($message_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$cleartitle = str_replace('"', '',  $document->getTitle()); // удаляем одинарные кавычки
$cleartitle = str_replace("'", "", $cleartitle); // удаляем одинарные кавычки
$cleartitle = str_replace('&quot;', '', $cleartitle); // удаляем двойные кавычки
$cleartitle = str_replace('&amp;', '', $cleartitle); // удаляем амперсанд
?>

  <form enctype="multipart/form-data" id="simplecallback-<?php echo $module->id; ?>" action="<?php echo JURI::root(); ?>index.php?option=com_ajax&module=simplecallback&format=json" class="form-inline simplecallback<?php echo $moduleclass_sfx ?> <?php if ($overlayed == 1) { echo " simplecallback-overlayed
  "; } ?>" method="post" <?php if (!empty($phone_mask) && $phone_mask !='' ) { echo "data-simplecallback-phone-mask='$phone_mask'"; } ?>
    data-simplecallback-form
    <?php if ($overlayed == 1) { echo "data-simplecallback-form-overlayed style='display: none;'"; } ?>
      >

      <?php if ($overlayed == 1) :?>
        <div class="simplecallback-loading-svg">
          <?php include JPATH_SITE . '/media/mod_simplecallback/images/loading.svg'; ?>
        </div>
        <div class="simplecallback-close" data-simplecallback-close>&times;</div>
        <?php if ($module->showtitle) {
    echo "<$header_tag class='$header_class'>$module->title</$header_tag>";
} ?>
          <?php endif; ?>


    <?php if ($namemod_enabled == 1) : ?>
            <div class="control-group">
              <label><div class="textlabel">
                <?php echo $params->get('simplecallback_name_field_label'); ?> <?php echo $zv_name_req ?>  </div>
                  <input type="text" name="simplecallback_name" <?php echo $name_req ?> class="input-block-level" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>

    <?php if ($emailclient_enabled == 1) : ?>
            <div class="control-group">
              <label><div class="textlabel">
                <?php echo $params->get('simplecallback_emailclient_field_label'); ?>  <?php echo $zv_emailclient_req ?>  </div>
                  <input type="text" name="simplecallback_emailclient"  <?php echo $emailclient_req ?>  class="input-block-level" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>
          

          <?php if ($simplecallback_file_enabled == 1) : ?>
           <div class="control-group">
              <label><div class="textlabel">
               <?php echo $params->get('simplecallback_file_field_label'); ?>  </div>
               <input type="file" name="simplecallback_file" />
              </label>
            </div>   
          <?php endif; ?>

            <?php if ($telmod_enabled == 1) : ?>
            <div class="control-group">
              <label><div class="textlabel">
                <?php echo $params->get('simplecallback_phone_field_label'); ?>  <?php echo $zv_phone_req ?>  </div>
                  <input type="tel" pattern="(\+?\d[- .]*){6,14}" name="simplecallback_phone" <?php echo $phone_req ?>  class="input-block-level" autocomplete="off" />
              </label>
            </div>
          <?php endif; ?>

            <?php if ($city_enabled == 1) : ?>
            <div class="control-group city">
              <label><div class="textlabel">Район: </div></label>
              <div class="clearfix"></div>
              <label>
 <?php           
 if (!empty($simplecallback_city_field_label)) : ?>
  
  <input type="radio" name="simplecallback_city_field_label"
    value="<?php echo $params->get('simplecallback_city_field_label'); ?>" />
    <?php echo $params->get('simplecallback_city_field_label'); ?>

<?php endif; ?>  
       </label>   <label>
 <?php           
 if (!empty($simplecallback_city_field_labe2)) : ?>
  
  <input type="radio" name="simplecallback_city_field_label"
    value="<?php echo $params->get('simplecallback_city_field_labe2'); ?>" />
    <?php echo $params->get('simplecallback_city_field_labe2'); ?>

<?php endif; ?>  
   </label>   <label>
 <?php           
 if (!empty($simplecallback_city_field_labe3)) : ?>
  
  <input type="radio" name="simplecallback_city_field_label"
    value="<?php echo $params->get('simplecallback_city_field_labe3'); ?>" />
    <?php echo $params->get('simplecallback_city_field_labe3'); ?>

<?php endif; ?>  

              </label>
            </div>
          <?php endif; ?>

    <?php if ($rating_enabled == 1) : ?>
            <div class="control-group">
              <label> <div class="textlabel">
                <?php echo $params->get('simplecallback_rating_field_label'); ?>      </div>  </label>
                 <div class="clearfix"></div>
   <div id="reviewStars-input">
    <input id="star-4" type="radio" value="5" name="reviewStars"/>
    <label title="5" for="star-4"></label>

    <input id="star-3" type="radio" value="4" name="reviewStars"/>
    <label title="4" for="star-3"></label>

    <input id="star-2" type="radio" value="3" name="reviewStars"/>
    <label title="3" for="star-2"></label>

    <input id="star-1" type="radio" value="2" name="reviewStars"/>
    <label title="2" for="star-1"></label>

    <input id="star-0" type="radio" value="1" name="reviewStars"/>
    <label title="1" for="star-0"></label>
</div>
        <div class="clearfix"></div>       
            </div>   
          <?php endif; ?>
          

            <?php if ($message_enabled == 1) : ?>
              <div class="control-group textareaq">
                <label> <div class="textlabel">
                  <?php echo $params->get('simplecallback_message_field_label'); ?>  <?php echo $zv_message_req ?>    </div>
                </label>
                <textarea type="text" name="simplecallback_message" <?php echo $message_req ?>  class="input-block-level" autocomplete="off"></textarea>
              </div>
              <?php endif; ?>
       <?php if ($recaptcha_enabled == 1) : ?>    
    <?php  echo JCaptcha::getInstance( 'recaptcha' )->display( 'captcha', 'captcha', 'captcha' ); ?>
      <?php endif; ?>
                    <div class="control-group">
                      <input type="text" name="simplecallback_username" class="simplecallback-username" maxlength="10">
                      <?php echo JHtml::_( 'form.token' ); ?>
                        <input type="hidden" name="module_id" value="<?php echo $module->id; ?>" />
                        <input type="hidden" name="Itemid" value="<?php echo $menu; ?>">
                        <input type="hidden" name="simplecallback_page_title" value="<?php echo $cleartitle; ?>">
                        <input type="hidden" name="simplecallback_page_url" value="<?php echo JUri::getInstance()->toString(); ?>">
                        <input type="hidden" name="simplecallback_custom_data" value="">
                        <button type="submit" class="uk-button uk-width-1-1 button21">
                          <?php echo $params->get('simplecallback_submit_field_label'); ?>
                        </button>
                    </div>
  </form>