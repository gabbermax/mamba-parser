<?php
$path=(getcwd())."/".$path_pref;
$listofdir=scandir($path);

//removing dirs\
$size=count($listofdir);
for($i=0;$i<$size;$i++){
     if(is_dir($path.$listofdir[$i])){
     unset($listofdir[$i]);
     echo $listofdir[$i];
    }
    
}



?>

