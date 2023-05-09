<?php
require_once "function.php";
class baru extends koneksi {
    public function tampil()
    {
        $sql = "SELECT * FROM film";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
}
?>