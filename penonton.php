<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Penonton</title>
</head>
<body>
<?php

require_once "app/datapenonton.php";
$data = new data();
$rows = $data->tampil();

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['idtiket'])) $vidtiket =$_GET['idtiket'];
else $vidtiket ='';
if(isset($_GET['namap'])) $vnamap =$_GET['namap'];
else $vnamap ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['studio'])) $vstudio =$_GET['studio'];
else $vstudio ='';

if($vsimpan=='simpan' && ($vnamap <>''||$vid <>''||$vstudio <>'')){
    $data->simpan();
    $rows = $data->tampil();
    $vidtiket ='';
    $vnamap ='';
    $vid ='';
    $vstudio ='';
}

if($vaksi=="hapus")  {
    $data->hapus();
    $rows = $data->tampil();
}

if($vaksi=="lihat_update")  {
    $urows = $data->tampil_update();
    foreach ($urows as $row) {
        $vidtiket = $row['id_tiket'];
        $vnamap = $row['nama_penonton'];
        $vid = $row['id'];
        $vstudio = $row['id_studio'];
    }
}

if ($vupdate=="update") {
    $data->update($vidtiket,$vnamap,$vid,$vstudio);
    $rows = $data->tampil();
    $vidtiket ='';
    $vnamap ='';
    $vid ='';
    $vstudio ='';
}

if ($vreset=="reset"){
    $vidtiket ='';
    $vnamap ='';
    $id ='';
    $vstudio ='';
}


?>
<div class="inputan">
<h1>Penonton</h1>
<a href="index.php">Kembali</a>
<form action="?" method="get">
<table>
    <tr><td>
        <input type="hidden" name="idtiket" value="<?php echo $vidtiket; ?>" /></td></tr>
    <tr><td>Nama Penonton</td><td>:</td><td><input type="text" name="namap" value="<?php echo $vnamap; ?>"/></td></tr>
    <tr><td>ID</td><td>:</td><td><input type="text" autocomplete="off" name="id" value="<?php echo $vid; ?>"/></td></tr>
    <tr><td>No Studio</td><td>:</td><td><input type="text" autocomplete="off" name="studio" value="<?php echo $vstudio; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <p></p>
    </td></tr>
</table>
</form>
</div>

<div class="data">
    <table border="1px" cellspacing="0" cellpadding="0">
    <tr>
        <td>No</td>
        <td>Nama Penonton</td>
        <td>ID</td>
        <td>No Studio</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_tiket']; ?></td>
            <td><?php echo $row['nama_penonton']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['id_studio']; ?></td>
            <td><a href="?id_tiket=<?php echo $row['id_tiket']; ?>&aksi=hapus">Hapus</a>
                <a href="?id_tiket=<?php echo $row['id_tiket']; ?>&aksi=lihat_update">Update</a></td>
        </tr>
    <?php } ?>
 </table>
 </div>
</body>
</html>
