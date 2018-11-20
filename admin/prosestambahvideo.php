<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
// $id = $_POST['id'];
$namavideo = $_POST['namavideo'];
$pilihvideo = $_FILES['video']['name'];
$pilihmateri = $_FILES['materi']['name'];
$penjelasan = $_POST['penjelasan'];
// $gambar = $_FILES['gambar']['name'];
$tmp1 = $_FILES['video']['tmp_name'];
$tmp2 = $_FILES['materi']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
//$fotobaru = date('dmYHis').$gambar;
// Set path folder tempat menyimpan fotonya
$path1 = "upload/".$pilihvideo;
$path2 = "upload/".$pilihmateri;
// Proses upload
if(move_uploaded_file($tmp1, $path1))
  if(move_uploaded_file($tmp2, $path2)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO video VALUES('', '".$namavideo."', '".$pilihvideo."', '".$pilihmateri."', '".$penjelasan."')";
  $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>