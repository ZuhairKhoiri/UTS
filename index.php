<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Jadwal Bioskop XXI</title>
</head>
<body>


<?php

require_once "app/jadwal.php";
$baru = new baru();
$rows = $baru->tampil();

?>

<div class="data">
    <h1>JADWAL BIOSKOP XXI</h1>
    <a href="JadwalFilm.php">Film</a>
    <a href="studio.php">Studio</a>
    <a href="penonton.php">Penonton</a>
    <table border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>Nama Film</td>
        <td>Jam Tayang</td>
        <td>No Studio</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['nama_film']; ?></td>
            <td><?php echo $row['jam_tayang']; ?></td>
            <td><?php echo $row['id_studio']; ?></td>
        </tr>
    <?php } ?>
 </table>
 </div>
</body>
</html>
