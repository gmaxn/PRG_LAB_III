<?php
    function createWaterMark($stampdir, $imgdir, $marge_right, $marge_bottom, $destinationFolder)
    {
        // Load the stamp and the photo to apply the watermark to
        $stamp = imagecreatefrompng($stampdir);
        $im = imagecreatefromjpeg($imgdir);


        $sizex = imagesx($stamp);
        $sizey = imagesy($stamp);

        // Copy the stamp image onto our photo using the margin offsets and the photo 
        // width to calculate positioning of the stamp. 
        if(imagecopy($im, $stamp, imagesx($im) - $sizex - $marge_right, imagesy($im) - $sizey - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp)))
        {
            imagejpeg($im, $destinationFolder);  
            unlink($imgdir);
            return true;
        }
        else
        {
            return false;
        }
    }
?>