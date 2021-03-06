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
    <section class="section-cust d-flex justify-content-center align-items-center">
            <h2>
            Hai <?= session()->get('username').'!'?>
            <small class="text-muted">Selamat bergabung di forum Apel Bunda</small>
            </h2>
            <div class="arrow-down"></div>
        </section>
        <div class="row container-post">
        <?php
            foreach ($questions as $row){
        ?>
        <div class="col-md-8 mx-auto">
            <div class="article-card card mb-3">
                    <div class="card-header" >
                        <div class="row">
                            <div class="col-10">
                                <h5><?= $row->q_title;?>
                                <?php if($row->q_ishassolution == true){ ?>
                                <icon style="color: green;"><?= file_get_contents("icons/check.svg");?></icon>
                                <?php }?>
                                </h5>
                                <span class="text-muted">pada <?= date('l, d F Y, ', strtotime($row->q_date));?></span>
                                <span class="text-muted">oleh</span> <a href="<?= base_url('user/profile/'.$row->user_username)?>"><i><?= $row->user_username. ' ';?></i></a>
                                <?php if($row->user_role == 2){?>
                                    <span class="badge badge-primary">admin</span>
                                <?php }?>
                            </div>
                            <div class="col-2">
                            <?php if( session()->get('isAdmin')){?>
                                <button class="btn btn-outline-danger delBtn float-right m-1"
                                    data-q_id="<?= $row->q_id?>" >
                                    <?php echo file_get_contents("icons/trash.svg"); ?>
                                </button>
                            <?php };?>
                            <?php if($row->q_user_id == session()->get('id')){ ?>
                                <button class="btn btn-outline-dark editBtn float-right m-1"
                                    data-id="<?= $row->q_id?>" 
                                    data-body="<?= $row->q_body ?>"
                                    data-user_id="<?= $row->q_user_id ?>"
                                    data-title="<?= $row->q_title?>">
                                    <?php echo file_get_contents("icons/pencil.svg"); ?>
                                </button>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                <div class="card-body ">
                    <?php if(strlen($row->q_body)>439){?>
                    <p><?= substr(nl2br($row->q_body), 0 ,460).'......(more)'; ?></p>
                    <?php } else{?>
                        <?= $row->q_body; }?>
                </div>
                <div class="card-footer text-center">
                <a href="<?= base_url('qna/'.$row->q_id)?>" type="submit" class="btn btn-outline-dark" value="">Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
        <a type="button" class=" btn-modal btn-act text-white">
        +
        </a>
            <?= $this->include('navbar-bottom')?>
            <?= $this->include('edit-modal')?>
            <?= $this->include('add-modal')?>
            <?= $this->include('delete-prompt')?>
    </main>
</body>
</html>
