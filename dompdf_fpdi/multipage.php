<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// =======================
// DATA TABLE PANJANG
// =======================
$rows = '';
for ($i = 1; $i <= 100; $i++) {
    $rows .= "
    <tr>
        <td>$i</td>
        <td>Produk $i</td>
        <td>" . number_format(rand(10000,50000)) . "</td>
    </tr>";
}

// =======================
// HTML + CSS
// =======================
$html = '
<style>
@page {
    margin: 100px 50px 80px 50px;
}

body {
    font-family: sans-serif;
}

/* HEADER */
.header {
    position: fixed;
    top: -80px;
    left: 0;
    right: 0;
    height: 60px;
    text-align: center;
    border-bottom: 1px solid #000;
}

/* FOOTER */
.footer {
    position: fixed;
    bottom: -60px;
    left: 0;
    right: 0;
    height: 50px;
    text-align: center;
    border-top: 1px solid #000;
    font-size: 12px;
}

/* PAGE NUMBER */
.pagenum:before {
    content: counter(page);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    display: table-header-group;
}

th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}
</style>

<div class="header">
    <h2>LAPORAN PENJUALAN</h2>
</div>

<div class="footer">
    Halaman <span class="pagenum"></span>
</div>

<h3>Data Penjualan</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        '.$rows.'
    </tbody>
</table>
';

// =======================
// RENDER PDF
// =======================
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// langsung download
$dompdf->stream("laporan.pdf", ["Attachment" => false]);