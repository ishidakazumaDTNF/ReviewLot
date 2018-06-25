<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * ログイン済かどうかをチェックする関数。
 * セッションからログイン情報が見つからない場合はログアウト状態と判定する。
 *
 * @return boolean ログアウト状態の場合はtrue、ログイン状態の場合はfalse。
 */
function loginCheck() {
    $result = false;

    if (!isset($_SESSION['loginFlg']) || $_SESSION['loginFlg'] == false || !isset($_SESSION['cus_id']) ) {
        $result = true;
    }

    return $result;
}

/** 
 * Session情報の掃除関数。
 * ログイン情報以外のセッション中の情報を一度破棄する。
 * 各ユースケース最初の実行phpでこの関数を実行する。
 */
function cleanSession() {
    $loginFlg = $_SESSION['loginFlg'];
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $auth = $_SESSION['auth'];

    session_unset();

    $_SESSION['loginFlg'] = $loginFlg;
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['auth'] = $auth;
}
?>
