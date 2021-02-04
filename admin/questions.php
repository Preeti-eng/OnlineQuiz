<?php
include_once 'category.php';
$cat =new category();
?>
<!DOCTYPE html>
<html lang="en">
<style>
            #img{
    background-image: url("../a.jpg");
    background-repeat:no-repeat;
    background-size:cover;
    opacity:0.9;
}
    </style>
    <body id="img">
        <?php include "header.php";?> 
        <form style="text-align:center;">
            <select id="frm" value="">
            <option selected="selected" disabled="disabled">Select Category</option>
                <?php
$data=$cat->getCat();
if ($data!=false) {
    for ($i=0;$i<count($data);$i++) {
        echo '<option>'.$data[$i]['cat_name'].'</option>';
    }
}
                ?>
            </select>
                <div  class="mb-3"  id="ques" style="padding:10%;">
                <label class="form-label">Add Question</label>
                <input type="text" class="form-control" id="question">
                <br />
                <label class="form-label">Option A</label>
                <input type="text" class="form-control" id="oA">
                <br />
                <label class="form-label">Option B</label>
                <input type="text" class="form-control" id="oB">
                <br />
                <label class="form-label">Option C</label>
                <input type="text" class="form-control" id="oC">
                <br />
                <label class="form-label">Option D</label>
                <input type="text" class="form-control" id="oD">
                <br />
                <label class="form-label">Correct Answer</label>
                <input type="text" class="form-control" id="answer">
                <br />
                <button type="button" class="btn btn-dark" id="add">Add Questions</button>
            </div>
        </form>
        <?php include "../footer.php";?> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $('#add').click(function() {
                var frm = $('#frm').val();
                console.log(frm);
                var question = $('#question').val();
                var oA = $('#oA').val();
                var oB = $('#oB').val();
                var oC = $('#oC').val();
                var oC = $('#oC').val();
                var oD = $('#oD').val();
                var answer = $('#answer').val();
                $.ajax({
                    type:"POST",
                    url:"requestHandler.php",
                    data:{
                        frm:frm,question:question,oA:oA,oB:oB,oC:oC,oD:oD,answer:answer},
                    success:function(res){
                        //alert(res);
                        if(res == 0){
                            alert("Error");
                        }
                        else if(res == 1){
                            alert("Question Added Successfully.....");
                            $('#question').val("");
                            $('#oA').val("");
                            $('#oB').val("");
                            $('#oC').val("");
                            $('#oC').val("");
                            $('#oD').val("");
                            $('#answer').val("");
                        }
                    }
                });
            });
        </script>
    </body>
</html>