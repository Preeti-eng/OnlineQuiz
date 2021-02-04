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
    <body>
        <?php include "header.php";?> 
    <div id="img">
        <form>
            <div class="mb-3" style="padding:10%;">
                <label class="form-label">Add Test Category</label>
                <input type="text" class="form-control" id="cat_name">
                <br />
                <button type="button" class="btn btn-dark" id="add">ADD</button>
            </div>
            <div style="text-align:center;padding:3.5%;font-size:20px;">
                Want to Add Questions??????
                <span><a href="questions.php">Add Questions Here</a></span>
            </div>
        </div>    
    </form>
</div>
    <?php include "../footer.php";?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#add').click(function() {
            var cat_name = $('#cat_name').val();
            $.ajax({
                type:"POST",
                url:"requestHandler.php",
                data:{
                    cat_name:cat_name},
                success:function(res){
                    //alert(res);
                    if(res == 0){
                        alert("Error");
                    }
                    else if(res == 1){
                        alert("Category Added");
                        window.location.href = "questions.php";
                    }
                }
            });
        });
    </script>
</body>
</html>