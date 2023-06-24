<?php
require("koneksicash.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $tipe_transaksi = $_POST["tipe_transaksi"];
    $jumlah = $_POST["jumlah"];
    $tanggal_transaksi = $_POST["tanggal_transaksi"];
    $keterangan = $_POST["keterangan"];
    
    $perintah ="INSERT INTO tbl_cashflow(nama, tipe_transaksi, jumlah, tanggal_transaksi, keterangan) values ('$nama', '$tipe_transaksi','$jumlah','$tanggal_transaksi','$keterangan')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek =  mysqli_affected_rows ($connect);
    
    if($cek >0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);