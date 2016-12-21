<?php
// No direct access
defined('_JEXEC') or die;
$app = JFactory::getApplication();
JHtml::_('jquery.framework');
$menu = $app->getMenu()->getActive()->id;
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'media/mod_simplecallback/css/simplecallback.css');
$document->addScript(JUri::base() . 'media/mod_simplecallback/js/simplecallback.js');
JHTML::_('behavior.formvalidation');
$overlayed = $params->get('simplecallback_overlay');
$namemod_enabled = $params->get('namemod_enabled', 0);
$telmod_enabled = $params->get('telmod_enabled', 0);
$city_enabled = $params->get('city_enabled', 0);
$message_enabled = $params->get('simplecallback_message', 0);
$captcha_enabled = $params->get('simplecallback_captcha', 0);
$phone_mask = $params->get('simplecallback_phone_field_mask');
$simplecallback_city_field_label = trim($params->get('simplecallback_city_field_label'));
$simplecallback_city_field_labe2 = trim($params->get('simplecallback_city_field_labe2'));
$simplecallback_city_field_labe3 = trim($params->get('simplecallback_city_field_labe3'));
$header_tag = $params->get('header_tag', 'h3');
$header_class = $params->get('header_class', '');
$show_title = $module->showtitle;
?>

  <form id="simplecallback-<?php echo $module->id; ?>" action="<?php echo JURI::root(); ?>index.php?option=com_ajax&module=simplecallback&format=json" class="form-inline simplecallback<?php echo $moduleclass_sfx ?> <?php if ($overlayed == 1) { echo " simplecallback-overlayed
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
              <label>
                <?php echo $params->get('simplecallback_name_field_label'); ?>
                  <input type="text" name="simplecallback_name" required class="input-block-level" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>

            <?php if ($telmod_enabled == 1) : ?>
            <div class="control-group">
              <label>
                <?php echo $params->get('simplecallback_phone_field_label'); ?>
                  <input type="tel" pattern="(\+?\d[- .]*){6,14}" name="simplecallback_phone" required class="input-block-level" autocomplete="off" />
              </label>
            </div>
          <?php endif; ?>

            <?php if ($city_enabled == 1) : ?>
            <div class="control-group city">
              <label>Район:</label>
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

            <?php if ($message_enabled == 1) : ?>
              <div class="control-group textareaq">
                <label>
                  <?php echo $params->get('simplecallback_message_field_label'); ?>
                </label>
                <textarea type="text" name="simplecallback_message" class="input-block-level" autocomplete="off"></textarea>
              </div>
              <?php endif; ?>

                    <div class="control-group">
                      <input type="text" name="simplecallback_username" class="simplecallback-username" maxlength="10">
                      <?php echo JHtml::_( 'form.token' ); ?>
                        <input type="hidden" name="module_id" value="<?php echo $module->id; ?>" />
                        <input type="hidden" name="Itemid" value="<?php echo $menu; ?>">
                        <input type="hidden" name="simplecallback_page_title" value="<?php echo $document->getTitle(); ?>">
                        <input type="hidden" name="simplecallback_page_url" value="<?php echo JUri::getInstance()->toString(); ?>">
                        <input type="hidden" name="simplecallback_custom_data" value="">
                        <button type="submit" class="uk-button uk-width-1-1 button21">
                          <?php echo $params->get('simplecallback_submit_field_label'); ?>
                        </button>
                    </div>
  </form>