<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/ReviewLot/classes/Conf.php';

session_destroy();

header('Location: /ReviewLot/index.php');
exit;
