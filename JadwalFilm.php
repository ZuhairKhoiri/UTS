<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Film</title>
</head>
<body>
<?php

require_once "app/function.php";
$koneksi = new koneksi();
$rows = $koneksi->tampil();

if(isset($_GET["cari"])){
    $rows = $koneksi->cari($_GET["nama"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vidstudio ='';
if(isset($_GET['idfilm'])) $vidfilm =$_GET['idfilm'];
else $vidfilm ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['jamtayang'])) $vjamtayang =$_GET['jamtayang'];
else $vjamtayang ='';
if(isset($_GET['studio'])) $vstudio =$_GET['studio'];
else $vstudio ='';

if($vsimpan=='simpan' && ($vidfilm <>''||$vnama <>''||$vjamtayang <>''||$vstudio <>'')){
    $koneksi->simpan();
    $rows = $koneksi->tampil();
    $vid ='';
    $vidfilm ='';
    $vnama ='';
    $vjamtayang ='';
    $vstudio ='';
}

if($vaksi=="hapus")  {
    $koneksi->hapus();
    $rows = $koneksi->tampil();
}

if($vaksi=="cari")  {
    $rows = $koneksi->cari();
}

if($vaksi=="lihat_update")  {
    $urows = $koneksi->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id'];
        $vidfilm = $row['id_film'];
        $vnama = $row['nama_film'];
        $vjamtayang = $row['jam_tayang'];
        $vstudio = $row['id_studio'];
    }
}

if ($vupdate=="update") {
    $koneksi->update($vid, $vidfilm,$vnama,$vjamtayang,$vstudio);
    $rows = $koneksi->tampil();
    $vid ='';
    $vidfilm ='';
    $vnama ='';
    $vjamtayang ='';
    $vstudio ='';
}

if ($vreset=="reset"){
    $vid ='';
    $vidfilm ='';
    $vnama ='';
    $vjamtayang ='';
    $vstudio ='';
}


?>
<div class="inputan">
<h1>Film</h1>
<a href="index.php">Kembali</a>
<form action="?" method="get">
<table>
    <tr><td>Id Film</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="idfilm" value="<?php echo $vidfilm; ?>" /></td></tr>
    <tr><td>Nama Film</td><td>:</td><td><input type="text" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>Jam Tayang</td><td>:</td><td><input type="time" autocomplete="off" name="jamtayang" value="<?php echo $vjamtayang; ?>"/></td></tr>
    <tr><td>No Studio</td><td>:</td><td><input type="text" autocomplete="off" name="studio" value="<?php echo $vstudio; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    <p></p>
    </td></tr>
</table>
</form>
</div>

<div class="data">
    <table border="1px" cellspacing="0" cellpadding="0">
    <tr>
        <td>No</td>
        <td>Id Film</td>
        <td>Nama Film</td>
        <td>Jam Tayang</td>
        <td>No Studio</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['id_film']; ?></td>
            <td><?php echo $row['nama_film']; ?></td>
            <td><?php echo $row['jam_tayang']; ?></td>
            <td><?php echo $row['id_studio']; ?></td>
            <td><a href="?id=<?php echo $row['id']; ?>&aksi=hapus">Hapus</a>
                <a href="?id=<?php echo $row['id']; ?>&aksi=lihat_update">Update</a></td>

        </tr>
    <?php } ?>
 </table>
 </div>
</body>
</html>
