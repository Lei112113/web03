<?php
include_once "base.php";
dd($_POST);
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/".$_FILES['trailer']['name']);
    $_POST['trailer']=$_FILES['trailer']['name'];
}
if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../upload/".$_FILES['poster']['name']);
    $_POST['poster']=$_FILES['poster']['name'];
}
if(!isset($_POST['id'])){
    $_POST['sh']=1;
    $_POST['rank']=$Movie->max("rank")+1;

}
$Movie->save($_POST);
to("../back.php?do=movie");