<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//database connection
$conn = mysqli_connect("localhost", "root", "", "db_data_karyawan");

// delete message prompt will be here
header("Content-type: application/json; charset=utf-8");

// select all data
$query = "SELECT * FROM tb_karyawan ORDER BY id DESC";
$result = mysqli_query($conn, $query);

echo json_encode($results);
