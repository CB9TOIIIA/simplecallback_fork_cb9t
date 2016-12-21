<?php
define( '_JEXEC', 1 );
define( 'JPATH_BASE', realpath(dirname(__FILE__).'/../..' ));

require_once ( JPATH_BASE . '/includes/defines.php' );
require_once ( JPATH_BASE . '/includes/framework.php' );
$mainframe = JFactory::getApplication('site');
$mainframe->initialise();

include('lib/Captcha/CaptchaBuilderInterface.php');
include('lib/Captcha/PhraseBuilderInterface.php');
include('lib/Captcha/CaptchaBuilder.php');
include('lib/Captcha/PhraseBuilder.php');

$session = JFactory::getSession();

use Gregwar\Captcha\CaptchaBuilder;

$captcha = new CaptchaBuilder;
$captcha->create();
$captcha->build();

$id = intval($_GET['id']);

if ($id) {
    $session->set('module-'.$id, $captcha->getPhrase());
}
header('Content-type: image/jpeg');
$captcha->output();
