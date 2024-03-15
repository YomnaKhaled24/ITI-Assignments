<?php

//require("db_connection.php");

try{
    require("db.php");

    $db=new db();
    
    //$connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

    $from = $_FILES['emp_img']['tmp_name'];
    $img = $_FILES['emp_img']['name'];
    move_uploaded_file($from,"./img/".$img);

// $connection->query("update employees set firstName='{$_POST['firstName']}', lastName='{$_POST['lastName']}',
// address='{$_POST['address']}', gendre='{$_POST['gender']}',
// pass='{$_POST['password']}', username='{$_POST['username']}',country='{$_POST['country']}' where id=$id");

$db->update_data("employees","firstName='{$_POST['firstName']}', lastName='{$_POST['lastName']}',
address='{$_POST['address']}', gendre='{$_POST['gender']}',pass='{$_POST['password']}', 
username='{$_POST['username']}',country='{$_POST['country']}',img='$img'",
"id='$id'");

//echo $id ;
header("Location:list.php");


}catch(PDOException $exc){

    echo $exc->getMessage();

}


?>