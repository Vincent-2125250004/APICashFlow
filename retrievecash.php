<?php
require("koneksicash.php");
$perintah ="SELECT * FROM tbl_cashflow";
$eksekusi =mysqli_query($connect, $perintah);
$check = mysqli_affected_rows($connect);
if($check > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while ($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["nama"] = $get->nama;
        $var["tipe_transaksi"] = $get->tipe_transaksi;
        $var["jumlah"] = $get->jumlah;
        $var["tanggal_transaksi"] = $get->tanggal_transaksi;
        $var["keterangan"] = $get->keterangan;
        
        array_push($response["data"], $var);
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Data tidak tersedia";
}
echo json_encode($response);
mysqli_close($connect);