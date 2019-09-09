<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
</head>
<body>
<h1>boardAddAction.php</h1>
<?php 
$board_pw = $_POST["boardPw"];
$board_title = $_POST["boardTitle"];
$board_content = $_POST["boardContent"];
$board_user = $_POST["boardUser"];
echo "board_pw : ".$board_pw."<br>" ;
echo "board_title : ".$board_title."<br>" ;
echo "board_content : ".$board_content."<br>" ;
echo "board_user : ".$board_user."<br>" ;

$conn = mysqli_connect("localhost","root","","test");

if($conn){
    echo "connection success<br>";
} else {
    die("connection failed".mysqli_error());
}

$sql = "INSERT INTO BOARD (BOARD_PW,BOARD_TITLE,BOARD_CONTENT,BOARD_USER,BOARD_DATE)".
" VALUES('$board_pw','$board_title','$board_content','$board_user',now())";

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
