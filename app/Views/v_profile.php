
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
    <?php foreach ($userdata as $user){?>
    <main class="container container-post" id="startChange">
			<div class="row w-100">
                <div class="col col-lg-10 mx-auto">
		        <div class="card  border-success" >
                    <div class="card-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col col-lg-4 mx-auto">
                                <img src="/icons/person.svg" alt="">
                                <?php if(session()->get('id') == $user->user_id){?>
                                <a href="<?= base_url('/logout')?>" class="btn btn-danger btn-block">
                                    Logout
                                </a>
                                <?php }?>
                            </div>
                            <div class="col col-lg-8">
                                <h2><?= $user->user_username ?><small class="text-muted"><?= $user->user_email ?></small></h2>
                            <h4>Bio: 
                            <?php if(session()->get('id') == $user->user_id){?>
                            <a class="btn btn-light bioBtn m-1"
                                    data-bio="<?= $user->user_bio ?>"
                                    >
                                    <?= file_get_contents("icons/pencil.svg"); ?>
                                </a>
                                <?php }?>
                            </h4>
                                <p><?= $user->user_bio ?></p>
                            </div>
                        </div>
        <?= $this->include('navbar-bottom')?>
        <?= $this->include('add-modal')?>
        <?= $this->include('edit-bio')?>
        </div>
        </div>
        </div>
        </div>
    </main>
    <?php }?>
</body>
</html>
