<?php
include 'model.php';
$model = new Model();
$index = 1;
?>
<!doctype html>
<html lang="en">
<head>
<title>Cetak Data</title>
<style>
h1 {
text-align: center;
}

table, td,
th {
border: 1px solid #ddd; text-align: left;
}

table {
border-collapse: collapse; width: 100%;
}

th,
td {
padding: 15px;
}
</style>
</head>

<body>
<h1>Laporan Data Obat</h1>
<table>
<thead>
<tr>
<th>No.</th>
<th>kode laptop</th>
<th>nama laptop</th>
<th>jenis laptop</th>
<th>harga</th>
<th>stok</th>
</tr>
</thead>
<tbody>
<?php
 
 $result = $model->tampil_data(); if (!empty($result)) {
    foreach ($result as $data) : ?>
    <tr>
    <td><?= $index++ ?></td>
    <td><?= $data->kd_laptop?></td>
    <td><?= $data->nm_laptop ?></td>
    <td><?= $data->jn_laptop ?></td>
    <td><?= $data->harga ?></td>
    <td><?= $data->stok ?></td>
    </tr>
    <?php endforeach;
    } else { ?>
    <tr>
    <td colspan="9">Belum ada data obat.</td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <script>
    window.print();
    </script>
    </body>
    
    </html>