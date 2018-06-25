<?php

/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Customer.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/CustomerDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Functions.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates_c/");

$isRedirect = false;
$tplPath = "signupGoAdd.tpl";

$addSignupname = $_POST["addSignupname"];
$addSignupname = trim("$addSignupname");

$addSignuppass = $_POST["addSignuppass"];
$addSignuppass = trim("$addSignuppass");

$addSignupgender = $_POST["addSignupgender"];
$addSignupgender = trim("$addSignupgender");

$addSignuptrend = $_POST["addSignuptrend"];
$addSignuptrend = trim("$addSignuptrend");

/* バリデーション */
$validationMsgs = [];

/* レビュア名に関するバリデーション */
if (strlen($addSignupname) == 0) {
	$validationMsgs[] = "レビュア名の入力は必須です。";
}
/* パスワードに関するバリデーション */
if (strlen($addSignuppass) == 0) {
	$validationMsgs[] = "パスワードの入力は必須です。";
}
/* 性別に関するバリデーション */
if (strlen($addSignupgender) == 0) {
	$validationMsgs[] = "性別の入力は必須です。";
}


$customer = new Customer();
$customer->setCus_name($addSignupname);

$customer->setCus_pass($addSignuppass);

$customer->setCus_age("");

$customer->setCus_gender($addSignupgender);

$customer->setCus_trend($addSignuptrend);

$customer->setCus_good("0");



try{
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$customerDAO = new CustomerDAO($db);

	if(empty($validationMsgs)) {
		$result = $customerDAO->insertCustomer($customer);
		if ($result) {
			$isRedirect = true;
		}
		else {
			$smarty->assign("errorMsg", "登録に失敗しました。もう一度はじめからやり直して下さい。");
			$tplPath = "error.tpl";
		}
	}
	else {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);

		$smarty->assign("validationMsgs", $validationMsgs);
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
	//$_SESSION["flashMsg"] = "会員登録されました。";
	header("Location: /ReviewLot/");
	exit;
}
else {
	$smarty->display($tplPath);
}
?>