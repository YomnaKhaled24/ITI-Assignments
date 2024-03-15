<ul>
<?php

//require("db_connection.php");

try{
    require("db.php");

    $db=new db();


    //$connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    $id=$_GET['id'];

//$result = $connection->query("select * from employees where id=$id");

$result = $db->get_data("employees","id='$id'");

//$emp = $result->fetch_assoc();
$emp = $result->fetch(PDO::FETCH_ASSOC);

foreach($emp as $key=>$value)
    {
        if($key=="img")
        {
            echo "<li><img src='./img/$value' width='100' height='100'> </li>";
        }
        else
        {
            echo "<li>$value</li>";
        }
        
        //echo "<li>$value</li>";
    }

}catch(PDOException $exc){

    echo $exc->getMessage();

}

?>

</ul>