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
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
<main class="container">
    <section id="startChange" class="section-cust">
        <h1>User Dashboard</h1>
        <form action="<?= base_url('user/postquestion')?>" method="POST" class="col-sm-4">
            <div class="form-group">
                <input type="text" name="q_title" placeholder="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" name="q_body" placeholder="body" class="form-control"></textarea>
            </div>
            <div>
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
        <div class="row">
        <?php
            foreach ($questions as $row){
        ?>
        <div class="col-sm-4">
            <div class="article-card card mb-3 border-success">
                <div class="card-header border-success">
                    <?= $row->q_title;?>
                </div>
                <div class="card-body"> 
                    <p><?= $row->q_body;?></p>
                    <p><?= $row->q_date;?></p>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </section>
    <section id="startChange" class="section-cust">
        <h1>admin Dashboard</h1>
    </section>
    <section id="startChange" class="section-cust">
        <h1>admin Dashboard</h1>
    </section>
</main>
</body>
</html>
