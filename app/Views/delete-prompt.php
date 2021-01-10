<script>
     $(document).ready(function(){
 
 // get Edit Product
 $('.delBtn').on('click',function(){
    const q_id = $(this).data('q_id');
    console.log(q_id);
    $('.d_q_id').val(q_id);
    $('#delQuestion').modal('show');
    })
})
    </script>
<form action="<?= base_url('admin/deletequestion')?>"  method="POST">
        <div class="modal fade" id="delQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-white" role="document">
            <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-danger">
                <h3>Yakin mau dihapus?</h3>
            <input type="text" class="d_q_id" name="q_id" hidden>
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
        </div>
    </form>