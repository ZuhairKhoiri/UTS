<?php
require_once "function.php";

class crud extends koneksi {
    public function tampil()
    {
        $sql = "SELECT * FROM studio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function simpan()
    {
        $sql = "insert into studio values ('','".$_GET['no']."','".$_GET['kursi']."','".$_GET['tipe']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DISIMPAN ! </p>";
    }
    public function hapus()
    {
        $sql = "delete from studio where id_studio='".$_GET['id_studio']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DIHAPUS ! </p>";
    }
    public function cari($no){
        $sql = "SELECT * FROM studio WHERE no_studio LIKE '%".$no."%'
        ";
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