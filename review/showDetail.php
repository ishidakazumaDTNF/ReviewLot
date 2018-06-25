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
$smarty->settemplateDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/ReviewLot/templates_c/");

$tplPath = "review/detail.tpl";
if (loginCheck()) {
    $validationMsgs[] = 'ログインしていないか、前回ログインから一定時間が経過しています。もう一度ログインしなおしてください。';
    $smarty->assign('validationMsgs', $validationMsgs);
    $tplPath = 'login.tpl';
}
else{

	if(isset($_SESSION["flashMsg"])) {
		$flashMsg = $_SESSION["flashMsg"];
		$smarty->assign("flashMsg", $flashMsg);
	}

	$postList = [];
	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$gameDAO = new GameDAO($db);
		$postDAO = new PostDAO($db);
		if (isset($_GET["detailGameId"])) {
			$detailGameId = $_GET["detailGameId"];
			$_SESSION['detailGameId'] = $detailGameId;
		}
		else{
			$detailGameId = $_SESSION['detailGameId'];
		}
			//ゲームの情報取得
			$game = $gameDAO->findByPK($detailGameId);
			$smarty->assign("game", $game);

			//レビュー表示ページング
			$linesPerPage = 4;
			$pageNo = 1;
			if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
				$pageNo = $_GET["page"];
			}

			$smarty->assign("pageNo", $pageNo);
			$offset = $linesPerPage * ($pageNo - 1);

			if (isset($_POST["matchId"])) {//マッチングボタンが押されたら
				$matchId = $_POST["matchId"];//idなげ
				$matchTrend = $postDAO->findUsertrend($matchId);//自分のtrend入ってる
				$reviewCount = $postDAO->findByReviewCountMatching($detailGameId,$matchTrend);
				$totalPage = ceil($reviewCount / $linesPerPage);
				if($totalPage == 0) {
					$totalPage = 1;
				}
				$smarty->assign("totalPage", $totalPage);
				$postList = $postDAO->findByOnePagePostMatching($detailGameId,$matchTrend,$linesPerPage,$offset);

				$smarty->assign("matchmode", 1);
			}
			else{
				$reviewCount = $postDAO->findByReviewCount($detailGameId);
				$totalPage = ceil($reviewCount / $linesPerPage);
				if($totalPage == 0) {
					$totalPage = 1;
				}
				$smarty->assign("totalPage", $totalPage);
				$postList = $postDAO->findByOnePagePost($detailGameId,$linesPerPage,$offset);
			}
			if (isset($_POST["matchIdClear"])) {//マッチング解除ボタンが押されたら
				$reviewCount = $postDAO->findByReviewCount($detailGameId);
				$totalPage = ceil($reviewCount / $linesPerPage);
				if($totalPage == 0) {
					$totalPage = 1;
				}
				$smarty->assign("totalPage", $totalPage);
				$postList = $postDAO->findByOnePagePost($detailGameId,$linesPerPage,$offset);
			}

			$smarty->assign("postList", $postList);

			$smarty->assign("reviewCount", $reviewCount);//レビュー総数表示で使用

			$game->getGm_id();

		//login.phpでセッションに入れた名前データ,アドレスデータを取得。
		$cus_name = $_SESSION['cus_name'];
		$smarty->assign('cus_name', $cus_name);	
		$cus_id = $_SESSION['cus_id'];
		$smarty->assign('cus_id', $cus_id);	
		
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
