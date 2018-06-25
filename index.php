<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/templates_c/');

$tplPath = 'login.tpl';

$smarty->display($tplPath);
