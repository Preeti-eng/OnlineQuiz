<?php
include_once '../admin/category.php';
$cat =new category();
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
#img{
    background-image: url("../a.jpg");
    background-repeat:no-repeat;
    background-size:cover;
    opacity:0.9;
}
    </style>
    <body>
        <div id="img" style="height:600px;">
            <?php include "header.php"; ?> 
            <div style="text-align:center;">
                <h1 id="aa"  style="font-size:50px;color:#8a2be2;">Take Test....</h1>
                <p id="a" style="font-size:30px;padding:3%;color:#8a2be2;">
                    Select Language on which you want to continue...
                </P>
            <span id="timer" style="font-size:30px;"></span>
            <form style="text-align:center;">
                <select id="frm" value="" style="font-size:20px;color:#8a2be2;">
                <option selected="selected" disabled="disabled">Select Language</option>
                    <?php
$data=$cat->getCat();
if ($data!=false) {
    for ($i=0;$i<count($data);$i++) {
        echo '<option>'.$data[$i]['cat_name'].'</option>';
    }
}
                    ?>
                </select><br><br>
                <div id="dis" style="display:none;color:#4b0082;font-size:25px;font-weight:bold;">
                    <p id="question">Question</p>
                    <input type="radio" name="opt" id="opt1">
                    <label id="option1">Option A</label><br><br>
                    <input type="radio" name="opt" id="opt2">
                    <label id="option2">Option B</label><br><br>
                    <input type="radio" name="opt" id="opt3">
                    <label id="option3">Option C</label><br><br>
                    <input type="radio" name="opt" id="opt4">
                    <label id="option4">Option D</label><br><br>
                    <button type="button" class="btn btn-dark" id="prev">PREV</button>&nbsp;&nbsp;
                    <button type="button" class="btn btn-dark" id="next">NEXT</button>&nbsp;&nbsp;
                    <button type="button" class="btn btn-dark" id="sub">SUBMIT</button>
                </div>
            </form>
            <p id="qe"></p>
        </div>
    </div>
    <?php include "../footer.php"; ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var count = 0;
        var marks = 0;
        var a;
        $('#frm').change(function() {
            var frm1 = $('#frm').val();
            var question = $('#question');
            var option1 = $('#option1');
            var option2 = $('#option2');
            var option3 = $('#option3');
            var option4 = $('#option4');
            console.log(frm);
            $.ajax({
                type:"POST",
                url:"../admin/requestHandler.php",
                data:{
                    frm1:frm1},
                dataType:'json',
                success:function(res){
                    
                    if(res == 0){
                        $('#dis').css("display","none");
                        $('#qe').html("No Questions Found....");
                    }
                    else{
                        a = setInterval(timer,1000);
                        var counter=0;
                        var min=4;
                        var sec=60;
                        function timer(){
                            sec=--sec;
                            if(sec===0){
                                min=--min;
                                sec=59;
                                counter=++counter;
                            }
                            if(counter===5){
                                sec=0;
                                min=0;
                                clearInterval(a);
                                alert("Time Out...Submit Test Now..")
                                Swal.fire(
                                    'Test Submitted',
                                    'Your Marks is  !!!    '+marks,
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            }
                            document.getElementById("timer").innerHTML = min+" : "+sec+" Left";
                        }
                        $('#aa').hide();
                        $('#a').hide();
                        $('#frm').hide();
                        $('#qe').html("");
                        $('#dis').css("display","block");
                        console.log(res[0].ques);
                        question.html(res[0].ques);
                        option1.html(res[0].oA);
                        option2.html(res[0].oB);
                        option3.html(res[0].oC);
                        option4.html(res[0].oD);
                        $('#opt1').val(res[0].oA);
                        $('#opt2').val(res[0].oB);
                        $('#opt3').val(res[0].oC);
                        $('#opt4').val(res[0].oD);
                    }
                }
            });
        });
        $('#next').click(function() {
            //$('input[type="radio"]').prop('checked' , false);
            var frm1 = $('#frm').val();
            var question = $('#question');
            var option1 = $('#option1');
            var option2 = $('#option2');
            var option3 = $('#option3');
            var option4 = $('#option4');
            var answer = $("input[type='radio'][name='opt']:checked").val();
            console.log(answer);
            console.log(frm);
            count ++;
            $.ajax({
                type:"POST",
                url:"../admin/requestHandler.php",
                data:{
                    frm1:frm1},
                dataType:'json',
                success:function(res){
                    
                    if(answer == res[count-1].correctAns){
                        marks+=1;
                        console.log("match "+res[count-1].correctAns+""+marks);
                    }
                    else{
                        marks+=0;
                        console.log("not match"+res[count-1].correctAns+""+marks);
                    }
                    $('#dis').css("display","block");
                    console.log(res[count].ques);
                    question.html(res[count].ques);
                    option1.html(res[count].oA);
                    option2.html(res[count].oB);
                    option3.html(res[count].oC);
                    option4.html(res[count].oD);
                    $('#opt1').val(res[count].oA);
                    $('#opt2').val(res[count].oB);
                    $('#opt3').val(res[count].oC);
                    $('#opt4').val(res[count].oD);
                }
            });
        });
        $('#prev').click(function() {
            var frm1 = $('#frm').val();
            var question = $('#question');
            var option1 = $('#option1');
            var option2 = $('#option2');
            var option3 = $('#option3');
            var option4 = $('#option4');
            var answer = $("input[type='radio'][name='opt']:checked").val();
            console.log(frm);
            count --;
            $.ajax({
                type:"POST",
                url:"../admin/requestHandler.php",
                data:{
                    frm1:frm1},
                dataType:'json',
                success:function(res){
                    if(answer == res[count].correctAns){
                        console.log("match");
                    }
                    else{
                        console.log("not match")
                    }
                    $('#dis').css("display","block");
                    console.log(res[count].ques);
                    question.html(res[count].ques);
                    option1.html(res[count].oA);
                    option2.html(res[count].oB);
                    option3.html(res[count].oC);
                    option4.html(res[count].oD);
                    $('#opt1').val(res[count].oA);
                    $('#opt2').val(res[count].oB);
                    $('#opt3').val(res[count].oC);
                    $('#opt4').val(res[count].oD);
                }
            });
        });
        $('#sub').click(function() {
          if(confirm("Want to submit Test???")== true){
            clearInterval(a);
            Swal.fire(
            'Test Submitted',
            'Your Marks is  !!!    '+marks,
            'success'
        ).then(() => {
            window.location.reload();
        });
          }
        });
    </script>
</html>