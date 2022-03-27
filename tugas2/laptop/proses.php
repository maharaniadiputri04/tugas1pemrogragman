<?php
include 'model.php';
if (isset($_POST['submit_simpan'])) {
    $pembeli = $_POST['nama'];
    $kd_laptop = $_POST['kd_laptop'];
    $nm_laptop = $_POST['nm_laptop'];
    $jn_laptop = $_POST['jn_laptop'];
    $jumlah = $_POST['jumlah'];
$model = new Model();
$model->insert($pembeli, $kd_laptop, $nm_laptop, $jn_laptop, $jumlah); header('location:index.php');
}
if (isset($_POST['submit_edit'])) {
  
    $kd_jual = $_POST['kd_jual'];
    $pembeli = $_POST['nama'];
    $kd_laptop = $_POST['kd_laptop'];
    $nm_laptop = $_POST['nm_laptop'];
    $jn_laptop = $_POST['jn_laptop'];
    $jumlah = $_POST['jumlah'];
    $model = new Model();
    $model->update($kd_jual, $pembeli, $kd_laptop, $nm_laptop, $jn_laptop, $jumlah); header('location:index.php');
    }
    if (isset($_GET['kd_jual'])) {
    $id = $_GET['kd_jual'];
    $model = new Model();
    $model->delete($id); header('location:index.php');
    }