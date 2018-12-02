<?php
// No direct access
defined('_JEXEC') or die;

$app = JFactory::getApplication();
JHtml::_('jquery.framework');
$menu = $app->getMenu()->getActive()->id;
$document = JFactory::getDocument();
$simplecallback_jq_enabled = $params->get('simplecallback_jq_enabled', 0);

if ($simplecallback_jq_enabled == 1) {
  $document->addScript(JUri::base() . 'media/jui/js/jquery.min.js');
  $document->addScript(JUri::base() . 'media/jui/js/jquery-noconflict.js');
}

$js_body = $params->get('simplecallback_js_body', 0);

if (!defined('SIMPLECALLBACK') || $js_body == 0) {
 
  $document->addStyleSheet(JUri::base() . 'media/mod_simplecallback/css/simplecallback.css');
  $document->addScript(JUri::base() . 'media/mod_simplecallback/js/simplecallback.js');
  $document->addStyleSheet(JUri::base() . 'media/mod_simplecallback/css/sweetalert.css');
  $document->addScript(JUri::base() . 'media/mod_simplecallback/js/sweetalert.min.js');
  defined('SIMPLECALLBACK') or define('SIMPLECALLBACK',1);
}

if ($js_body == 1) {
  if (!defined('SIMPLECALLBACK') || !defined('SIMPLECALLBACKDOM')) {
      defined('SIMPLECALLBACKDOM') or define('SIMPLECALLBACKDOM',1);
      echo '<link href="'.JUri::root().'media/mod_simplecallback/css/simplecallback.css" rel="stylesheet" />'."\n";
      echo '<script type="text/javascript" src="'.JUri::root().'media/mod_simplecallback/js/simplecallback.js"></script>'."\n";
      echo '<link href="'.JUri::root().'media/mod_simplecallback/css/sweetalert.css" rel="stylesheet" />'."\n";
      echo '<script type="text/javascript" src="'.JUri::root().'media/mod_simplecallback/js/sweetalert.min.js"></script>'."\n";
  }
}


defined('SIMPLECALLBACK') or define('SIMPLECALLBACK',1);

