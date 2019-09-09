<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>글 수정하기</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
	function passcheck(pass,bno){
		var userpass = $('#password').val();
		if(userpass == pass)
		{
		window.location.href = './board_update_form.php?board_no='+bno;
		}
		else
		{
		alert("비밀번호가 틀립니다.");
		}
	}

	</script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="board_list.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Board <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="board_list.php">
         <i class="fas fa-align-justify"></i>
          <span>게시판</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


   

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" >

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="width: 95%; ">
<?php 
	$conn = mysqli_connect("localhost","root","","test");
	if($conn){
	    //echo "connection success<br>";
	} else {
	    die("connection failed".mysqli_error());
	}
	$board_no = $_GET["board_no"];
	//echo $board_no."번째 글 수정 페이지<br>";
	$sql = "Select BOARD_NO, BOARD_TITLE, BOARD_CONTENT,BOARD_USER,BOARD_DATE from board where  BOARD_NO = $board_no";
	$result = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_array($result))
	{
	?>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">게시글 수정</h6>
            </div>
            <div class="card-body">
	<form class="form-horizontal" action="./board_update_action.php"
		method="post">
		<!-- <div class="form-group">
			<label for="password" class="col-sm-2 control-label">비밀번호</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardPw" id="password"
					type="password" placeholder="비밀번호">
			</div>
		</div> -->
		<div class="form-group">
			<label for="no" class="col-sm-2 control-label">글 번호</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardNo" id="no" type="text"
					placeh older="글 번호" value = <?php echo $row["BOARD_NO"]?> readonly="readonly">
			</div>
		</div>
		
		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">글 제목</label>
			<div class="col-sm-10">
				<input class="form-control" name="boardTitle" id="title" type="text"
					placeholder="글 제목" value = <?php echo $row["BOARD_TITLE"]?>>
			</div>
		</div>
		<div class="form-group">
			<label for="content" class="col-sm-2 control-label">내용</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="boardContent" id="content"
					rows="5" cols="50" placeholder="글 내용" wrap="hard"><?php echo trim($row["BOARD_CONTENT"])?></textarea>
			</div>
		</div>
		
<?php }
mysqli_close($conn);?>
		<div>			
			<button class="btn btn-success" type="submit" value="수정">수정</button>
			&nbsp;&nbsp;
			<button class="btn btn-secondary" type="reset" value="초기화">초기화</button>
			&nbsp;&nbsp; <a class="btn btn-info" href="./board_list.php">목록</a>
			&nbsp;&nbsp;
		</div>
		
		<!--  -->
		<script type="text/javascript">


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
          
         
        </div>
        </div></div>
        
      
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>





