<?php
require("koneksicash.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $tipe_transaksi = $_POST["tipe_transaksi"];
    $jumlah = $_POST["jumlah"];
    $tanggal_transaksi = $_POST["tanggal_transaksi"];
    $keterangan = $_POST["keterangan"];
    
    $perintah ="UPDATE tbl_cashflow SET nama ='$nama' , tipe_transaksi ='$tipe_transaksi', jumlah ='$jumlah', tanggal_transaksi='$tanggal_transaksi', keterangan='$keterangan' WHERE
    id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek =  mysqli_affected_rows ($connect);
    
    if($cek >0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data diUpdate";
}
echo json_encode($response);
mysqli_close($connect);