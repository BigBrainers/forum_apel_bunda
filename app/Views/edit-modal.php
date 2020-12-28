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
                    <textarea type="text" class="form-control e_body" name="q_body"></textarea>
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