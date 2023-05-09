<?php
 class koneksi {
 public $db;
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
        $sql = "SELECT * FROM film";
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
        $sql = "insert into film values ('','".$_GET['idfilm']."','".$_GET['nama']."','".$_GET['jamtayang']."','".$_GET['studio']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DISIMPAN ! </p>";
    }  

     public function hapus()
    {
        $sql = "delete from film where id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DIHAPUS ! </p>";
    }
    public function tampil_update()
    {
        $sql = "SELECT * FROM film where id='".$_GET['id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $idfilm,$nama,$jamtayang,$studio)
    {
        $sql = "UPDATE film SET id_film='".$idfilm."', nama_film='".$nama."', jam_tayang='".$jamtayang."' , id_studio='".$studio."' where id='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "<p style='color: white;'>  DATA BERHASIL DIUPDATE ! </p>";
    }
    public function cari($nama){
        $sql = "SELECT * FROM film WHERE nama_film LIKE '%".$nama."%'
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