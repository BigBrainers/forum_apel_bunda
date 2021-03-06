<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
        <div class="container-cust center">
        <div class="container h-100">
			<div class="row align-items-center h-100">
                <div class="col col-md-6 mx-auto" >
                    <h3>Form Login</h3>
                    <form autocomplete="off" action="<?= base_url('login/proceed') ?>" method="post">
                        <div class="form-group">
                            <label for="">Username or Email</label>
                            <input autocomplete="FALSE" type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                            <?php if (!session()->getFlashdata('failed') == null){?>
                                <p class="text-danger"><?= session()->getFlashdata('failed')?></p>
                                <?php }?>
                            <p>Create an account here <a href="<?= base_url('/register') ?>">here.</a></p>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
            <?= $this->include('navbar-bottom')?>
    </body>
</html>