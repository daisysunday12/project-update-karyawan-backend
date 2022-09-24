<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_data_karyawan");

include "excel_reader2.php";
?>

<?php
$target = basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'], $target);
chmod($_FILES['file']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['file']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {

  // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
  $pt     = $data->val($i, 1);
  $nik   = $data->val($i, 2);
  $unit  = $data->val($i, 3);
  $entitas  = $data->val($i, 4);
  $nama  = $data->val($i, 5);
  $tempat  = $data->val($i, 6);
  $tanggal  = $data->val($i, 7);
  $umur  = $data->val($i, 8);
  $jk  = $data->val($i, 9);
  $nasional  = $data->val($i, 10);
  $religion  = $data->val($i, 11);
  $status  = $data->val($i, 12);
  $anak  = $data->val($i, 13);
  $ptkp  = $data->val($i, 14);
  $npwp  = $data->val($i, 15);
  $ktp  = $data->val($i, 16);
  $education  = $data->val($i, 17);
  $keluar  = $data->val($i, 18);
  $tanggalk  = $data->val($i, 19);
  $alasank  = $data->val($i, 20);
  $tmk  = $data->val($i, 21);
  $companylast  = $data->val($i, 22);
  $masa  = $data->val($i, 23);
  $lokasi  = $data->val($i, 24);
  $sublokasi  = $data->val($i, 25);
  $area  = $data->val($i, 26);
  $departement  = $data->val($i, 27);
  $golongan  = $data->val($i, 28);
  $subgolongan  = $data->val($i, 29);
  $jabatan  = $data->val($i, 30);
  $level  = $data->val($i, 31);

  // echo $companylast;
  // die;

  // input data ke database (table data_pegawai)
  mysqli_query($koneksi, "INSERT INTO tb_karyawan VALUES('','$nik','$pt','$unit','$entitas','$nama','$tempat','$tanggal','$umur','$jk','$nasional','$religion','$status','$anak','$ptkp','$npwp','$ktp','$education','$keluar','$tanggalk','$alasank','$tmk','$companylast','$masa','$lokasi','$sublokasi','$area','$departement','$golongan','$subgolongan','$jabatan','$level',NULL,NULL,NULL)");

  // die;
  $berhasil++;
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['file']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>