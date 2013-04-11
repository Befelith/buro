<?php
//header('Content-type: text/html; charset=utf-8');
/**
 * Created by JetBrains PhpStorm.
 * User: FreshMilk
 * Date: 20.02.13
 * Time: 13:33
 * To change this template use File | Settings | File Templates.
 */

class ImageResizer
{

    function resize($max_image_size,$uploaded_file,$image_type,$tmp_image_size)
    {
        $file_error=0;
        if(getimagesize($uploaded_file) && $tmp_image_size < $max_image_size) //$_FILES['userImage']['size']
        {
            switch($image_type)
            {
                case 'image/jpeg': $src = imagecreatefromjpeg($uploaded_file); break;
                case 'image/png' : $src = imagecreatefrompng($uploaded_file); break;
                case 'image/gif' : $src = imagecreatefromgif($uploaded_file); break;
                default: return "Неправильный формат файла:$image_type";
            }

            list($base_width,$base_height) = getimagesize($uploaded_file);
            if($base_width>=500)
            {
                $new_width = 500;
                $new_height = ($base_height / $base_width)*$new_width;

                if($new_height>500)
                {
                    $new_height = 500;
                    $new_width= ($base_width / $base_height) * $new_height;
                }

                //новый пустой файл с нужными размерами
                $new = imagecreatetruecolor($new_width,$new_height);

                // ресэмплирование, копирует в tmp картинку из src
                imagecopyresampled($new,$src,0,0,0,0,$new_width,$new_height,$base_width,$base_height);
                //полный путь с хэш-именем файла
                $dest_filename = $this->hashed_filename().$this->getExtension($image_type);
                // !['tmp_name']
                //new - созданный временный уменьшенный файл, filename - новый файл, 100- качество
                switch($image_type)
                {
                    case 'image/jpeg': imagejpeg($new,$dest_filename,50);break;
                    case 'image/png' : imagepng($new,$dest_filename,9); break;
                    case 'image/gif' : imagegif($new,$dest_filename); break;
                }
                imagedestroy($new);
                imagedestroy($src);

            }
            elseif($base_height>500)
            {
                $new_height = 500;
                $new_width= ($base_width / $base_height) * $new_height;
                if($new_width>500)
                {
                    $new_width = 500;
                    $new_height = ($base_height / $base_width)*$new_width;
                }
                //новый пустой файл с нужными размерами
                $new = imagecreatetruecolor($new_width,$new_height);

                // ресэмплирование, копирует в tmp картинку из src
                imagecopyresampled($new,$src,0,0,0,0,$new_width,$new_height,$base_width,$base_height);
                //полный путь с хэш-именем файла
                $dest_filename = $this->hashed_filename().$this->getExtension($image_type);
                // !['tmp_name']
                //new - созданный временный уменьшенный файл, filename - новый файл, 100- качество
                switch($image_type)
                {
                    case 'image/jpeg': imagejpeg($new,$dest_filename,50);break;
                    case 'image/png' : imagepng($new,$dest_filename,9); break;
                    case 'image/gif' : imagegif($new,$dest_filename); break;
                }
                imagedestroy($new);
                imagedestroy($src);
            }
            else
            {

                $dest_filename = $this->hashed_filename().$this->getExtension($image_type);
                file_put_contents($dest_filename,file_get_contents($uploaded_file));

            }
        }
        else
        {
            $file_error=1;
            echo "Файл слишком большой";

        }

        return $dest_filename;
    }
    function hashed_filename()
    {
        return "uploads/".md5(date("m-d H:i:s").microtime().$_SERVER['REMOTE_ADDR']);
    }
    function  getExtension($filename)
    {
        $ext = explode("/",$filename);
        return ".".$ext[1];
    }
}



?>