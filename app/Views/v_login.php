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
</head>
<body class="bg-dark">
    <header>
    <?= $this->include('navbar')?>
    </header>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Form Login</h3>
                <hr>
                <form action="<?= base_url('login/proceed') ?>" method="post">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                        <p>Create an account here <a href="<?= base_url('/register') ?>">here.</a></p>
                    </div>
                </form>
            </div>
        </div>
         
    </div>
     
</body>
</html>