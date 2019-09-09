<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
<title>boardaddform</title>
<link rel="stylesheet" href="./css/bootstrap.css">
<script src="./vendor/jquery/jquery.slim.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
</head>
<body>
	<h1 class="display-4">board_delete_form.php</h1>
<?php

$board_no = $_GET["board_no"];
echo $board_no . "번째 글 수정 페이지<br>";
?>
	<form action="./board_delete_action.php" method="post">
		<table class = "table table-bordered" style="width:15%">
			<tr>
			<td>글 비밀번호를 입력하세요. </td>
			</tr>
			<tr>
			<td>
				<input class="form-control" name="board_pw" id="password"
					type="password" placeholder="비밀번호">
					<input name="board_no" 	type="hidden" value="<?php echo $board_no?>">
				</td>
			</tr>
			<tr>
			<td>
				<div>
					&nbsp;&nbsp;&nbsp;
					<button class="btn btn-success" type="submit">삭제</button>
					&nbsp;&nbsp;
					<button class="btn btn-secondary" type="reset" value="초기화">초기화</button>
					&nbsp;&nbsp; <a class="btn btn-info" href="./board_list.php">목록</a>
					&nbsp;&nbsp;
				</div>
				</td>
			</tr>



			<!--  -->

		</table>
	</form>
	<script type="text/javascript">

$("#password").change(function(){
	checkPassword($("#password").val());
});
function checkPassword(pass)
{
	if(pass.length <4)
	{
		alert("비밀번호는 4자 이상");
		$("#password").val('').focus();
		return false;
	}
	else
	{
		return true;
	}
}



		</script>
</body>
</html>