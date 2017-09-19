<?php

$db_con= new mysqli('localhost','mamba','mamba','mamba');
if ($db_con->connect_error){
    die("connection error ".$db_con->connect_errno."  ".$db_con->connect_error);
}
//echo "Sucess ",$db_con->character_set_name();

?>
