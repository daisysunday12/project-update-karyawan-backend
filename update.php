<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

$conn = mysqli_connect("localhost", "root", "", "db_data_karyawan");

try {
  $phone = $_POST['no_telp'];
  $no_hp = $_POST['no_hp'];
  $email = $_POST['email'];
  $id = $_GET['id'];

  mysqli_query($conn, "UPDATE tb_karyawan SET
      no_telp='$phone',
      no_hp='$no_hp',
      email='$email'      
      WHERE id='$id'");
  echo json_encode(array('result' => 'success'));
  // Notifikasi Whatsapp (Masuk ke folder Wa Getway, pada terminal npm run dev)
  // $url = "http://localhost:3000/msg/$no_hp@c.us/Data";
  // file_get_contents($url);
  exit(0);
} catch (PDOException $exception) {
  die('ERROR: ' . $exception->getMessage());
}
