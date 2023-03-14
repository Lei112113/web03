<?php
include_once "base.php";
dd($_POST);
$db=${$_POST['table']};
$row=$db->find($_POST['id']);
$row2=$db->find($_POST['id2']);
$rank=$row['rank'];
$row['rank']=$row2['rank'];
$row2['rank']=$rank;
$db->save($row);
$db->save($row2);

