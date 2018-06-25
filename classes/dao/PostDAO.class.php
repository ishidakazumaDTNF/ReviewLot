<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * postテーブルへのデータ操作クラス。
 */
class PostDAO {
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
	 * 主キー(pos_id)による検索。
	 */
	public function findByPK($pos_id) {
		$sql = "SELECT * FROM post WHERE pos_id = :pos_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":pos_id", $pos_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$post = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$pos_id = $row["pos_id"];
			$pos_star = $row["pos_star"];
			$pos_possession = $row["pos_possession"];
			$pos_playtime = $row["pos_playtime"];
			$pos_text = $row["pos_text"];
			$pos_spoiler = $row["pos_spoiler"];
			$pos_cus_id = $row["pos_cus_id"];
			$pos_gm_id = $row["pos_gm_id"];
			//$pos_gm_id = $this->findReportcatename($pos_gm_id);
			$pos_created_at = $row["pos_created_at"];

			$post = new Post();
			$post->setPos_id($pos_id);
			$post->setPos_star($pos_star);
			$post->setPos_possession($pos_possession);
			$post->setPos_playtime($pos_playtime);
			$post->setPos_text($pos_text);
			$post->setPos_spoiler($pos_spoiler);
			$post->setPos_cus_id($pos_cus_id);
			$post->setPos_gm_id($pos_gm_id);
			$post->setPos_created_at($pos_created_at);
		}

