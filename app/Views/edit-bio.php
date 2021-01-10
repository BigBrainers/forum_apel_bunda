<script>
     $(document).ready(function(){
 
 // get Edit Product
 $('.bioBtn').on('click',function(){
    const bio = $(this).data('bio');
    const user_id = $(this).data('id');
    $('.e_bio').val(bio);
    $('#editBio').modal('show');
    })
})
    </script>
<form action="<?= base_url('user/edit-bio/')?>" method="post">
        <div class="modal fade" id="editBio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-full" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Bio</label>
                    <textarea rows="12" type="text" class="form-control e_bio" name="u_bio"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>