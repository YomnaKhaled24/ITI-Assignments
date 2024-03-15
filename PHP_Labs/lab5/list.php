<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location:login.php");

}

echo "Welcom ".$_SESSION['firstName']." ".$_SESSION['lastName'];
echo "<br><br>"


// if(!isset($_COOKIE['username']))
// {
//     header("Location:login.php");

// }

// echo "Welcom ".$_COOKIE['firstName']." ".$_COOKIE['lastName'];
// echo "<br><br>"

?>


<a href="form.php">Add</a>

<table  border=2>

<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Password</th>
    <th>Username</th>
    <th>Country</th>
    <th>Image</th>


</tr>

<?php

//1-Connection
// $connection = new mysqli("localhost","root","","php_test");

// if($connection->connect_errno)
// {
//     die("Connection failed");
// }


try{
    require("db.php");

    $db=new db();

    //$connection = $db->get_connection();

    //$connection = new pdo("mysql:host=localhost;dbname=php_test","root","");

    //$result = $connection->query("select * from employees");

    $result = $db->get_data("employees");

while($row = $result->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";

    foreach($row as $key=>$value)
    {
        if($key=="img")
        {
            echo "<td><img src='./img/$value' width='100' height='100'> </td>";
        }
        else
        {
            echo "<td>$value</td>";
        }
        
    }

    echo "<td>
    <a href='view.php?id={$row['id']}'>View</a>
    <a href='edit.php?id={$row['id']}'>Edit</a>
    <a href='delete.php?id={$row['id']}'>Delete</a>
    </td>";


    echo "</tr>";
}

}catch(PDOException $exc){

    echo $exc->getMessage();

}




//3-Close

 //$connection->close();

?>


</table>