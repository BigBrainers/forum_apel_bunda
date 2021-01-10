<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/datatables.min.css"/>
	<link rel="stylesheet" href="css/styles.css"/>
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatables.min.js"></script>
</head>
<body>
    <header>
        <?= $this->include('navbar')?>
    </header>
<main class="container" id="startChange">
        <div class="row container-post">
        <div class="col col-12">   
        <table id="user-table" class="display table table-bordered table-striped table-hover dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date Joined</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date Joined</th>
                <th class="text-center">Action</th>
            </tr>
        </tfoot>
    </table>
    </div>
        </div>
        <a type="button" class=" btn-modal btn-act text-white">
        +
        </a>
            <?= $this->include('navbar-bottom')?>
            <form action="<?= base_url('admin/deleteuser')?>"  method="POST">
        <div class="modal fade" id="delUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-white" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-danger">
                <h3>Yakin mau dihapus?</h3>
                <h1 class="u_u_id"></h1>
            <input type="text" class="u_u_id" name="u_id" hidden>
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    </main>
    <?= $this->include('add-modal')?>
</body>
<script>

    $(document).ready(function() {
    $('#user-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true, 
            "order": [[ 0, 'asc' ]], 
            "ajax":
            {
                "url": "<?= base_url('admin/viewtable') ?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], 
            "columns": [
                { "data": "user_id" }, 
                { "data": "user_username" },  
                { "data": "user_email" },
                { "data": "role_name" },
                { "data": "user_date" },
                { "data": "action" },
            ],
            "columnDefs": [
            { "orderable": false, "targets": 5 },
            { "width": "5%", "targets": 0 }
        ]
        });
        $('#user-table').on('click','.deleteUser', function(){
        const u_id = $(this).data('user_id');
        console.log(u_id);
        $('.u_u_id').val(u_id);
        })
    });
    </script>
</html>
