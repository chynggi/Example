<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
</head>
<body>
<h1>boardAddAction.php</h1>
<?php 
$board_no = $_POST["boardNo"];
$board_title = $_POST["boardTitle"];
$board_content = $_POST["boardContent"];

echo "board_pw : ".$board_no."<br>" ;
echo "board_title : ".$board_title."<br>" ;
echo "board_content : ".$board_content."<br>" ;


$conn = mysqli_connect("localhost","root","","test");

if($conn){
    echo "connection success<br>";
} else {
    die("connection failed".mysqli_error());
}

$sql = "UPDATE BOARD SET BOARD_TITLE = '$board_title',BOARD_CONTENT='$board_content' WHERE BOARD_NO=$board_no";

$result = mysqli_query($conn, $sql);
if($result)
{
    echo "Insert success".$result."<br>";
}
else {
    die("Insert Failed: ".mysqli_error($conn));
}

mysqli_close($conn);
header("location: ./board_list.php")
?>
</body>
</html>
