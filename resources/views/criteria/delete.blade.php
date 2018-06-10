<!--  show delete modal -->
<script>
  $(document).on('click','.open-delete-modal',function(){
      var id  = $(this).val();
      var url = "/kriteria/" + id;
      $('#delete-data-form').attr('action', url);
      $('#DeleteModal').modal('show');
  });
</script>

<!-- delete criteria -->
<div class="modal fade" tabindex="-1" role="dialog" id="DeleteModal" aria-labelledby="DeleteModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST" id="delete-data-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Kriteria</h4>
        </div>
    
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus data kriteria ini?</p>
        </div>

        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal