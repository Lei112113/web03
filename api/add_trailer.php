<?php
include_once "base.php";
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $rank=$Trailer->max('rank')+1;
    $_POST['img']=$_FILES['img']['name'];
    $_POST['sh']=1;
    $_POST['ani']=rand(1,3);
    $_POST['rank']=$Trailer->max('rank')+1;
    $Trailer->save($_POST);
}
to("../back.php?do=trailer");