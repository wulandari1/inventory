<?php 
include '../dbconnect.php';
if(isset($_POST['hapus']) && !empty($_POST['idbrg'])){
    $idx = $_POST['idbrg'];

    $delete = mysqli_query($conn,"delete from sstock_brg where idx='$idx'");
    //hapus juga semua data barang ini di tabel keluar-masuk
    $deltabelkeluar = mysqli_query($conn,"delete from sbrg_keluar where id='$idx'");
    $deltabelmasuk = mysqli_query($conn,"delete from sbrg_masuk where id='$idx'");
    
    //cek apakah berhasil
    if ($delete && $deltabelkeluar && $deltabelmasuk){

        echo " <div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 1 seconds.
          </div>
        <meta http-equiv='refresh' content='1; url= stock.php'/>  ";
    } else { echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 1 seconds.
          </div>
         <meta http-equiv='refresh' content='1; url= stock.php'/> ";
    }
};

    ?>
 
<html>
<head>
  <title>Hapus Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
</html>