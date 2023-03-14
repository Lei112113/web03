<?php
include_once "base.php";
foreach($_POST['id'] as $key=> $id){

    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Trailer->del($id);
    }else{
        $t=$Trailer->find($id);
        $t['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $t['name']=$_POST['name'][$key];
        $t['ani']=$_POST['ani'][$key];
        dd($t);
        $Trailer->save($t);
    }

        
    
    
}
to("../back.php?do=trailer");