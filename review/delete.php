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


if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
    $smarty->display($tplPath);
} 
else{
	$isRedirect = false;
	$tplPath = "error.tpl";
	$deleteReportsId = $_POST["deleteReportsId"];

	try{
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$reportsDAO = new ReportsDAO($db);
		$result = $reportsDAO->delete($deleteReportsId);
		if ($result) {
			$isRedirect = true;
			//login.phpでセッションに入れた名前データを取得。
			$name = $_SESSION['name'];
			$smarty->assign('name', $name);
		}
		else{
			$smarty->assign("errorMsg", "情報削除に失敗しました。もう一度はじめからやり直してください。");
		}
	}
	catch(PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg", "DB接続に失敗しました。");
	}
	finally {
		$db = null;
	}
	
	if ($isRedirect) {
		$_SESSION["flashMsg"] = "レポートを削除しました。";
		header("Location: /wp32/sharereports/reports/showList.php");
		exit;
	}
	else {
		$smarty->display($tplPath);
	}
}
?>