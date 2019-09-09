<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
<title>board_detail.php</title>
<link rel="stylesheet" href="./css/bootstrap.css">
<style>
table {
	table-layout: fixed;
	word-wrap: break-word;
}
</style>
<script src="./vendor/jquery/jquery.slim.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
</head>
<body>
	<h1 class="display-4">board_detail.php</h1>	
<?php
$conn = mysqli_connect("localhost", "root", "", "test");
if ($conn) {
    echo "connection success<br>";
} else {
    die("connection failed" . mysqli_error());
}
$board_no = $_GET["board_no"];
echo $board_no . "번째 글 내용<br>";
$sql = "Select BOARD_NO, BOARD_TITLE, BOARD_CONTENT,BOARD_USER,BOARD_DATE from board where  BOARD_NO = $board_no";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "조회 성공<br>";
} else {
    die("ERROR: " . mysqli_error($conn));
}

?>
<table class="table table-bordered" style="width: 50%">
<?php

if ($row = mysqli_fetch_array($result)) {
?>
<tr>
			<td style="width: 5%">작성자</td>
			<td style="width: 40%" colspan="5">
				<?php echo $row["BOARD_USER"]?>
			</td>
		</tr>
		<tr>
			<td style="width: 5%">글 제목</td>
			<td style="width: 24%" colspan="5">
				<?php echo $row["BOARD_TITLE"]?>
			</td>
		</tr>
		<tr>
			<td style="width: 5%">글 번호</td>
			<td style="width: 3%" colspan="5">
				<?php echo $row["BOARD_NO"]?>
			</td>
		</tr>
		
		<tr>
			<td style="width: 5%">작성일자</td>
			<td style="width: 3%" colspan="5">
				<?php echo $row["BOARD_DATE"]?>
			</td>
		</tr>
		<tr>
			<td colspan="6">
			<?php echo $row["BOARD_CONTENT"]?>			
			</td>
			
		</tr>
		<?php 
}?>		
	</table>
	<br>
	&nbsp;&nbsp;&nbsp;
	<a class="btn btn-secondary" href="./board_list.php">돌아가기</a>

</body>
</html>