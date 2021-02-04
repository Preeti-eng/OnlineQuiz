<?php  
include "category.php";
$category=new category();
if(isset($_POST['cat_name'])){
    $cat_name = $_POST['cat_name'];
    $add_cat = $category-> addCategory($cat_name);
    if($add_cat == 1){
        echo 1;
    }else if($add_cat == 0){
        echo 0;
    }
}
if(isset($_POST['question'])){
    $frm = $_POST['frm'];
    $question = $_POST['question'];
    $oA = $_POST['oA'];
    $oB = $_POST['oB'];
    $oC = $_POST['oC'];
    $oD = $_POST['oD'];
    $answer = $_POST['answer'];
    $add_que = $category-> addQuestion($frm,$question,$oA,$oB,$oC,$oD,$answer);
    if($add_que == 1){
        echo 1;
    }else if($add_que == 0){
        echo 0;
        echo $this->conn->error();
    }
}
if(isset($_POST['frm1'])){
    $frm = $_POST['frm1'];
    $frmm = $category-> showQuestion($frm);
    print_r($frmm);
}
?>
