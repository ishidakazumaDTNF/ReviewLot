<?php

/**
 *  WP32 PHP評価課題 
 *  iw13a727 01 ishidakazuma
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/entity/Reports.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/entity/Reportcates.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/dao/ReportsDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/dao/ReportcatesDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wp32/sharereports/classes/Functions.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/wp32/sharereports/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/wp32/sharereports/templates_c/");

$tplPath = "reports/edit.tpl";

$reportsList = [];
$reportcatesList = [];

if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
} 
else{
    $editReportsId = $_POST["editReportsId"];

    try {
        $db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
        $reportsDAO = new ReportsDAO($db);
        $reportcatesDAO = new ReportcatesDAO($db);
    
        $reports = $reportsDAO->findByPKoriginal($editReportsId);
        $reportsList = $reportsDAO->findAll();
        $reportcatesList = $reportcatesDAO->findAll();

        //login.phpでセッションに入れた結合された名前データを取得。
		$name = $_SESSION['name'];
		$smarty->assign('name', $name);
    
        (string) $time = strtotime($reports->getRp_date());
		$timey = date('Y', $time);
		$timem = date('m', $time);
		$timed = date('d', $time);
	
		$smarty->assign('timey', $timey);
		$smarty->assign('timem', $timem);
		$smarty->assign('timed', $timed);

		(string) $time2 = strtotime($reports->getRp_time_from());
		$timeh = date('H', $time2);
		$timei = date('i', $time2);
	
		$smarty->assign('timeh', $timeh);
		$smarty->assign('timei', $timei);

		(string) $time3 = strtotime($reports->getRp_time_to());
		$timeh2 = date('H', $time3);
		$timei2 = date('i', $time3);
	
		$smarty->assign('timeh2', $timeh2);
		$smarty->assign('timei2', $timei2);

		$smarty->assign("reports", $reports);
		$smarty->assign("reportsList", $reportsList);
		$smarty->assign("reportcatesList", $reportcatesList);


        
    }
    catch (PDOException $ex) {
        print_r($ex);
        $smarty->assign("errorMsg", "DB接続に失敗しました。");
        $tplPath = "error.tpl";
    }
    finally {
        $db =null;
    }
    //$hire = explode("-", $emp->getHiredate());
}

$smarty->display($tplPath);
?>
