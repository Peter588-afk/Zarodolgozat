
<style>

.flexContainer{
    display: flex;
    
    border: 1px solid black;
    flex-wrap: wrap;
    flex-direction: row;
}

.box{
  width: 300px;
  margin: 5px;
  border: 2px solid black; 
}
.imagess{
  width: 100%;
}

</style>
<div class="flexContainer">
  <div class="box ">
    <form method="post">
      <h2>Termékek</h2>
        <div id="sorr">
            <?=$strTable?>
        </div>
    </form>
  </div>
</div>
  