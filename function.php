<?php
    function getNow()
    {
        // 202312223123456
        $tmp = Date('G');

        if($tmp < 10)
            $CTime = Date('Ymd0Gis');
        else
            $CTime = Date('YmdGis');

            return $CTime;
    }

    function getFileExt($file)
    {
        $file = strtolower($file); // strtoupper()
        $file_info = pathinfo($file);
        return $file_info["extension"];
    }

    function isImageFile($ext)
    {
        $ext = strtolower($ext);
        switch($ext)
        {
            case "jpg":
            case "jpeg":
            case "gif":
            case "png":
            case "bmp":
                $value = true;
                break;
            default:
                $value = false;
                break;
        }
        
        return $value;
    }
?>