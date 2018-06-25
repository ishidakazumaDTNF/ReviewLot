<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * カスタマーエンティティクラス。
 */
class Customer {
    /**
     * 主キーのid。
     */
    private $cus_id;
    /**
     * レビュア名。
     */
    private $cus_name;
    /**
     * パスワード。
     */
    private $cus_pass;
    /**
     * 年齢
     */
    private $cus_age;
    /**
     * 性別。
     */
    private $cus_gender;
    /**
     * 傾向。
     */
    private $cus_trend;
    /**
     * いいね。
     */
    private $cus_good;

    //以下アクセサメソッド。
    /* 主キーのid。 */
    public function getCus_id() {
        return $this->cus_id;
    }
    public function setCus_id($cus_id) {
        $this->cus_id = $cus_id;
    }

    /* レビュア名。 */
    public function getCus_name() {
        return $this->cus_name;
    }
    public function setCus_name($cus_name) {
        $this->cus_name = $cus_name;
    }

    /* パスワード。 */
    public function getCus_pass(){
        return $this->cus_pass;
    }
    public function setCus_pass($cus_pass) {
        $this->cus_pass = $cus_pass;
    }

    /* 年齢 */
    public function getCus_age(){
        return $this->cus_age;
    }
    public function setCus_age($cus_age) {
        $this->cus_age = $cus_age;
    }

    /* 性別。 */
    public function getCus_gender(){
        return $this->cus_gender;
    }
    public function setCus_gender($cus_gender) {
        $this->cus_gender = $cus_gender;
    }

    /* 傾向。 */
    public function getCus_trend(){
        return $this->cus_trend;
    }
    public function setCus_trend($cus_trend) {
        $this->cus_trend = $cus_trend;
    }

    /* いいね。 */
    public function getCus_good(){
        return $this->cus_good;
    }
    public function setCus_good($cus_good) {
        $this->cus_good = $cus_good;
    }
}
