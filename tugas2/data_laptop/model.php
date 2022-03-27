<?php
include 'koneksi.php'; 
class Model extends Connection
{
public function __construct()
{
    $this->conn = $this->get_connection();
}
public function insert($kd_laptop, $nm_laptop, $jn_laptop, $harga, $stok)
{
   
    $sql = "INSERT INTO laptop (kd_laptop, nm_laptop, jn_laptop, harga, stok) VALUES ('$kd_laptop', '$nm_laptop',
    '$jn_laptop', '$harga', '$stok')";
    $this->conn->query($sql);
}

public function tampil_data()
{
$sql = "SELECT * FROM laptop";

$bind = $this->conn->query($sql); 
    while ($obj = $bind->fetch_object()) {
    $baris[] = $obj;
    }
    if (!empty($baris)) { return $baris;
    }
    }
    public function edit($id)
    {
    $sql = "SELECT * FROM laptop WHERE kd_laptop='$id'";
    $bind = $this->conn->query($sql); 
    while ($obj = $bind->fetch_object()) {
    $baris = $obj;
    }
    return $baris;
    }
    public function update($kd_laptop, $nm_laptop, $jn_laptop, $harga, $stok)
    {
    $sql = "UPDATE laptop SET nama='$nm_laptop', jenis='$jn_laptop', harga='$harga', stok='$stok' WHERE kd_laptop='$kd_laptop'";
    $this->conn->query($sql);
    }
    public function delete($kd_laptop)
    {
    $sql = "DELETE FROM laptop WHERE kd_laptop='$kd_laptop'";
    $this->conn->query($sql);
    }
    }