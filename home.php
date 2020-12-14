<?php
require_once "config2.php";

$sql="SELECT * FROM termekek";
$stmt=$db->query($sql);
$strTable="";
$strKosar="";
while($row=$stmt->fetch()){
  //print_r($row);
  //echo "<br>";
  $strTable.="<div class='col-md-4'><h4>{$row['nev']}</h4></p><img src='{$row['foto']}' class='images'><p class='price text-success'>{$row['ar']}<br><button class='btn btn-success' name='gomb' value='{$row['id']}'>Kosárba</button></div>";
}
//print_r($_POST);
if(isset($_POST['gomb'])){
  $id=$_POST['gomb'];
  $kosarId=session_id();
  $sql="INSERT INTO kosar values('{$kosarId}', {$id}, 1)";
  //echo $sql;
  $stmt=$db->exec($sql);
  if($stmt){
    $sql="SELECT a.id, a.nev, a.ar, sum(b.darab) darab from termekek a, kosar b WHERE a.id=b.idTermek GROUP BY b.idTermek";
    $stmt=$db->query($sql);
    while($row=$stmt->fetch()){
      $strKosar.="<tr><td>{$row['nev']}</td><td>{$row['ar']}</td><td>{$row['darab']}</td>";
      $strKosar.="<td><a href='edit.php'>EDIT</a></td><td><a href='delete.php?id={$row['id']}'>DELETE</a></td></tr>";
    }
  }
}
?>
<hr>
  <form method="post">
  <div class="container border p-3">
      <h2 class="text-center">Egy kis ízelítő a termékekből</h2>
        <div class="row shadow p-1 bg-light">
          <div class="col-md-12">
             <div class="table-responsive">
                  <div class="row" id="sor">
                    <?=$strTable?>
                  </div>
            </div>
          </div>
        </div>
  </form>
    <div class="container border p-3">
      <h2 class="text-center">Kosárba rakott termékek</h2>
        <div class="row shadow p-1 bg-light">
          <div class="col-md-12">
             <div class="table-responsive">
              <table class="table table-hover table-fixed-border table-striped" >
                  <thead><tr><th scope="col">Termék neve</th><th scope="col">Ára</th></tr></thead>
                  <tbody id="tablazat"><?=$strKosar?></tbody>
                  
             </table>
            </div>
          </div>
        </div>