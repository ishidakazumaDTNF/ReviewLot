<?php
/**
 *  就職作品
 *  iw13a727 01 ishidakazuma
 */

/**
 * Gameテーブルへのデータ操作クラス。
 */
class GameDAO {
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
     * 主キー(gm_id)による検索。
     */
    public function findByPK($gm_id) {
        $sql = 'SELECT * FROM game WHERE gm_id = :gm_id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':gm_id', $gm_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $game = null;
        if ($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gm_id = $row["gm_id"];
            $gm_name = $row["gm_name"];
            $gm_hardware = $row["gm_hardware"];
            $gm_release = $row["gm_release"];
            $gm_manufacturer = $row["gm_manufacturer"];
            $gm_gazopath = $row["gm_gazopath"];

            $game = new Game();
            $game->setGm_id($gm_id);
			$game->setGm_name($gm_name);
            $game->setGm_hardware($gm_hardware);
            $game->setGm_release($gm_release);
            $game->setGm_manufacturer($gm_manufacturer);
            $game->setGm_gazopath($gm_gazopath);
        }
        return $game;
    }

    //ゲームの総数を返す
	public function findByGameCount() {
		$sqlCount = "SELECT COUNT(*) AS count FROM game";
		$stmt = $this->db->prepare($sqlCount);
		$result = $stmt->execute();
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$rowCount = $row["count"];
		}
		return $rowCount;
	}

    /**
	 * ゲームテーブルの項目をページネーション込みでお返し
	 */
	public function findByOnePageGame($limit,$offset){
		$sqlList = "SELECT * FROM game ORDER BY gm_release LIMIT :limit OFFSET :offset";
		$stmt = $this->db->prepare($sqlList);
		$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
		$stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
		$result = $stmt->execute();
		$gameList = [];

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$gm_id = $row["gm_id"];
			$gm_name = $row["gm_name"];
			$gm_hardware = $row["gm_hardware"];
			$gm_release = $row["gm_release"];
            $gm_manufacturer = $row["gm_manufacturer"];
            $gm_gazopath = $row['gm_gazopath'];

			$game = new Game();
			$game->setGm_id($gm_id);
			$game->setGm_name($gm_name);
            $game->setGm_hardware($gm_hardware);
            $game->setGm_release($gm_release);
            $game->setGm_manufacturer($gm_manufacturer);
            $game->setGm_gazopath($gm_gazopath);
			$gameList[$gm_id] = $game;
		}
		return $gameList;
	}












    /**
     * 全レポートカテゴリ。
     *
     * @return array レポートカテゴリが格納された連想配列。 キーは作業種類ID、値はReportcatesエンティティオブジェクト。
     */
    public function findAll() {
        $sql = 'SELECT * FROM reportcates ORDER BY id';
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        $reportcatesList = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $rc_name = $row['rc_name'];
            $rc_note = $row['rc_note'];
            $rc_list_flg = $row['rc_list_flg'];
            $rc_order = $row['rc_order'];

            $reportcates = new Reportcates();
            $reportcates->setId($id);
            $reportcates->setRc_name($rc_name);
            $reportcates->setRc_note($rc_note);
            $reportcates->setRc_list_flg($rc_list_flg);
            $reportcates->setRc_order($rc_order);
            $reportcatesList[$id] = $reportcates;
        }
        return $reportcatesList;
    }

    /**
     * 部門情報登録。
     *
     * @param Dept $dept 登録情報が格納されたDeptオブジェクト。
     * @return boolean 登録が成功したかどうかを表す値。
     */
    public function insert(Dept $dept) {
        $sqlInsert = 'INSERT INTO dept (deptno, dname, loc) VALUES (:deptno, :dname, :loc)';
        $stmt = $this->db->prepare($sqlInsert);
        $stmt->bindValue(':deptno', $dept->getDeptno(), PDO::PARAM_INT);
        $stmt->bindValue(':dname', $dept->getDname(), PDO::PARAM_STR);
        $stmt->bindValue(':loc', $dept->getLoc(), PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }

    /**
     * 部門情報更新。 更新対象は1レコードのみ。
     *
     * @param Dept $dept 更新情報が格納されたDeptオブジェクト。主キーがこのオブジェクトのdeptnoの値のレコードを更新する。
     * @return boolean 登録が成功したかどうかを表す値。
     */
    public function update(Dept $dept) {
        $sql = 'UPDATE dept SET dname = :dname, loc = :loc WHERE deptno = :deptno';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':dname', $dept->getDname(), PDO::PARAM_STR);
        $stmt->bindValue(':loc', $dept->getLoc(), PDO::PARAM_STR);
        $stmt->bindValue(':deptno', $dept->getDeptno(), PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    /**
     * 部門情報削除。 削除対象は1レコードのみ。
     *
     * @param integer $deptno 削除対象の主キー。
     * @return boolean 登録が成功したかどうかを表す値。
     */
    public function delete($deptno) {
        $sql = 'DELETE FROM dept WHERE deptno = :deptno';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':deptno', $deptno, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    /**
     * 部門名のキーワード検索。
     *
     * @param $keyword 部門名に含まれるキーワード。
     * @return array 検索結果が格納された連想配列。キーは部門番号、値はDeptエンティティオブジェクト。
     */
    public function findByDnameKeyword($keyword) {
        $sql = 'SELECT * FROM dept WHERE dname LIKE :keyword ORDER BY deptno';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':keyword', '%'.$keyword.'%', PDO::PARAM_STR);
        $result = $stmt->execute();
        $deptList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $deptno = $row['deptno'];
            $dname = $row['dname'];
            $loc = $row['loc'];

            $dept = new Dept();
            $dept->setDeptno($deptno);
            $dept->setDname($dname);
            $dept->setLoc($loc);
            $deptList[$deptno] = $dept;
        }
        return $deptList;
    }
}
?>
