
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/css/styles.css"/>
	<script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
    <main class="container center" id="startChange">
			<div class="row w-100">
		        <div class="card col col-lg-8 offset-lg-2 border-success" >
                    <div class="card-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-lg-6">
                                <h2><?= session()->get('username') ?><small class="text-muted"><?= session()->get('email') ?></small></h2>
                                <button class="btn btn-outline-dark bioBtn float-right m-1"
                                    data-bio="<?= session()->get('bio') ?>"
                                    >
                                    <?php echo file_get_contents("icons/pencil.svg"); ?>
                                </button>
                            <p>Bio</p>
                                <p><?= session()->get('bio') ?></p>
                            </div>
                            <div class="col col-lg-4 offset-lg-2">
                                <img src="/icons/person.svg" alt="">
                            </div>
                        </div>
        <?= $this->include('navbar-bottom')?>
        <?= $this->include('edit-bio')?>
        </div>
        </div>
        </div>
    </main>
</body>
</html>
