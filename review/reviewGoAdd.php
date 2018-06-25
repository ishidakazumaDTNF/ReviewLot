<?php

/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Game.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Customer.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Post.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/GameDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/CustomerDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/PostDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Functions.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates_c/");

$isRedirect = false;
$tplPath = "review/reviewAdd.tpl";

if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
	$tplPath = 'login.tpl';
}
else {

	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);

		if (isset($_GET["addNewReviewId"])) {
			$addNewReviewId = $_GET["addNewReviewId"];
			$_SESSION['addNewReviewId'] = $addNewReviewId;
		}
		else{
			$addNewReviewId = $_SESSION['addNewReviewId'];
		}
	
		$postDAO = new PostDAO($db);
		$post = $postDAO->findByPK($addNewReviewId);

		//login.phpで名前データを取得。
		$cus_name = $_SESSION['cus_name'];
		$smarty->assign('cus_name', $cus_name);
	
	}
	catch(PDOException $ex) {
		print_r($ex);
		$_SESSION["errorMsg"] = "DB接続に失敗しました。";
	}
	finally {
		$db = null;
	}
	
	$smarty->assign("post", $post);
}


$smarty->display($tplPath);
?>
