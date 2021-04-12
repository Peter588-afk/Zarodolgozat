<?php
session_start();
//print_r(session_id());
	require_once '../config.php';
	
	if(isset($_SESSION['fnev'])){
		if($_SESSION['fnev'] != 'admin'){
		 header("Location:index.php");
		}
	 }
	$tbl="";
	$sql="select * from products order by kategId,name";
    $stmt=$db->query($sql);
	         
           /* "<td class=' btn btn-outline-light m-1'><a  href='editAdmin.php?id=$id'>Edit</a></td>"
		     "<td class=' btn btn-outline-light  m-1'><a  href='deleteAdmin.php?id=$id'>Delete</a></td></tr>"*/
	
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
		<script src="../bootstrap/jquery.min.js"></script>
		<script src="../bootstrap/bootstrap.min.js"></script>
        <title>Nyilvantartas</title>
	</head>
<body>
<div class="container border p-3">
  <h2 class="text-center">Termékek nyilvántartása</h2>
  <div class="row ">
	 <div class="col-md-4"  ><?=isset($_SESSION['msg'])? $_SESSION['msg']: "" ?></div>
	 <div class="col-md-4 text-center shadow p-3 m-1  rounded">
	 	<div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="insertAdmin.php"><b>Insert</b> (uj termek bevezetese)</a></div>
         <div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="../web.php"><b>Vissza</b></a></div>
		 <div class="btn btn-outline-light  m-1 p-1 rounded"><a  href="orders.php"><b>Megrendelések</b></a></div>
		<!-- <div class="btn btn-outline-light  m-1 p-1 rounded"><form action="" method="GET"><input id="search" name="search" type="text" placeholder="Type here" ><input id="submit" type="submit" value="Search"></form></div>-->
      </div>
  </div>
	<div class="row shadow p-1 bg-light">
	  <div class="col-md-12">
		 <div class="table-responsive">
		   <table class="table table-hover table-fixed-border" >
			   <thead><tr><th scope="col">Azonosito</th><th scope="col">Nev</th><th scope="col">Ár</th><th scope="col">Kép</th><th scope="col">Kategória</th><th scope="col">Darabszám</th><th scope="col">&nbsp</th><th scope="col">&nbsp</th></tr></thead>
			   <tbody >
					<?php
					while($row=$stmt->fetch()){
						extract($row);?>
						<tr class='table-row'>
									<td><?=$id?></td>
									<td contenteditable='true'
										onBlur='save(this,"name",<?=$id?>)'
										onClick='showEdit(this);'><?=$name?></td>
									<td contenteditable='true'
										onBlur='save(this,"price",<?=$id?>)'
										onClick='showEdit(this);'><?=$price?></td>
									<td contenteditable='true'
										onBlur='save(this,"picture",<?=$id?>)'
										onClick='showEdit(this);'><?=$picture?></td>
									<td contenteditable='true'
										onBlur='save(this,"kategId",<?=$id?>)'
										onClick='showEdit(this);'><?=$kategId?></td>
									<td contenteditable='true'
										onBlur='save(this,"db",<?=$id?>)'
										onClick='showEdit(this);'><?=$db?></td>
									<td class=' btn btn-outline-light  m-1'><a  href='deleteAdmin.php?id=<?=$id?>'>Delete</a></td>
								</tr>
					<?php } ?> 
		  	</tbody>
		  </table>
		</div>
	  </div>
	</div>
</div>
	<script src="jquery-3.2.1.min.js"></script>
    <script src="inlineEdit.js"></script>
</body>
</html>