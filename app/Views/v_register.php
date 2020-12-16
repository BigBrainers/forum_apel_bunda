<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/styles.css"/>
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            var isunamevalid = false;
            var ispasswvalid = false;
            $('#emailInput').keyup(function(){
                var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                console.log(pattern.test($(this).val()));
                if(!pattern.test($(this).val())){
                    $(this).addClass('is-invalid');
                }else{
                    $(this).removeClass('is-invalid');
                }
            })
            $('#usernameInput').keyup(function(){
                var usercheck = $(this).val();
                if(!usercheck == ''){
                    $.ajax({
                        url: 'register/usercheck',
                        type: 'post',
                        dataType:'JSON',
                        data:{username :usercheck},
                        success: function(result){
                            if(result.available){
                                $('#usernameInput').addClass('is-valid');
                                $('#usernameInput').removeClass('is-invalid');
                                isunamevalid = true;
                            }else{
                                $('#usernameInput').removeClass('is-valid');
                                $('#usernameInput').addClass('is-invalid');
                                isunamevalid = false;
                            }
                        }
                    });
                }else{
                    $('#usernameInput').removeClass('is-valid');
                    $('#usernameInput').addClass('is-invalid');
                    isunamevalid = false;
                }
            });
            $('#pass2').keyup(function(){
                var pass1 = $('#pass1').val();
                var pass2 = $(this).val();
                if(pass1 === pass2){
                    $(this).addClass('is-valid');
                    $('#pass1').addClass('is-valid');
                    $(this).removeClass('is-invalid');
                    $('#pass1').removeClass('is-invalid');
                    ispasswvalid = true;
                }else{
                    $(this).addClass('is-invalid');
                    $('#pass1').addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    $('#pass1').removeClass('is-valid');
                    ispasswvalid = false;         
                }
            })
        $('#submitBtn').click(function(){
            if((ispasswvalid == true) && (isunamevalid == true)){
                return true;
        }else{
            alert('tidac valid');
            return false;
        }
        })
        });
    </script>
</head>
<body class="bg-dark">
    <header>
    <?= $this->include('navbar')?>
    </header>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Form Register</h3>
                <hr>
                <form action="<?= base_url('register/proceed') ?>" method="post">
                    <div class="form-group uname">
                        <label for="">Username</label>
                        <input type="text" name="username" id="usernameInput" class="form-control" placeholder="Username" required>
                        <div class="valid-feedback">You're good to go.</div>
                        <div class="invalid-feedback">This username is already taken.</div>
                    </div>
                    <div class="form-group uname">
                        <label for="">Email</label>
                        <input type="text" name="email" id="emailInput" class="form-control" placeholder="Email" required>
                        <div class="valid-feedback">You're good to go.</div>
                        <div class="invalid-feedback">This email is already taken.</div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" id="pass1" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" id="pass2" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                        <div class="valid-feedback">Password match!.</div>
                        <div class="invalid-feedback">Password not match.</div>
                    </div>
                    <div class="form-group">
                        <button id="submitBtn" type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
         
    </div>
     
</body>
</html>