<script>
     $(document).ready(function(){
 
 // get Edit Product
 $('.editAnswerBtn').on('click',function(){
    const id = $(this).data('id');
    const body = $(this).data('body');
    const user_id = $(this).data('user_id');
    const q_id = $(this).data('q_id');

    $('.a_id').val(id);
    $('.a_q_id').val(q_id);
    $('.a_user_id').val(user_id);
    $('.a_body').val(body);
    $('#editAnswer').modal('show');
    })
})
    </script>
<form action="<?= base_url('/user/editanswer')?>" method="post">
        <div class="modal fade" id="editAnswer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-full" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Jawaban</label>
                    <textarea rows="12" type="text" class="form-control a_body" name="a_body"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="a_id" class="a_id">
                <input type="hidden" name="q_id" class="a_q_id">
                <input type="hidden" name="a_user_id" class="a_user_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>