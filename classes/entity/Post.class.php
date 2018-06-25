<?php

/**
 *  WP32 PHP評価課題 
 *  iw13a727 01 ishidakazuma
 */

/**
 * 投稿エンティティクラス。
 */
class Post {
	/**
 	 * 投稿ID。
 	 */
	private $pos_id;
	/**
	 * 星。
	 */
	private $pos_star = "";
	/**
	 * 所持。
	 */
	private $pos_possession = "";
	/**
	 * プレイ時間。
	 */
	private $pos_playtime = "";
	/**
	 * 本文。
	 */
	private $pos_text = "";
	/**
	 * ネタバレ。
	 */
	private $pos_spoiler = "";
	/**
	 * 投稿者id。
	 */
	private $pos_cus_id = "";
	/**
	 * 投稿ゲームid。
	 */
	private $pos_gm_id = "";
	/**
	 * 投稿日。
	 */
	private $pos_created_at = "";

	//以下アクセサメソッド。
	/* 投稿ID */
	public function getPos_id() {
		return $this->pos_id;
	}
	public function setPos_id($pos_id) {
		$this->pos_id = $pos_id;
	}
	/* 星 */
	public function getPos_star() {
		return $this->pos_star;
	}
	public function setPos_star($pos_star) {
		$this->pos_star = $pos_star;
	}
	/* 所持 */
	public function getPos_possession() {
		return $this->pos_possession;
	}
	public function setPos_possession($pos_possession) {
		$this->pos_possession = $pos_possession;
	}
	/* プレイ時間 */
	public function getPos_playtime() {
		return $this->pos_playtime;
	}
	public function setPos_playtime($pos_playtime){
		$this->pos_playtime = $pos_playtime;
	}
	/* 本文 */
	public function getPos_text() {
		return $this->pos_text;
	}
	public function setPos_text($pos_text) {
		$this->pos_text = $pos_text;
	}
	/* ネタバレ */
	public function getPos_spoiler() {
		return $this->pos_spoiler;
	}
	public function setPos_spoiler($pos_spoiler) {
		$this->pos_spoiler = $pos_spoiler;
	}
	/* 投稿者id */
	public function getPos_cus_id() {
		return $this->pos_cus_id;
	}
	public function setPos_cus_id($pos_cus_id) {
		$this->pos_cus_id = $pos_cus_id;
	}
	/* 投稿ゲームid */
	public function getPos_gm_id() {
		return $this->pos_gm_id;
	}
	public function setPos_gm_id($pos_gm_id) {
		$this->pos_gm_id = $pos_gm_id;
	}
	/* 投稿日 */
	public function getPos_created_at() {
		return $this->pos_created_at;
	}
	public function setPos_created_at($pos_created_at) {
		$this->pos_created_at = $pos_created_at;
	}
}
?>