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
	<h1 class="display-4">board_add_form.php</h1>
	<form class="form-horizontal" action="./board_add_action.php"
		method="post">
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">비밀번호</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardPw" id="password"
					type="password" placeholder="비밀번호">
			</div>
		</div>
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">글 제목</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardTitle" id="title" type="text"
					placeholder="글 제목">
			</div>
		</div>
		<div class="form-group">
			<label for="content" class="col-sm-2 control-label">내용</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="boardContent" id="content"
					rows="5" cols="50" placeholder="글 내용"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="user" class="col-sm-2 control-label">작성자</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardUser" id="user" type="text"
					placeholder="작성자">
			</div>
		</div>

		<div>
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-success" type="submit" value="작성">작성</button>
			&nbsp;&nbsp;
			<button class="btn btn-secondary" type="reset" value="초기화">초기화</button>
			&nbsp;&nbsp; <a class="btn btn-info" href="./board_list.php">목록</a>
			&nbsp;&nbsp;
		</div>
		<!--  -->
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
$("#title").change(function(){
	checkTitle($("#title").val());
});
function checkTitle(title)
{
	if(title.length <2)
	{
		alert("제목은 2자 이상");
		$("#title").val('').focus();
		return false;
	}
	else
	{
		return true;
	}
}
$("#content").change(function(){
	checkContent($("#content").val());
});
function checkContent(content)
{
	if(content.length <2)
	{
		alert("내용은 2자 이상");
		$("#content").val('').focus();
		return false;
	}
	else
	{
		return true;
	}
}
$("#user").change(function(){
	checkUser($("#user").val());
});
function checkUser(user)
{
	if(user.length <2)
	{
		alert("작성자명은 2자 이상");
		$("#user").val('').focus();
		return false;
	}
	else
	{
		return true;
	}
}



		</script>
	</form>
</body>
</html>