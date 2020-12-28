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
        <div class="col-sm-12">
            <div class="article-card card mb-3 border-success">
                <div class="card-header border-success">
                    <?= $row->q_title;?>
                    <form action="admin/deletequestion"  method="POST">
                        <input type="text" name="q_id" hidden value="<?= $row->q_id; ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    <?php if($row->q_user_id == session()->get('id')){ ?>
                    <button style="float: right;" class="btn btn-primary editBtn"
                    data-id="<?= $row->q_id?>" 
                    data-body="<?= $row->q_body ?>"
                    data-title="<?= $row->q_title?>"
                    >Edit</button>
                        <?php } ?>
                </div>
                <div class="card-body"> 
                    <p><?= nl2br($row->q_body);?></p>
                    <p><?= $row->q_date;?></p>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </section>
        <a type="button" class=" btn-act text-white">
        +
        </a>
            <?= $this->include('edit-modal')?>
            <?= $this->include('add-modal')?>
    </main>
</body>
</html>
