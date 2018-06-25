<?php

/**
 *  WP32 PHP評価課題 
 *  iw13a727 01 ishidakazuma
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/entity/Reports.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/dao/ReportsDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/Functions.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/wp32/sharereports/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/wp32/sharereports/templates_c/");

$tplPath = "reports/confirmDelete.tpl";
if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
}
else{
	$deleteReportsId = $_POST["deleteReportsId"];

	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$reportsDAO = new ReportsDAO($db);
		$reports = $reportsDAO->findByPK($deleteReportsId);
		$smarty->assign("reports", $reports);

		//login.phpでセッションに入れた結合された名前データを取得。
		$name = $_SESSION['name'];
		$smarty->assign('name', $name);
	}
	catch(PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg", "DB接続に失敗しました。");
		$tplPath = "error.tpl";
	}
	finally {
		$db = null;
	}
}
$smarty->display($tplPath);
?>