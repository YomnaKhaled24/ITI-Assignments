<?php

//require("db_connection.php");

try{
    require("db.php");

    $db=new db();
    
    //$connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

    //$connection->query("delete from employees where id=$id");

    $db->delete_data("employees","id='$id'");

    header("Location:list.php");


}catch(PDOException $exc){

    echo $exc->getMessage();

}



?>