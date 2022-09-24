<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");
$conn = mysqli_connect("localhost", "root", "", "db_data_karyawan");

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

try {
    $query = "SELECT * FROM tb_karyawan WHERE nik = $id";
    $result = mysqli_query($conn, $query);
    echo json_encode($results);
} catch (PDOException $exception) {
    die('ERROR: ' . $exception->getMessage());
}
