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
 
 // get Edit Product
 $('.editBtn').on('click',function(){
    const id = $(this).data('id');
    const title = $(this).data('title');
    const body = $(this).data('body');

    $('.e_id').val(id);
    $('.e_title').val(title);
    $('.e_body').val(body);
    $('#editModal').modal('show');
    })
})
    </script>
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
                    <?php if($row->q_user_id == session()->get('id')){
                        echo '
                    <button style="float: right;" class="btn btn-primary editBtn"
                    data-id="<?= $row->q_id?>" 
                    data-body="<?= $row->q_body?>"
                    data-title="<?= $row->q_title?>"
                    >Edit</button>';
                        }?>
                    
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
    <!-- Modal Edit Product-->
    <form action="/user/editquestion" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control e_title" name="q_title">
                        </div>                        
                        <div class="form-group">
                            <label>Body</label>
                            <input type="text" class="form-control e_body" name="q_body">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="q_id" class="e_id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
</body>
</html>
