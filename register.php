<!doctype html>
<html lang="en">
    <?php include "header.php" ?>
    <h1 style="text-align:center;">Rgistration Form</h1>
    <hr>
    <div class="container-fluid">
        <form style="padding:10%;">
            <div class="form-group col-md-12">
                <label >Name</label>
                <input type="text" class="form-control" id="name"  name="studentname" placeholder="Name">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group col-md-12">
                <label class="form-label">Contact</label>
                <input type="number" class="form-control" id="contact" placeholder="Contact">
            </div>
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <br />
            <div class="form-group col-md-12">
                <button type="button" class="btn btn-dark" id="submit">Sign Up</button>
            </div>
        </div>
    </form>
    <div style="text-align:center;padding:2%;">
        Already Registered?
        <span><a href="index.php">Sign In</a></span>
    </div>
</div>
<?php include "footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#submit').click(function() {
        var uname =  $('#name').val();
        var uemail = $('#email').val();
        var ucontact = $('#contact').val();
        var upassword =  $('#password').val();
        $.ajax({
            type:"POST",
            url:"handler.php",
            data:{
                uname:uname,uemail:uemail,ucontact:ucontact,upassword:upassword},
            success:function(res){
                //alert(res);
                if(res == 0){
                    alert("Registration Failed");
                }
                else if(res == 1){
                    alert("Registration Successful....You can login Now");
                    window.location.href = "index.php";
                }
            }
        });
    });
</script>
</body>
</html>