<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use setasign\Fpdi\Fpdi;

// =======================
// 1. Generate PDF dengan Dompdf
// =======================

$dompdf = new Dompdf();

// HTML laporan
$html = '
<h1>Laporan Penjualan</h1>
<p>Tanggal: ' . date("Y-m-d") . '</p>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Harga</th>
</tr>
<tr>
    <td>1</td>
    <td>Produk A</td>
    <td>10000</td>
</tr>
<tr>
    <td>2</td>
    <td>Produk B</td>
    <td>20000</td>
</tr>
</table>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Simpan PDF pertama
file_put_contents("laporan1.pdf", $dompdf->output());


// =======================
// 2. Generate PDF kedua (contoh lain)
// =======================

$dompdf2 = new Dompdf();

$html2 = '
<h2>Laporan Tambahan</h2>
<p>Ini halaman kedua</p>
';

$dompdf2->loadHtml($html2);
$dompdf2->setPaper('A4', 'portrait');
$dompdf2->render();

file_put_contents("laporan2.pdf", $dompdf2->output());


// =======================
// 3. Merge PDF pakai FPDI
// =======================

$pdf = new Fpdi();

// daftar file yang mau digabung
$files = ['laporan1.pdf', 'laporan2.pdf'];

foreach ($files as $file) {
    $pageCount = $pdf->setSourceFile($file);

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $templateId = $pdf->importPage($pageNo);
        $size = $pdf->getTemplateSize($templateId);

        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($templateId);
    }
}

// output hasil merge
$pdf->Output("F", "hasil_merge.pdf");

echo "PDF berhasil dibuat dan digabung!";