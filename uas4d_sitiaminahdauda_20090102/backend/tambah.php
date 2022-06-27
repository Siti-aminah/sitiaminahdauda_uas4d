<?php
require_once '../koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

$sql = "insert into barangami (id,kategori_barang,nama_barang,jumlah_stok) values('" .$data->id . "','" .$data->kategori_barang . "','" . $data->nama_barang . "','" . $data->jumlah_stok . "')";
$result = pg_query($sql);
$row = pg_affected_rows($result);
$obj = new stdClass();
if($row > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>