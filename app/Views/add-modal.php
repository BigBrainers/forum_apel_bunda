<script>
     $(document).ready(function(){
    $('.btn-modal').on('click',function(){
        $('#addModal').modal('show');
        })
})
    </script>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                </div>
                <div class="modal-body">
                <form action="<?= base_url('admin/postquestion')?>" method="POST" class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="q_title" placeholder="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="q_body" placeholder="body" class="form-control"></textarea>
                        </div>
                        <!-- <div> 
                            <input type="submit" value="submit" class="btn btn-primary">
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>