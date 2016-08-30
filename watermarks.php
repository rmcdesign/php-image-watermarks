<?php
// Load the watermark images and the photo to apply the watermark to
$image = imagecreatefromjpeg('photo.jpg');
$watermark_tl = imagecreatefrompng('watermark-top-left.png');
$watermark_br = imagecreatefrompng('watermark-bottom-right.png');

// copy top left watermark onto image and place at dst_x: 0 dst_y: 0 src_x: 0 src_y: 0
imagecopy($image, $watermark_tl, 0, 0, 0, 0, imagesx($watermark_tl), imagesy($watermark_tl));

// get the height/width of the bottom right watermark image
$watermark_br_width = imagesx($watermark_br);
$watermark_br_height = imagesy($watermark_br);

// Copy the bottom right watermark image onto the photo using the width and height to position in bottom right corner
imagecopy($image, $watermark_br, imagesx($image) - $watermark_br_width, imagesy($image) - $watermark_br_height, 0, 0, imagesx($watermark_br), imagesy($watermark_br));

// Output and free memory
header('Content-type: image/jpeg');

// display image
imagejpeg($image);

// save image
imagejpeg($image, 'photo-new.jpg');
//var_dump($image);
imagedestroy($image);

?>