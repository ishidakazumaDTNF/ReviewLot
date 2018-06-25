<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/entity/Customer.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/dao/CustomerDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/ReviewLot/templates_c/');

$isRedirect = false;
$tplPath = 'login.tpl';

$loginId = $_POST['loginId'];
$loginPw = $_POST['loginPw'];

$loginId = trim($loginId);
$loginPw = trim($loginPw);

$validationMsgs = [];

if (strlen($loginId) == 0) {
    $validationMsgs[] = 'メールアドレスを入力してください。';
}
if (strlen($loginPw) == 0) {
    $validationMsgs[] = 'パスワードを入力してください。';
}

if (empty($validationMsgs)) {
    try {
        $db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
        $customerDAO = new CustomerDAO($db);

        $customer = $customerDAO->findByLoginId($loginId);
        if ($customer == null) {
            $validationMsgs[] = '存在しないメールアドレスです。正しいメールアドレスを入力してください。';
        } 
        else {
            $customerPw = $customer->getCus_pass();
             if ($loginPw == $customerPw) {
                $cus_id = $customer->getCus_Id();
                $cus_name = $customer->getCus_name();
                $cus_age = $customer->getCus_age();
                $cus_gender = $customer->getCus_gender();
                $cus_good = $customer->getCus_good();

                $_SESSION['loginFlg'] = true;
                $_SESSION['cus_id'] = $cus_id;
                $_SESSION['cus_name'] = $cus_name;
                $_SESSION['cus_age'] = $cus_age;
                $_SESSION['cus_gender'] = $cus_gender;
                $_SESSION['cus_good'] = $cus_good;
                $isRedirect = true;
            } 
            else {
                $validationMsgs[] = 'パスワードが違います。正しいパスワードを入力してください。';
            }
        }
    } 
    catch (PDOException $e) {
        print_r($e);
        $smarty->assign('errorMsg', 'DB接続に失敗しました。');
        $tplPath = 'error.tpl';
    }
    finally {
        $db = null;
    }
}

if ($isRedirect) {
    header('Location: /ReviewLot/review/showList.php');
    exit;
} 
else {
    if (!empty($validationMsgs)) {
        $smarty->assign('validationMsgs', $validationMsgs);
        $smarty->assign('loginId', $loginId);
    }
    $smarty->display($tplPath);
}
