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

$addReviewstar = $_POST["addReviewstar"];
$addReviewstar = trim("$addReviewstar");

$addReviewpossession = $_POST["addReviewpossession"];
$addReviewpossession = trim("$addReviewpossession");

$addReviewplaytime = $_POST["addReviewplaytime"];
$addReviewplaytime = trim("$addReviewplaytime");

$addReviewtext = $_POST["addReviewtext"];
$addReviewtext = trim("$addReviewtext");

$addReviewspoiler = $_POST["addReviewspoiler"];
$addReviewspoiler = trim("$addReviewspoiler");


/* バリデーション */
$validationMsgs = [];

/* 作業内容に関するバリデーション */
if (strlen($addReviewstar) == 0) {
	$validationMsgs[] = "評価の入力は必須です。";
}
/* 作業種類に関するバリデーション */
if (strlen($addReviewtext) == 0) {
	$validationMsgs[] = "レビュー内容の入力は必須です。";
}

/* login.phpでセッションに入れたcus_idを取得(ログインしているならば必ず取得) */
$cus_id = $_SESSION['cus_id'];//pos_cus_idに入れる
$addNewReviewId = $_SESSION['addNewReviewId'];//pos_gm_idに入れる

$post = new Post();

$post->setPos_star($addReviewstar);

$post->setPos_possession($addReviewpossession);

$post->setPos_playtime($addReviewplaytime);

$post->setPos_text($addReviewtext);

$post->setPos_spoiler($addReviewspoiler);

$post->setPos_cus_id($cus_id);

$post->setPos_gm_id($addNewReviewId);

$post->setPos_created_at(date("Y-m-d H:i:s"));

try{
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$postDAO = new PostDAO($db);

	if(empty($validationMsgs)) {
		$result = $postDAO->insert($post);
		if ($result) {
			$isRedirect = true;
		}
		else {
			$smarty->assign("errorMsg", "投稿に失敗しました。もう一度はじめからやり直して下さい。");
			$tplPath = "error.tpl";
		}
	}
	else {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);

		$postDAO = new PostDAO($db);
		$post = $postDAO->findByPK($addNewReviewId);

		//login.phpでセッションに入れた名前データを取得。
		$cus_name = $_SESSION['cus_name'];
		$smarty->assign('cus_name', $cus_name);

		$smarty->assign("validationMsgs", $validationMsgs);
		$smarty->assign("post", $post);
	}
}
catch(PDOException $ex) {
	print_r($ex);
	$_SESSION["errorMsg"] = "DB接続に失敗しました。";
	$tplPath = "error.tpl";
}
finally {
	$db = null;
}

if($isRedirect) {
	$_SESSION["flashMsg"] = "投稿しました。";
	header("Location: /ReviewLot/review/showDetail.php");
	exit;
}
else {
	$smarty->display($tplPath);
}
?>