JHTML::_('behavior.formvalidation');
$zakonrf_mode = $params->get('simplecallback_zakonrf_mode');
$zakonrf_link_text = $params->get('simplacallback_zakonrf_link_text');
$zakonrf_link = $params->get('simplacallback_zakonrf_link');
$overlayed = $params->get('simplecallback_overlay');
$custom_textsimple_enabled = $params->get('simplecallback_custom_textsimple_enabled', 0);
$custom_textsimple = $params->get('simplecallback_custom_textsimple');
$phone_field_pattern = $params->get('simplecallback_phone_field_pattern');
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
$submit_field_css = $params->get('simplecallback_submit_field_css');
$simplecallback_city_field_label_main = trim($params->get('simplecallback_city_field_label_main'));
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
$custom_textsimple_req = $params->get('simplecallback_custom_textsimple_req', 0);
$name_req = ($name_req == 1) ? 'required' : '' ;
$custom_textsimple_req = ($custom_textsimple_req == 1) ? 'required' : '' ;
$emailclient_req = ($emailclient_req == 1) ? 'required' : '' ;
$phone_req = ($phone_req == 1) ? 'required' : '' ;
$message_req = ($message_req == 1) ? 'required' : '' ;
$zv_name_req = ($name_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_emailclient_req = ($emailclient_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_phone_req = ($phone_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_message_req = ($message_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$zv_textsimple_req = ($custom_textsimple_req == 'required') ? '<span style="needreq">*</span>' : '' ;
$my_inline_css_enabled = $params->get('simplacallback_my_inline_css_enabled', 0);
$reachgoal_enabled = $params->get('simplacallback_reachgoal_enabled', 0);
$my_inline_css = $params->get('simplacallback_my_inline_css', '');
$textarea_width = $params->get('simplecallback_textarea_width', 0);
$textarea_width_cols = $params->get('simplecallback_textarea_width_cols', '');
$textarea_width_rows = $params->get('simplecallback_textarea_width_rows', '');
$reachgoal_text = $params->get('simplacallback_reachgoal_text', '');
$redirect_enabled = $params->get('simplacallback_redirect_enabled', 0);
$redirect_url = $params->get('simplacallback_redirect_url');
$my_text_before_enabled = $params->get('simplacallback_my_text_before_enabled', 0);
$my_text_before = $params->get('simplacallback_my_text_before');
$my_text_after_enabled = $params->get('simplacallback_my_text_after_enabled', 0);
$my_text_after = $params->get('simplacallback_my_text_after');
$label_enabled = $params->get('simplacallback_label_enabled', 1);
$placeholder_enabled = $params->get('simplacallback_placeholder_enabled', 0);



if ($my_inline_css_enabled == 1) {
  echo '<style>'.$my_inline_css.'</style>';
}

if ($label_enabled == 0) {
  echo '<style>.simplecallback label .textlabel, .form-group.textareaq label {display:none}</style>';
}

if ($textarea_width == 1) {
  $textarea_width_cols = 'cols="'.$textarea_width_cols.'"';
  $textarea_width_rows = 'rows="'.$textarea_width_rows.'"';
}
else {
  $textarea_width_cols = '';
  $textarea_width_rows = '';
}

if ($reachgoal_enabled == 1) {
   $reachgoal_text = 'onClick="'.$reachgoal_text.'"';
}
else {
   $reachgoal_text = '';
}



?>

  <form enctype="multipart/form-data" id="simplecallback-<?php echo $module->id; ?>" action="<?php echo JURI::root(); ?>index.php?option=com_ajax&module=simplecallback&format=json" class="simplecallback<?php echo $moduleclass_sfx ?> <?php if ($overlayed == 1) { echo " simplecallback-overlayed
  "; } ?>" method="post" <?php if (!empty($phone_mask) && $phone_mask !='' ) { echo "data-simplecallback-phone-mask='$phone_mask'"; } ?>
    data-simplecallback-form
    <?php if ($overlayed == 1) { echo "data-simplecallback-form-overlayed style='display: none;'"; } ?>
      >

      <?php if ($overlayed == 1) :?>
        <div class="simplecallback-loading-svg">
          <?php include JPATH_SITE . '/media/mod_simplecallback/images/loading.svg'; ?>
        </div>
        <div class="simplecallback-close" data-simplecallback-close>&times;</div>
        
        <?php 
if ($my_text_before_enabled == 1 && $overlayed == 1) {
  echo "<div class='beforeformtext'>".$my_text_before."</div>";
}
?>
        <?php if ($module->showtitle) {
    echo "<$header_tag class='$header_class'>$module->title</$header_tag>";
} ?>
          <?php endif; ?>


        <?php 

if ($my_text_before_enabled == 1 && $overlayed != 1) {
  echo "<div class='beforeformtext'>".$my_text_before."</div>";
}

?>

    <?php if ($namemod_enabled == 1) : ?>
            <div class="form-group">
              <label><div class="textlabel col-form-label">
                <?php echo $params->get('simplecallback_name_field_label'); ?> <?php echo $zv_name_req ?>  </div>
                  <input type="text"  <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_name_field_label')}'" ;} ?>  name="simplecallback_name" <?php echo $name_req ?> class="input-block-level form-control mr-sm-2" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>

    <?php if ($custom_textsimple_enabled == 1) : ?> 
            <div class="form-group">
              <label><div class="textlabel col-form-label">
                <?php echo $params->get('simplecallback_custom_textsimple'); ?> <?php echo $zv_textsimple_req ?>  </div>
                  <input type="text"  <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_custom_textsimple')}'" ;} ?>  name="custom_textsimple" <?php echo $custom_textsimple_req ?> class="input-block-level form-control mr-sm-2" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>

      

            <?php if ($telmod_enabled == 1) : ?>
            <div class="form-group">
              <label><div class="textlabel col-form-label">
                <?php echo $params->get('simplecallback_phone_field_label'); ?>  <?php echo $zv_phone_req ?>  </div>
                  <input  <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_phone_field_label')}'" ;} ?> type="tel" <?php
                  
                  if (!empty($phone_field_pattern)) {
                    echo "pattern='{$phone_field_pattern}'";
                  }
                  else {
                    echo "";
                  }
                  
                    ?> name="simplecallback_phone" <?php echo $phone_req ?>  class="input-block-level form-control mr-sm-2" autocomplete="off" />
              </label>
            </div>
          <?php endif; ?>


    <?php if ($emailclient_enabled == 1) : ?>
            <div class="form-group">
              <label><div class="textlabel col-form-label">
                <?php echo $params->get('simplecallback_emailclient_field_label'); ?>  <?php echo $zv_emailclient_req ?>  </div>
                  <input type="email"   <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_emailclient_field_label')}'" ;} ?>  name="simplecallback_emailclient"  <?php echo $emailclient_req ?>  class="input-block-level form-control mr-sm-2" autocomplete="off" />
              </label>
            </div>   
          <?php endif; ?>


            <?php if ($city_enabled == 1) : ?>
            <div class="form-group city">
              <label><div class="textlabelrayon"><?php echo $simplecallback_city_field_label_main; ?> </div></label>
              <div class="clearfix"></div>
              <label>
 <?php           
 if (!empty($simplecallback_city_field_label)) : ?>
  
  <input <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_city_field_label')}'" ;} ?> type="radio" name="simplecallback_city_field_label"
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
            <div class="form-group">
              <label> <div class="textlabel col-form-label">
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
              <div class="form-group textareaq">
                <label> <div class="textlabel col-form-label">
                  <?php echo $params->get('simplecallback_message_field_label'); ?>  <?php echo $zv_message_req ?>    </div>
                </label>
                <textarea <?php if ($placeholder_enabled != 0) { echo "placeholder='{$params->get('simplecallback_message_field_label')}'" ;} ?> type="text" <?php echo $textarea_width_cols ?> <?php echo $textarea_width_rows ?> name="simplecallback_message" <?php echo $message_req ?>  class="input-block-level form-control mr-sm-2" autocomplete="off"></textarea>
              </div>
              <?php endif; ?>

    

          <?php if ($simplecallback_file_enabled == 1) : ?>
           <div class="form-group custom-file">
              <label class="custom-file-label" for="customFile">
               <?php echo $params->get('simplecallback_file_field_label'); ?>
               <input type="file" class="custom-file-input" id="customFile" name="simplecallback_file" />
              </label>
            </div>   
          <?php endif; ?>


      <?php  
      if ($redirect_enabled == 1) {
       echo $redirect_url ='<div style="display:none" id="redirectsuccesssimplecallback">'.$redirect_url.'</div>';
      }
      else {
       echo $redirect_url = '<div style="display:none" id="redirectsuccesssimplecallback">noturl</div>';
      }
   
    ?>

<?php if ($zakonrf_mode == 1) : ?>    
<div class="zakonrf">

  <?php if (!empty($zakonrf_link)) : ?>
   <label><input name="zakonrf" class="" required type="checkbox"/> <a target="_blank" rel="nofollow" href="<?php echo $zakonrf_link ?>"> <?php echo $zakonrf_link_text; ?></a></label>
   <?php endif; ?>

  <?php if (empty($zakonrf_link)) : ?>
   <label><input name="zakonrf" class="" required type="checkbox"/> <?php echo $zakonrf_link_text; ?></label>
   <?php endif; ?>

</div>
<?php endif;  ?>

      <?php if ($recaptcha_enabled == 1) : ?>    
     <div class="row"> <div class="col-sm"> <?php  echo JCaptcha::getInstance( 'recaptcha' )->display( 'captcha', 'captcha', 'captcha' ); ?>   </div>   </div> 
      <?php endif; ?>
                    <div class="form-group">
                      <input type="text" name="simplecallback_username" class="simplecallback-username" maxlength="10">
                      <?php echo JHtml::_( 'form.token' ); ?>
                        <input type="hidden" name="module_id" value="<?php echo $module->id; ?>" />
                        <input type="hidden" name="Itemid" value="<?php echo $menu; ?>">
                        <input type="hidden" name="simplecallback_page_title" value="<?php echo $document->getTitle(); ?>">
                        <input type="hidden" name="simplecallback_page_url" value="<?php echo JUri::getInstance()->toString(); ?>">
                        <input type="hidden" name="simplecallback_custom_data" value="">
                        <button type="submit" <?php echo $reachgoal_text ?> class="<?php echo $submit_field_css; ?>">
                          <?php echo $params->get('simplecallback_submit_field_label'); ?>
                        </button>
                    </div>
      
  </form>

<?php 

if ($my_text_after_enabled == 1) {
  echo "<div class='afterformtext'>".$my_text_after."</div>";
}

?>