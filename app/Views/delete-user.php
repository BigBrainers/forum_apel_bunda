<script>
     $(document).ready(function(){
 
 // get Edit Product
 $('.userDel').on('click',function(){
    const u_id = $(this).data('user_id');
    $('.u_u_id').val(u_id);
    $('#delUser').modal('show');
    })
})
    </script>
<form action="<?= base_url('admin/deletequestion')?>"  method="POST">
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