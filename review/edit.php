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

if (loginCheck()) {
    $validationMsgs[] = 'ログインしてから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
    $smarty->display($tplPath);
} 
else{
	$isRedirect = false;
	$tplPath = "reports/edit.tpl";

	$editReportsId = $_POST["editReportsId"];

	$editreportsRpdateYear = $_POST["editreportsRpdateYear"];
	$editreportsRpdateMonth = $_POST["editreportsRpdateMonth"];
	$editreportsRpdateDay = $_POST["editreportsRpdateDay"];
	
	$editreportsFortimeHour = $_POST["editreportsFortimeHour"];
	$editreportsFortimeMinute = $_POST["editreportsFortimeMinute"];
	
	$editreportsTotimeHour = $_POST["editreportsTotimeHour"];
	$editreportsTotimeMinute = $_POST["editreportsTotimeMinute"];
	
	$editReportcatesId = $_POST["editReportcatesId"];
	
	$editReportsContent = $_POST["editReportsContent"];
	
	$editreportsRpdateYear = trim("$editreportsRpdateYear");
	$editreportsRpdateMonth = trim("$editreportsRpdateMonth");
	$editreportsRpdateDay = trim("$editreportsRpdateDay");
	
	$editReportcatesId = trim("$editReportcatesId");
	
	$editReportsContent = trim("$editReportsContent");
	
	/* 作業日 年月日ドロップダウン結合 */
	$editreportsRpdate = $editreportsRpdateYear."-".$editreportsRpdateMonth."-".$editreportsRpdateDay;

	/* 作業開始時間 時分ドロップダウン結合 */
	$editreportsFortime = $editreportsFortimeHour.":".$editreportsFortimeMinute;

	/* 作業終了時間 時分ドロップダウン結合 */
	$editreportsTotime = $editreportsTotimeHour.":".$editreportsTotimeMinute;
	
	/* バリデーション */
	$validationMsgs = [];
	
	/* 作業内容に関するバリデーション */
	if (strlen($editReportsContent) == 0) {
		$validationMsgs[] = "作業内容の入力は必須です。";
	}
	/* 作業種類に関するバリデーション */
	if (strlen($editReportcatesId) == 0) {
		$validationMsgs[] = "作業種類の選択は必須です。";
	}

	/* 時刻に関するバリデーション */
	if (strtotime(date($editreportsFortime)) >= strtotime($editreportsTotime)) {
		$validationMsgs[] = "時刻を正しく入力してください。";
	}
	
	$reports = new Reports();

	$reports->setId($editReportsId);

	$reports->setRp_dateYear($editreportsRpdateYear);
	$reports->setRp_dateMonth($editreportsRpdateMonth);
	$reports->setRp_dateDay($editreportsRpdateDay);
	$reports->setRp_date($editreportsRpdate);
	
	$reports->setRp_time_fromHour($editreportsFortimeHour);
	$reports->setRp_time_fromMinute($editreportsFortimeMinute);
	$reports->setRp_time_from($editreportsFortime);
	
	$reports->setRp_time_toHour($editreportsTotimeHour);
	$reports->setRp_time_toMinute($editreportsTotimeMinute);
	$reports->setRp_time_to($editreportsTotime);
	
	$reports->setReportcate_id($editReportcatesId);
	
	$reports->setRp_content($editReportsContent);
	
	try{
		if (empty($validationMsgs)) {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$reportsDAO = new ReportsDAO($db);
			$result = $reportsDAO->update($reports);
			if ($result) {
				$isRedirect = true;
			}
			else {
				$smarty->assign("errorMsg", "情報登録に失敗しました。もう一度はじめからやり直して下さい。");
				$tplPath = "error.tpl";
			}
		}
		else{
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$reportsDAO = new ReportsDAO($db);
			$reportcatesDAO = new ReportcatesDAO($db);
	
			$reportsList = $reportsDAO->findAll();
			$reportcatesList = $reportcatesDAO->findAll();

			//login.phpでセッションに入れた名前データを取得。
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
	
			$smarty->assign("validationMsgs", $validationMsgs);
			$smarty->assign("reports", $reports);
			$smarty->assign("reportsList", $reportsList);
			$smarty->assign("reportcatesList", $reportcatesList);
		}
	}
	catch(PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg", "DB接続に失敗しました。");
		$tplPath = "error.tpl";
	}
	finally {
		$db = null;
	}
	
	if ($isRedirect) {
		$_SESSION["flashMsg"] = "レポートを編集しました。";
		header("Location: /wp32/sharereports/reports/showDetail.php");
		exit;
	}
	else {
		$smarty->display($tplPath);
	}
}
?>
