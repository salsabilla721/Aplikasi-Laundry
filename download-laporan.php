<?php
$No_Order     =  $_GET['cetak'];
include "include/koneksi.php";
ob_start();?>

<!DOCTYPE html>
<html>
<head>
  <title>Cetak Struk Transaksi</title>
</head>
<body>
<h1 ALIGN=CENTER> INVOICE LAUNDRY</b></h2>

<h2 Align=center >No Order = <?php echo $No_Order?></h3>


<style type="text/css">
 body{
  font-family: sans-serif;
 }
 table{
  margin: 20px auto;
  border-collapse: collapse;
 }
 table th,
 table td{
  padding: 3px 8px;

 }
 a{
  padding: 8px 10px;
  text-decoration: none;
  border-radius: 2px;
 }

    .tengah{
        text-align: center;
    }
</style>

<?php
$datapel = mysqli_query($conn, "SELECT Nama, Alamat, No_Hp , No_Order from (pelanggan join transaksi on pelanggan.No_Identitas = transaksi.No_Identitas) WHERE No_Order = '$No_Order'");
while ($datapeltarik = mysqli_fetch_array($datapel)) {
  ?>
  <table>
    <tr> <th>Nama Pelanggan</th><th>:</th><th><?php echo $datapeltarik['Nama']; ?></th>    </tr>
  </table>
  <?php
  }
?>




<!-- main coding -->
  <?php

$sql = mysqli_query($conn, "SELECT Nama, Alamat, Tgl_Terima, No_Order,total_berat, diskon, Total_Bayar, Tgl_Ambil from (pelanggan join transaksi on pelanggan.No_Identitas = transaksi.No_Identitas) WHERE No_Order = '$No_Order'");
while ($hasil = mysqli_fetch_array($sql))
{
  $tgl1 = $hasil['Tgl_Terima'];;// pendefinisian tanggal awal
  $tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1)));
?>

</pre>
<hr>
<br><br>
<table border="1px">
  <tr>
        <th>Nama Pelanggan</th>
        <th>Tanggal Terima</th>
         <th>Tanggal Ambil</th>
          <th>Berat(kg)</th>
          <th>Diskon</th>
          <th>Total Bayar</th>
  </tr>
<tr>
   <td width="20%"><?php echo $hasil['Nama']; ?></td>
   <td width="10%" align="center"><?php echo $hasil['Tgl_Terima']; ?></td>
   <td width="10%" align="center"><?php echo $hasil['Tgl_Ambil']; ?></td>
   <td width="5%" align="right"><?php echo $hasil['total_berat']; ?></td>
   <td width="5%" align="right"><?php echo $hasil['diskon']; ?></td>
   <td width="10%" align="right"><?php echo $hasil['Total_Bayar']; ?></td>
 </tr>
</table>
<?php }?>
<!-- end of main coding -->
<br><br>


<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembayaran bisa ditransfer ke : <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BCA  <br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A.n <i>Universitas Informatika Dan Bisnis Indonesia </i> <br>
 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;449 308 2020 </p>

  </p>

  <br><br><br><hr>
<table valign = bottom>
  <tr> <th width="100%" align="left"> Terimakasih telah mempercayai kami sebagai patner laundry anda </th></tr>
</table>








</body>
</html>