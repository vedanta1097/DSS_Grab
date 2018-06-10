<!-- set data to edit modal -->
<script>
  $(document).on('click','.open-edit-modal',function(){
      var url = "/crips/edit";
      var id  = $(this).val();
      $.get(url + '/' + id, function (data) {
        //success data
        $('#edit-data-form').attr('action', '/crips/' + data[0].id);
        $('#keterangan-crips').val(data[0].keterangan);
        $("#nilai-crips").val(data[0].nilai);
        $('#kriteria-id').val(data[1]);
        $('#EditModal').modal('show');
      }) 
  });
</script>

<!-- edit criteria -->
<div class="modal fade" tabindex="-1" role="dialog" id="EditModal" aria-labelledby="EditModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST" id="edit-data-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kriteria</h4>
        </div>
    
        <input type="hidden" name="kriteria_id" id="kriteria-id">
        <div class="modal-body">
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan-crips" 
            placeholder="keterangan crips" name="keterangan_crips" required>
          </div>
          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="text" class="form-control" id="nilai-crips" 
            placeholder="Nilai crips" name="nilai_crips" required>
          </div>
        </div>

        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->