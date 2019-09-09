<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset-UTF-8">
	<title>boardlist</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
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
<body>
	<h1 class="display-4">board_list.php</h1>
	<!-- 페이징 작업 1&2 + 데이터 불러오기 -->
	<?php 
	$currentPage=1;
	if(isset($_GET["currentPage"])){
	    $currentPage = $_GET["currentPage"];
	}
	
	$conn = mysqli_connect("localhost","root","","test");
	
	if($conn){
	    echo "connection success<br>";
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
	    echo "counting success<br>";
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
	    echo "counting success<br>";
	}
	else {
	    echo "nothing happened: ".mysqli_error();
	}
	
	?>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="password" class="form-control" id="password">
          </div>          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="passcheck(<?php echo $row["BOARD_PW"]?>,<?php echo $row["BOARD_NO"]?>)">Send message</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-warning" data-toggle="modal"
						data-target="#modifing<?php echo $i?>">수정</button> 
		</td>
		<td>
			<?php echo "<a href='./board_delete_form.php?board_no=".$row["BOARD_NO"]."'>삭제</a>";?>				
		</td>
	</tr>
	<?php 
	$i++;
	}
	?>
	</table>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<!-- 페이징 작업 3 -->
	<?php 
	if($currentPage > 1){	    
	    echo "<a class = 'btn btn-primary' href = './board_list.php?currentPage=".($currentPage-1)."'>이전</a>nbsp;&nbsp;&nbsp;&nbsp;";
	}
	
	$lastPage = ($totalRowNum-1)/$rowPerPage;
	if(($totalRowNum-1)%$rowPerPage!=0)
	{
	    $lastPage += 1;
	}
	if($currentPage< $lastPage){
	    echo "<a class = 'btn btn-primary' href = './board_list.php?currentPage=".($currentPage+1)."'>다음</a>&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	mysqli_close($conn);
	
	?>
	&nbsp;&nbsp;
	<a class = 'btn btn-success' href="./board_add_form.php">글 쓰기</a>
	<br><br><br><br><br><br>
	<script src="./vendor/jquery/jquery.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	
	
</body>
</html>