<?php

/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Game.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Customer.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/GameDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/CustomerDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Functions.php');

$smarty = new Smarty();
$smarty->settemplateDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates_c/");

$tplPath = "review/list.tpl";
if (loginCheck()) {
    $validationMsgs[] = 'ログインしていないか、前回ログインから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
}
else{
	if(isset($_SESSION["flashMsg"])) {
		$flashMsg = $_SESSION["flashMsg"];
		$smarty->assign("flashMsg", $flashMsg);
		unset($_SESSION["flashMsg"]);
	}

	//cleanSession();

	$gameList = [];
	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$gameDAO = new GameDAO($db);

		//全件表示ページング
		$linesPerPage = 10;
		$pageNo = 1;
		if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
			$pageNo = $_GET["page"];
		}

		$smarty->assign("pageNo", $pageNo);
		$offset = $linesPerPage * ($pageNo - 1);
		$rowCount = $gameDAO->findByGameCount();
		$totalPage = ceil($rowCount / $linesPerPage);
		if($totalPage == 0) {
			$totalPage = 1;
 		}
		$smarty->assign("totalPage", $totalPage);

		$gameList = $gameDAO->findByOnePageGame($linesPerPage,$offset);
		
		$smarty->assign("gameList", $gameList);

		

		//login.phpでセッションに入れた名前データを取得。
		$cus_name = $_SESSION['cus_name'];
		$smarty->assign('cus_name', $cus_name);	
		
	}
	catch(PDOException $ex) {
		print_r($ex);
		$smarty->assign('errorMsg', 'DB接続に失敗しました。');
		$tplPath = "error.tpl";
	}
	finally {
		$db = null;
	}
}
$smarty->display($tplPath);
