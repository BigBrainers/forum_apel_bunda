<script>
     $(document).ready(function(){
    $('.btn-modal').on('click',function(){
        $('#addModal').modal('show');
        })
})
    </script>
    <form action="<?= base_url('user/postquestion')?>" method="POST" class="col-sm-12">
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ada pertanyaan?</h5>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="q_title" placeholder="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea rows="12" type="text" name="q_body" placeholder="body" class="form-control"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
            </div>
            </form>