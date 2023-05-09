<?php
 class data {
 private $db;
    public function __construct()
    {
       try {
            $this->db = new PDO("mysql:host=localhost;dbname=uts_2207101066", "root", ""); 
            } 
       catch (PDOException $e) { 
            die ("Error " . $e->getMessage());
            }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM penonton";
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
        $sql = "INSERT INTO penonton values ('','".$_GET['namap']."','".$_GET['id']."','".$_GET['studio']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DISIMPAN ! </p>";
    }  

    public function hapus()
    {
        $sql = "delete from penonton where id_tiket='".$_GET['id_tiket']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DIHAPUS ! </p>";
    }
    public function tampil_update()
    {
        $sql = "SELECT * FROM penonton where id_tiket='".$_GET['id_tiket']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($idtiket,$namap,$id,$studio)
    {
        $sql = "update penonton set  nama_penonton='".$namap."', id='".$id."' , id_studio='".$studio."' where id_tiket='".$idtiket."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DIUPDATE ! </p>";
    }
 }