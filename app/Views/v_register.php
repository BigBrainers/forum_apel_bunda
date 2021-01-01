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
            var isemailvalid = false;
            $('#emailInput').keyup(function(){
                var emailcheck = $(this).val();
                var pattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!emailcheck == ''){
                    $.ajax({
                        url: 'register/emailcheck',
                        type: 'post',
                        dataType:'JSON',
                        data:{email :emailcheck},
                        success: function(result){
                            console.log(result.available && pattern.test(emailcheck));
                            if(result.available && pattern.test(emailcheck)){
                                $('#emailInput').addClass('is-valid');
                                $('#emailInput').removeClass('is-invalid');
                                var isemailvalid = true;
                            }else{
                                $('#emailInput').addClass('is-invalid');
                                $('#emailInput').removeClass('is-valid');
                                var isemailvalid = false;
                            }
                        }
                    })
                }
                else{
                    $('#emailInput').addClass('is-invalid');
                    $('#emailInput').removeClass('is-valid');
                    var isemailvalid = false;
                }

            });
            $('#usernameInput').keyup(function(){
                var usercheck = $(this).val();
                if(!usercheck == ''){
                    $.ajax({
                        url: 'register/usernamecheck',
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
            $('.pass').keyup(function(){
                var pass1 = $('#pass1').val();
                var pass2 = $('#pass2').val();
                if(pass1 === pass2){
                    $('#pass2').addClass('is-valid');
                    $('#pass1').addClass('is-valid');
                    $('#pass2').removeClass('is-invalid');
                    $('#pass1').removeClass('is-invalid');
                    ispasswvalid = true;
                }else{
                    $('#pass2').addClass('is-invalid');
                    $('#pass1').addClass('is-invalid');
                    $('#pass2').removeClass('is-valid');
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
    <div class="container-cust center">
        <div class="container h-100">
			<div class="row align-items-center h-100">
            <div class="col col-md-6 mx-auto">
                <h3>Form Register</h3>
                <form autocomplete="off" action="<?= base_url('register/proceed') ?>" method="post">
                    <div class="form-group uname">
                        <label for="">Username</label>
                        <input type="text" name="username" id="usernameInput" class="form-control" placeholder="Username" required>
                        <div class="valid-feedback">You're good to go.</div>
                        <div class="invalid-feedback">This username is already taken.</div>
                    </div>
                    <div class="form-group uname">
                        <label for="">Email</label>
                        <input autocomplete="off" type="text" name="email" id="emailInput" class="form-control" placeholder="Email" required>
                        <div class="valid-feedback">You're good to go.</div>
                        <div class="invalid-feedback">This email is already taken or invalid.</div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" id="pass1" name="password" class="form-control pass" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" id="pass2" name="cpassword" class="form-control pass" placeholder="Confirm Password" required>
                        <div class="valid-feedback">Password match!.</div>
                        <div class="invalid-feedback">Password not match.</div>
                    </div>
                    <div class="form-group">
                        <p>Dengan klik Register, Anda telah menyetujui Syarat & Ketentuan serta Kebijakan Privasi Apel Bunda.</p>
                        <button id="submitBtn" type="submit" class="btn btn-block btn-primary">Register</button>
                        <p>Or login here <a href="<?= base_url('/login') ?>">here.</a></p>
                    </div>
                </form>
            </div>
        </div>
        <?= $this->include('navbar-bottom')?>
    </div>
    </div>
     
</body>
</html>