		return $post;
	}

	/**
	 * 全レビュー取得。
	 */
	public function findAll() {
		$sql = "SELECT * FROM post ORDER BY pos_id";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$postList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$pos_id = $row["pos_id"];
			$pos_star = $row["pos_star"];
			$pos_possession = $row["pos_possession"];
			$pos_playtime = $row["pos_playtime"];
			$pos_text = $row["pos_text"];
			$pos_spoiler = $row["pos_spoiler"];
			$pos_cus_id = $row["pos_cus_id"];
			$pos_gm_id = $row["pos_gm_id"];
			$pos_created_at = $row["pos_created_at"];

			$post = new Post();
			$post->setPos_id($pos_id);
			$post->setPos_star($pos_star);
			$post->setPos_possession($pos_possession);
			$post->setPos_playtime($pos_playtime);
			$post->setPos_text($pos_text);
			$post->setPos_spoiler($pos_spoiler);
			$post->setPos_cus_id($pos_cus_id);
			$post->setPos_gm_id($pos_gm_id);
			$post->setPos_created_at($pos_created_at);
			$postList[$pos_id] = $post;
		}
		return $postList;
	}

	//そのゲームに対するレビューの総数
	public function findByReviewCount($pos_gm_id) {
		$sqlCount = "SELECT COUNT(*) AS count FROM post WHERE pos_gm_id = :pos_gm_id";
		$stmt = $this->db->prepare($sqlCount);
		$stmt->bindValue(":pos_gm_id", $pos_gm_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$reviewCount = $row["count"];
		}
		return $reviewCount;
	}

	//そのゲームに対するレビューの総数(マッチングソート)
	public function findByReviewCountMatching($pos_gm_id,$cus_trend) {
		$sqlCount = "SELECT COUNT(*) AS count FROM post 
		INNER JOIN customer ON pos_cus_id = cus_id WHERE cus_trend = :cus_trend AND pos_gm_id = :pos_gm_id";
		$stmt = $this->db->prepare($sqlCount);
		$stmt->bindValue(":cus_trend", $cus_trend, PDO::PARAM_STR);
		$stmt->bindValue(":pos_gm_id", $pos_gm_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$reviewCount = $row["count"];
		}
		return $reviewCount;
	}

	/**
	 * ポストテーブルの項目をページネーション込みでお返し
	 */
	public function findByOnePagePost($pos_gm_id,$limit,$offset){
		$sqlList = "SELECT * FROM post WHERE pos_gm_id = :pos_gm_id ORDER BY pos_created_at DESC LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sqlList);
		$stmt->bindValue(":pos_gm_id", $pos_gm_id, PDO::PARAM_INT);
		$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
		$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
		$result = $stmt->execute();
		$posList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$pos_id = $row["pos_id"];
			$pos_star = $row["pos_star"];
			$pos_possession = $row["pos_possession"];
			$pos_playtime = $row["pos_playtime"];
			$pos_text = $row["pos_text"];
			$pos_spoiler = $row["pos_spoiler"];
			$pos_cus_id = $row["pos_cus_id"];
			$pos_cus_id = $this->findUser($pos_cus_id);
			$pos_gm_id = $row["pos_gm_id"];
			$pos_created_at = $row["pos_created_at"];

			$post = new Post();
			$post->setPos_id($pos_id);
			$post->setPos_star($pos_star);
			$post->setPos_possession($pos_possession);
			$post->setPos_playtime($pos_playtime);
			$post->setPos_text($pos_text);
			$post->setPos_spoiler($pos_spoiler);
			$post->setPos_cus_id($pos_cus_id);
			$post->setPos_gm_id($pos_gm_id);
			$post->setPos_created_at($pos_created_at);
			$postList[$pos_id] = $post;
		}
		return $postList;
	}

	/**
	 * ポストテーブルの項目をページネーション込みでお返し(matching)
	 */
	public function findByOnePagePostMatching($pos_gm_id,$cus_trend,$limit,$offset){
		$sqlList = "SELECT * FROM post 
		INNER JOIN customer ON pos_cus_id = cus_id WHERE cus_trend = :cus_trend AND pos_gm_id = :pos_gm_id ORDER BY pos_created_at DESC LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sqlList);
		$stmt->bindValue(":pos_gm_id", $pos_gm_id, PDO::PARAM_INT);
		$stmt->bindValue(":cus_trend", $cus_trend, PDO::PARAM_STR);
		$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
		$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
		$result = $stmt->execute();
		$posList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$pos_id = $row["pos_id"];
			$pos_star = $row["pos_star"];
			$pos_possession = $row["pos_possession"];
			$pos_playtime = $row["pos_playtime"];
			$pos_text = $row["pos_text"];
			$pos_spoiler = $row["pos_spoiler"];
			$pos_cus_id = $row["pos_cus_id"];
			$pos_cus_id = $this->findUser($pos_cus_id);
			$pos_gm_id = $row["pos_gm_id"];
			$pos_created_at = $row["pos_created_at"];

			$post = new Post();
			$post->setPos_id($pos_id);
			$post->setPos_star($pos_star);
			$post->setPos_possession($pos_possession);
			$post->setPos_playtime($pos_playtime);
			$post->setPos_text($pos_text);
			$post->setPos_spoiler($pos_spoiler);
			$post->setPos_cus_id($pos_cus_id);
			$post->setPos_gm_id($pos_gm_id);
			$post->setPos_created_at($pos_created_at);
			$postList[$pos_id] = $post;
		}
		return $postList;
	}

	/**
	 * cus_nameを検索。
	*/
    public  function findUser($pos_cus_id) {
        $sql = "SELECT cus_name FROM customer WHERE cus_id=:pos_cus_id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindValue(":pos_cus_id", $pos_cus_id, PDO::PARAM_INT);
        $result=$stmt->execute();
        if($result && $row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $pos_cus_id = $row["cus_name"];
        }
        return $pos_cus_id;
	}

	/**
	 * cus_trendを検索。
	*/
    public  function findUsertrend($matchId) {
        $sql = "SELECT cus_trend FROM customer WHERE cus_id=:matchId";
        $stmt=$this->db->prepare($sql);
        $stmt->bindValue(":matchId", $matchId, PDO::PARAM_INT);
        $result=$stmt->execute();
        if($result && $row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $matchId = $row["cus_trend"];
        }
        return $matchId;
	}
	

	/**
	 * レビュー投稿。
	 */
	public function insert(Post $post) {
		$sql = "INSERT INTO post(pos_star, pos_possession, pos_playtime, pos_text, pos_spoiler, pos_cus_id, pos_gm_id, pos_created_at) VALUES (:pos_star, :pos_possession, :pos_playtime, :pos_text, :pos_spoiler, :pos_cus_id, :pos_gm_id, :pos_created_at)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":pos_star", $post->getPos_star(), PDO::PARAM_STR);
		$stmt->bindValue(":pos_possession", $post->getPos_possession(), PDO::PARAM_STR);
		$stmt->bindValue(":pos_playtime", $post->getPos_playtime(), PDO::PARAM_STR);
		$stmt->bindValue(":pos_text", $post->getPos_text(), PDO::PARAM_STR);
		$stmt->bindValue(":pos_spoiler", $post->getPos_spoiler(), PDO::PARAM_STR);
		$stmt->bindValue(":pos_cus_id", $post->getPos_cus_id(), PDO::PARAM_INT);
		$stmt->bindValue(":pos_gm_id", $post->getPos_gm_id(), PDO::PARAM_INT);
		$stmt->bindValue(":pos_created_at", $post->getPos_created_at(), PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}














	/**
	 * 
	 * 全件。ユーザidは名前を取得。
	 * 
	 */
	public function findShowList() {
		$sql = "SELECT * FROM reports ORDER BY rp_date";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$reportsList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$id = $row["id"];
				$rp_date = $row["rp_date"];
				$rp_time_from = $row["rp_time_from"];
				$rp_time_to = $row["rp_time_to"];
				$rp_content = $row["rp_content"];
				$rp_created_at = $row["rp_created_at"];
				$reportcate_id = $row["reportcate_id"];
				$user_id = $row["user_id"];
				$user_id = $this->findUser($user_id);
	
				$reports = new Reports();
				$reports->setId($id);
				$reports->setRp_date($rp_date);
				$reports->setRp_time_from($rp_time_from);
				$reports->setRp_time_to($rp_time_to);
				$reports->setRp_content($rp_content);
				$reports->setRp_created_at($rp_created_at);
				$reports->setReportcate_id($reportcate_id);
				$reports->setUser_id($user_id);
				$empList[$id] = $reports;
		}
		return $reportsList;
	}

	/**
	 * レポート更新。　更新対象は1レコードのみ。
	 *
	 * @param Reports $reports 更新情報が格納されたReportsオブジェクト。主キーがこのオブジェクトのidの値のレコードを更新する。
	 * @return boolean 更新が成功したかどうかを表す値。
	 */
	public function update(Reports $reports) {
		$sql = "UPDATE reports SET rp_date = :rp_date, rp_time_from = :rp_time_from, rp_time_to = :rp_time_to, rp_content = :rp_content, reportcate_id = :reportcate_id WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":rp_date", $reports->getRp_date(), PDO::PARAM_STR);
		$stmt->bindValue(":rp_time_from", $reports->getRp_time_from(), PDO::PARAM_STR);
		$stmt->bindValue(":rp_time_to", $reports->getRp_time_to(), PDO::PARAM_STR);
		$stmt->bindValue(":rp_content", $reports->getRp_content(), PDO::PARAM_STR);
		$stmt->bindValue(":reportcate_id", $reports->getReportcate_id(), PDO::PARAM_STR);
		$stmt->bindValue(":id", $reports->getId(), PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}

	/**
	 * レポート削除。 削除対象は1レコードのみ。
	 *
	 * @param integer $id 削除対象の主キー。
	 * @return boolean 削除が成功したかどうかを表す値。
	 */
	public function delete($id) {
		$sql = "DELETE FROM reports WHERE id = :id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id", $id, PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}

	/**
	 * reportsテーブルのreportcate_idを引数にreportcatesテーブルのrc_nameを検索。
	*/
    public  function findReportcatename($reportcate_id) {
        $sql = "SELECT rc_name FROM reportcates WHERE id=:reportcate_id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindValue(":reportcate_id", $reportcate_id, PDO::PARAM_INT);
        $result=$stmt->execute();
        if($result && $row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $reportcate_id = $row["rc_name"];
        }
        return $reportcate_id;
	}
	
	//従業員の総数を返す
	public function findByReportsCount() {
		$sqlCount = "SELECT COUNT(*) AS count FROM reports";
		$stmt = $this->db->prepare($sqlCount);
		$result = $stmt->execute();
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$rowCount = $row["count"];
		}
		return $rowCount;
	}

	/**
	 * 
	 * 作業日・作業内容・報告者名をページネーション込みでお返し
	 * 
	 */
	public function findByOnePageReports($limit,$offset){
		$sqlList = "SELECT * FROM reports ORDER BY rp_date LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sqlList);
		$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
		$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
		$result = $stmt->execute();
		$reportsList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$rp_date = $row["rp_date"];
			$rp_content = $row["rp_content"];
			//ここで10文字だけ取り出す。
			$rp_content = mb_substr($rp_content,0,10,"UTF-8");
			$user_id = $row["user_id"];
			$user_id = $this->findUser($user_id);//user_idには報告者名を格納

			$reports = new Reports();
			$reports->setId($id);
			$reports->setRp_date($rp_date);
			$reports->setRp_content($rp_content);
			$reports->setUser_id($user_id);
			$reportsList[$id] = $reports;
		}
		return $reportsList;
	}
}
?>