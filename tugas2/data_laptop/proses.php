<?php
include 'model.php';
if (isset($_POST['submit_simpan'])) {
$kd_laptop = $_POST['kd_laptop'];
$nn_laptop = $_POST['nm_laptop'];
$jn_laptop = $_POST['jn_laptop'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$model = new Model();
$model->insert($kd_laptop, $nm_laptop, $jn_laptop, $harga, $stok); header('location:index.php');
}
if (isset($_POST['submit_edit'])) {
   
    $kd_laptop = $_POST['kd_laptop'];
    $nn_laptop = $_POST['nm_laptop'];
    $jn_laptop = $_POST['jn_laptop'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $model = new Model();
    $model->update($kd_laptop, $nm_laptop, $jn_laptop, $harga, $stok); header('location:index.php');
    }
    if (isset($_GET['kd_laptop'])) {
    $id = $_GET['kd_laptop'];
    $model = new Model();
    $model->delete($id); header('location:index.php');
    }