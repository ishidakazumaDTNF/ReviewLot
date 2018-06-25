<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * customerテーブルへのデータ操作クラス。
 */
class CustomerDAO {
    /**
     * @var PDO DB接続オブジェクト
     */
    private $db;

    /**
     * コンストラクタ
     *
     * @param PDO $db DB接続オブジェクト
     */
    public function __construct(PDO $db) {
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->db = $db;
    }

    /**
     * cus_idによる検索。
     */
    public function findByLoginId($loginId)
    {
        $sql = 'SELECT * FROM customer WHERE cus_name = :cus_name';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cus_name', $loginId, PDO::PARAM_STR);
        $result = $stmt->execute();
        $customer = null;
        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cus_id = $row['cus_id'];
            $cus_name = $row['cus_name'];
            $cus_pass = $row['cus_pass'];
            $cus_age = $row['cus_age'];
            $cus_gender = $row['cus_gender'];
            $cus_trend = $row['cus_trend'];
            $cus_good = $row['cus_good'];

            $customer = new Customer();
            $customer->setCus_id($cus_id);
            $customer->setCus_name($cus_name);
            $customer->setCus_pass($cus_pass);
            $customer->setCus_age($cus_age);
            $customer->setCus_gender($cus_gender);
            $customer->setCus_trend($cus_trend);
            $customer->setCus_good($cus_good);
        }
        return $customer;
    }

    /**
	 * 会員登録。
	 */
	public function insertCustomer(Customer $customer) {
		$sql = "INSERT INTO customer(cus_name, cus_pass, cus_age, cus_gender, cus_trend, cus_good) VALUES (:cus_name, :cus_pass, :cus_age, :cus_gender, :cus_trend, :cus_good)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":cus_name", $customer->getCus_name(), PDO::PARAM_STR);
		$stmt->bindValue(":cus_pass", $customer->getCus_pass(), PDO::PARAM_STR);
		$stmt->bindValue(":cus_age", $customer->getCus_age(), PDO::PARAM_STR);
		$stmt->bindValue(":cus_gender", $customer->getCus_gender(), PDO::PARAM_STR);
		$stmt->bindValue(":cus_trend", $customer->getCus_trend(), PDO::PARAM_STR);
		$stmt->bindValue(":cus_good", $customer->getCus_good(), PDO::PARAM_STR);
		$result = $stmt->execute();
		return $result;
	}


}
?>
