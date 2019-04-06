<?php


    function subirFoto($uploaddir, $requestName)
    {
            
        if(move_uploaded_file($_FILES[$requestName]['tmp_name'], $uploaddir)) 
        {
            createWaterMark($uploaddir, "Archivos/utn_logo.png", 10, 10, $uploaddir);
            echo "El Archivo es valido, y se subió correctamente al servidor.<br><br>";
        } 
        else 
        {
            echo "Archivo no valido<br><br>";
        }
    
        //print_r($_FILES);
    }

    function createWaterMark($imgdir, $stampdir, $marge_right, $marge_bottom, $destinationFolder)
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
            unlink($imgdir);
            imagejpeg($im, $destinationFolder);            
            return true;
        }
        else
        {
            return false;
        }
    }

?>

