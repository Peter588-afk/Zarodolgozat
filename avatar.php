<?php
/*
print_r($_FILES);
if(array_key_exists("avatar", $_FILES)){
    if($_FILES['avatar']['size']>2000000){
        $msgFoto="Max fájl méret 2 Mega";
    }
    $allowedTypes=array(IMAGETYPE_PNG);
    $selectedType=exif_imagetype($_FILES['avatar']['tmp_name']);
    if(!in_array($selectedType, $allowedTypes)){
        $msgFoto="Csak png lehet";
    }

    if($msgFoto==""){
        $from=$_FILES['avatar']['tmp_name'];
        $to="avatar/".$_FILES['avatar']['name'];
        if(move_uploaded_file($from, $to)){
            $pont=strpos($_FILES['avatar']['name'], '.');
            $ext=substr($_FILES['avatar']['name'], $pont);
            $newName="avatar/".$fnev.$ext;
            rename($to,$newName);
        }
    }
}else{
    $msgFoto="Foto feltöltes nem sikerult";
}
*/
?>