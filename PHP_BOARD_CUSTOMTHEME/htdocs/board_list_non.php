<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>게시판</title>

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
      <div id="content" style="background:white;">

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
        <div class="container-fluid" style="width: 95%">

          <!-- Page Heading -->
          
			  <!-- 페이징 작업 1&2 + 데이터 불러오기 -->
	<?php 
	$currentPage=1;
	if(isset($_GET["currentPage"])){
	    $currentPage = $_GET["currentPage"];
	}
	
	$conn = mysqli_connect("localhost","root","","test");
	
	if($conn){
	   // echo "connection success<br>";
	} else {
	    die("connection failed".mysqli_error());
	}
	
	$sqlcount = "SELECT COUNT(*) FROM BOARD";
	$resultCount = mysqli_query($conn, $sqlcount);
	if($rowCount = mysqli_fetch_array($resultCount)){
	    $totalRowNum = $rowCount["COUNT(*)"];
	}
	if($resultCount)
	{
	    //echo "counting success<br>";
	}
	else {
	    echo "nothing happened: ".mysqli_error();
	}
	
	$rowPerPage = 5;
	$begin = ($currentPage-1)*$rowPerPage;
	
	$sql = "Select BOARD_NO, BOARD_PW,BOARD_TITLE, BOARD_USER,BOARD_DATE from board order by 
        BOARD_NO desc limit ".$begin.",".$rowPerPage."";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
	    //echo "counting success<br>";
	}
	else {
	    echo "nothing happened: ".mysqli_error();
	}
	
	?>
	 <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">게시판 </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
	<table class = "table table-bordered">
	<tr>
	<th>번호</th>	
	<th>제목</th>
	<th>작성자</th>
	<th>작성일</th>
	<th>수정</th>
	<th>삭제</th>	
	</tr>	
	<!-- 데이터 출력 -->
	<?php 
	$i = 0;
	while($row = mysqli_fetch_array($result)){	  
	?>
	<tr>
		<td>
			<?php echo $row["BOARD_NO"];?>		
		</td>
		<td>			
			<?php 
			echo "<a href='./board_detail.php?board_no=".$row["BOARD_NO"]."'>";
			echo $row["BOARD_TITLE"];
			echo "</a>";			
			?>		
		</td>
		<td>
			<?php echo $row["BOARD_USER"];?>		
		</td>
		<td>
			<?php echo $row["BOARD_DATE"];?>		
		</td>
		<td>
			
		<div class="modal fade" id="modifing<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
      <h5 class="modal-title" id="exampleModalLabel">비밀번호를 입력하세요</h5>  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="password" class="form-control" id="password">
          </div>          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <button type="button" class="btn btn-primary" onclick="passcheck(<?php echo $row["BOARD_PW"]?>,<?php echo $row["BOARD_NO"]?>)">확인</button>
      </div>
    </div>
  </div>
</div>
<a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal"
						data-target="#modifing<?php echo $i?>">
                    <span class="icon text-white-50">
                      <i class="fas fa-divide"></i>
                    </span>
                    <span class="text">수정</span>
                  </a>

		</td>
		<td>
			<?php echo "<a class='btn btn-icon-split btn-danger' href='./board_delete_form.php?board_no=".$row["BOARD_NO"]."'>";?>	
			<span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">삭제</span>		
            <?php echo "</a>";?>
		</td>
	</tr>
	<?php 
	$i++;
	}
	?>
	</table>
	</div>
            </div>
          </div>
	<!-- 페이징 작업 3 -->
	<?php 
	if($currentPage > 1){	    
	    echo "<a class = 'btn btn-icon-split btn-primary' href = './board_list.php?currentPage=".($currentPage-1)."'>";
?> <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">이전</span>
</a>&nbsp;&nbsp;&nbsp;&nbsp;

<?php 

	}
	
	$lastPage = ($totalRowNum)/$rowPerPage;
	if(($totalRowNum-1)%$rowPerPage!=0)
	{
	    $lastPage += 1;
	}
	if($currentPage< $lastPage){
	    echo "<a class = 'btn btn-icon-split btn-primary' href = './board_list.php?currentPage=".($currentPage+1)."'>";
?>
 <span class="icon text-white-50">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">다음</span>
</a>&nbsp;&nbsp;&nbsp;&nbsp;


<?php }
	mysqli_close($conn);
	
	?>
	&nbsp;&nbsp;
	<a class = 'btn btn-icon-split btn-success' href="./board_add_form.php">
	 <span class="icon text-white-50">
                     <i class="fas fa-pencil-alt"></i>
                    </span>
                    <span class="text">글 쓰기</span>	
	</a>
	
        </div>
      
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Vision 2019</span>
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





