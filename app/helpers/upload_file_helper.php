<?php
    function upload_file($name){
        if(isset($_FILES[$name])){
            $path = $_FILES[$name]['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $nameFile = './upload/'.getRandomString(15).'.'.$ext;
            move_uploaded_file($_FILES[$name]['tmp_name'],$nameFile);
            
            return $nameFile;
        }
    }


    function getRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $n; $i++) {
            $index = random_int(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return $randomString;
    }