<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * ゲームエンティティクラス
 */
class Game {
    /**
     * ゲームID。
     */
    private $gm_id;
    /**
     * ゲーム名。
     */
    private $gm_name = "";
    /**
     * 対応ハードウェア。
     */
    private $gm_hardware = "";
    /**
     * リリース日。
     */
    private $gm_release = "";
    /**
     * メーカー。
     */
    private $gm_manufacturer = "";
    /**
     * ゲーム画像パス
     */
    private $gm_gazopath = "";

    //以下アクセサメソッド。
    /* ゲームID。 */
    public function getGm_id() {
        return $this->gm_id;
    }
    public function setGm_id($gm_id) {
        $this->gm_id = $gm_id;
    }
    /* ゲーム名。 */
    public function getGm_name() {
        return $this->gm_name;
    }
    public function setGm_name($gm_name) {
        $this->gm_name = $gm_name;
    }
    /* 対応ハードウェア。 */
    public function getGm_hardware() {
        return $this->gm_hardware;
    }
    public function setGm_hardware($gm_hardware) {
        $this->gm_hardware = $gm_hardware;
    }
    /* リリース日。 */
    public function getGm_release() {
        return $this->gm_release;
    }
    public function setGm_release($gm_release) {
        $this->gm_release = $gm_release;
    }
    /* メーカー。 */
    public function getGm_manufacturer() {
        return $this->gm_manufacturer;
    }
    public function setGm_manufacturer($gm_manufacturer) {
        $this->gm_manufacturer = $gm_manufacturer;
    }
    /* ゲーム画像パス。 */
    public function getGm_gazopath() {
        return $this->gm_gazopath;
    }
    public function setGm_gazopath($gm_gazopath) {
        $this->gm_gazopath = $gm_gazopath;
    }
}
?>