<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/styles.css"/>
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
<main class="container" id="startChange">
    <section  class="section-cust">
        <h1>admin Dashboard</h1>
        <div class="row">
        <?php
            foreach ($questions as $row){
        ?>
        <div class="col-sm-8 offset-sm-2">
            <div class="article-card card mb-3">
                <div class="card-header">
                    <h5><?= $row->q_title;?></h5>
                    <span class="text-muted">pada <?= date('l, d F Y, ', strtotime($row->q_date));?></span>
                    <span class="text-muted">oleh</span> <i><?= $row->user_username;?></i>
                    <form action="admin/deletequestion"  method="POST">
                        <input type="text" name="q_id" hidden value="<?= $row->q_id; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    <?php if($row->q_user_id == session()->get('id')){ ?>
                    <button style="float: right;" class="btn btn-primary editBtn"
                        data-id="<?= $row->q_id?>" 
                        data-body="<?= $row->q_body ?>"
                        data-title="<?= $row->q_title?>"
                        >Edit
                    </button>
                    <?php } ?>
                </div>
                <div class="card-body ">
                    <?php if(strlen($row->q_body)>439){?>
                    <p><?= substr(nl2br($row->q_body), 0 ,460).'......(more)'; ?></p>
                    <?php } else{?>
                        <?= $row->q_body; }?>
                </div>
                <div class="card-footer text-center">
                    <form action="qna" method="POST">
                    <input type="text" name="q_id" hidden value="<?= $row->q_id; ?>">
                    <input type="submit" class="btn btn-light" value="Selengkapnya">
                    </form>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </section>
        <a type="button" class=" btn-modal btn-act text-white">
        +
        </a>
            <?= $this->include('navbar-bottom')?>
            <?= $this->include('edit-modal')?>
            <?= $this->include('add-modal')?>
    </main>
</body>
</html>
