<?php
$img_file = 'https://riswan.net/wp-content/uploads/2020/10/Perbedaan-JPG-dan-JPEG-pada-Format-Gambar.jpg';
$imgData = base64_encode(file_get_contents($img_file));
// echo mime_content_type($img_file);
$src = 'data:;image/jpeg;base64,'.$imgData; // mime type must be return extention of images from url
echo '<img src="'.$src.'">';
