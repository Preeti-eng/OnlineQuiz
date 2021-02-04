<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include "header.php"; ?> 
        <div>
            <h1 style="text-align:center">Login Here</h1>
        </div>
                <form style="padding:10%;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="button" class="btn btn-dark" id="submit">Submit</button>
                    <div style="text-align:center;padding:2%;">
                        Not Registered?
                        <span><a href="register.php">Sign Up</a></span>
                    </div>
                </form>
            
        <?php include "footer.php"; ?> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $('#submit').click(function() {
                var email = $('#email').val();
                var password = $('#password').val();
                $.ajax({
                    type:"POST",
                    url:"handler.php",
                    data:{
                        email:email,password:password},
                    success:function(res){
                        console.log(res);
                        if(res == 0){
                            alert("Incorrect id or pass");
                        }
                        else if(res == 1){
                            alert("Welcome Admin");
                            window.location.href = "admin/index.php";
                        }
                        else if(res == 2){
                            alert("Welcome User");
                            window.location.href = "user/index.php";
                        }
                    }
                });
            });
        </script>
    </body>
</html>
