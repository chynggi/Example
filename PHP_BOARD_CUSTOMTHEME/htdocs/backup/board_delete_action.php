<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
</head>
<body>
<h1>boardAddAction.php</h1>
<?php 
$board_no = $_POST["board_no"];
$board_pw = $_POST["board_pw"];

echo "board_pw : ".$board_no."<br>" ;


$conn = mysqli_connect("localhost","root","","test");

if($conn){
    echo "connection success<br>";
} else {
    die("connection failed".mysqli_error());
}
$selsql = "Select * FROM BOARD WHERE BOARD_NO=$board_no AND BOARD_PW='$board_pw'";
try{
$resultsel = mysqli_query($conn, $selsql);
if($row = mysqli_fetch_array($resultsel))
{
    echo "SELECT success".$resultsel."<br>";
    $sql = "DELETE FROM BOARD WHERE BOARD_NO=$board_no AND BOARD_PW='$board_pw'";
    
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "DELETE success".$result."<br>";
    }    
}
else {
    echo "Insert Failed: ";
}
}catch(Exception $e)
{
    echo "Insert Failed: ".mysqli_error($conn);
    $s = $e->getMessage().'오류코드 : '.$e->getCode().')';
    echo $s;
}


mysqli_close($conn);
header("location: ./board_list.php")
?>
</body>
</html>
