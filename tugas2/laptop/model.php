<?php
include 'koneksi.php'; 
class Model extends Connection
{
public function __construct()
{
    $this->conn = $this->get_connection();
}
public function insert($pembeli, $kd_laptop, $nm_laptop, $jumlah)
{
    $total_belanja = 0;
    $aa = "SELECT * FROM laptop WHERE kd_laptop='$kd_laptop'";

    $bind = $this->conn->query($aa); 
    while ($obj = $bind->fetch_object()) {
    $baris[] = $obj;
    }
    if (!empty($baris)) 
    {
        $total_belanja = $baris[0]->harga * $jumlah;
        $stok_baru = $baris[0]->stok-$jumlah;
        $barang = $baris[0]->nama;
        $dda = "UPDATE laptop SET  stok='$stok_baru' WHERE kode_obat='$kd_laptop'";
        $this->conn->query($dda);
    }else{
        echo "<center>
        <h1>Data Barang tidak ditemukan!</h1><br>
        <a href='./index.php'>Kembali</a>
        </center>
        ";
        die;
    }
    
    $sql = "INSERT INTO jual_laptop (kd_jual, pembeli, kd_laptop, nm_laptop, jumlah, total_belanja) VALUES ('', '$pembeli',
    '$kd_laptop','$nm_laptop', '$jumlah', '$total_belanja')";
    $this->conn->query($sql);
}

public function tampil_data()
{
$sql = "SELECT * FROM jual_laptop";

$bind = $this->conn->query($sql); 
    while ($obj = $bind->fetch_object()) {
    $baris[] = $obj;
    }
    if (!empty($baris)) { return $baris;
    }
    }
    public function edit($id)
    {
    $sql = "SELECT * FROM jual_laptop WHERE kd_jual='$id'";
    $bind = $this->conn->query($sql); 
    while ($obj = $bind->fetch_object()) {
    $baris = $obj;
    }
    return $baris;
    }
    public function update($kd_jual, $pembeli, $kd_laptop, $nm_laptop,$jumlah)
    {
        $aa = "SELECT * FROM laptop WHERE kd_laptop='$kd_laptop'";

        $bind = $this->conn->query($aa); 
        while ($obj = $bind->fetch_object()) {
        $baris[] = $obj;
        }

        $pp = "SELECT * FROM jual_laptop WHERE kd_jual='$kd_jual'";
        
        $bind = $this->conn->query($pp); 
        while ($obja = $bind->fetch_object()) {
        $p[] = $obja;
        }
       


        $jumlahawal = $baris[0]->stok+$p[0]->jumlah;
        $jumlah_baru = $jumlahawal-$jumlah;
        $total_belanja =  $baris[0]->harga*$jumlah;
        // var_dump($baris);
        $dda = "UPDATE laptop SET stok='$jumlah_baru' WHERE kd_laptop='$kd_laptop'";
        $this->conn->query($dda);

        $jhgkhjg = "UPDATE jual_laptop SET pembeli='$pembeli', jumlah='$jumlah',
        total_belanja='$total_belanja'
        WHERE kd_jual='$kd_jual'";
     
      
        $this->conn->query($jhgkhjg);
    }
    public function delete($kd_jual)
    {
    $sql = "DELETE FROM jual_laptop WHERE kd_jual='$kd_jual'";
    $this->conn->query($sql);
    }
    }