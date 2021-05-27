<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "library_system";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("连接失败：".$conn->connect_error);
}
else{
    $sql = "SELECT * from grade ";
    $result=$conn->query($sql);
    if ($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "id: ".$row["id"]." name: ".$row["name"]."<br>";
        }
    }
    else{
        echo "0 结果";
    }
    $conn->close();
}
?>