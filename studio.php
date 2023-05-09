<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Studio</title>
</head>
<body>
<?php

require_once "app/crud.php";
$crud = new crud();
$rows = $crud->tampil();

if(isset($_GET["cari"])){
    $rows = $crud->cari($_GET["no"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['edit'])) $vedit =$_GET['edit'];
else $vedit ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['studio'])) $vstudio =$_GET['studio'];
else $studio ='';
if(isset($_GET['no'])) $vno =$_GET['no'];
else $vno ='';
if(isset($_GET['kursi'])) $vkursi =$_GET['kursi'];
else $vkursi ='';
if(isset($_GET['tipe'])) $vtipe =$_GET['tipe'];
else $vtipe ='';

if($vsimpan=='simpan' && ($vno <>''||$vkursi <>''||$vtipe <>'')){
    $crud->simpan();
    $rows = $crud->tampil();
    $vstudio ='';
    $vno ='';
    $vkursi ='';
    $vtipe ='';
}

if($vaksi=="hapus")  {
    $crud->hapus();
    $rows = $crud->tampil();
}
if($vaksi=="cari")  {
    $rows = $crud->cari();
}


if ($vreset=="reset"){
    $vstudio ='';
    $vno ='';
    $vkursi ='';
    $vtipe ='';
}


?>
<div class="inputan">
<h1>Studio</h1>
<a href="index.php">Kembali</a>
<form action="?" method="get">
<table>
    <tr><td>
        <input type="hidden" name="studio" value="<?php echo $vstudio; ?>" /></td></tr>
    <tr><td>No Studio</td><td>:</td><td><input type="text" name="no" value="<?php echo $vno; ?>"/></td></tr>
    <tr><td>Jumlah Kursi</td><td>:</td><td><input type="text" autocomplete="off" name="kursi" value="<?php echo $vkursi; ?>"/></td></tr>
    <tr><td>Tipe Studio</td><td>:</td><td><input type="text" autocomplete="off" name="tipe" value="<?php echo $vtipe; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>
</div>


<div class="data">
    <table border="1px" cellspacing="0" cellpadding="0">
    <tr>
        <td>No</td>
        <td>No Studio</td>
        <td>Jumlah Kursi</td>
        <td>Tipe Studio</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_studio']; ?></td>
            <td><?php echo $row['no_studio']; ?></td>
            <td><?php echo $row['jumlah_kursi']; ?></td>
            <td><?php echo $row['tipe_studio']; ?></td>
            <td><a href="?id_studio=<?php echo $row['id_studio']; ?>&aksi=hapus">Hapus</a></td>
        </tr>
    <?php } ?>
 </table>
</div>
</body>
</html>
