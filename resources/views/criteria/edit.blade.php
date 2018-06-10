<!--  set data to edit modal -->
<script>
  $(document).on('click','.open-edit-modal',function(){
      var url = "/kriteria";
      var id  = $(this).val();
      $.get(url + '/' + id, function (data) {
          //success data
          $('#edit-data-form').attr('action', '/kriteria/' + data.id);
          $('#nama-kriteria').val(data.nama);
          $("#atribut-kriteria").val(data.atribut);
          $('#bobot-kriteria').val(data.bobot);
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
    
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Kriteria</label>
            <input type="text" class="form-control" id="nama-kriteria" 
            placeholder="Nama kriteria" name="nama_kriteria" required>
          </div>
          <div class="form-group">
            <label for="atribut">Atribut</label>
            <select class="form-control" id="atribut-kriteria" name="atribut_kriteria">
              <option value="cost">Cost</option>
              <option value="benefit">Benefit</option>
            </select>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" class="form-control" id="bobot-kriteria" 
            placeholder="Bobot" name="bobot_kriteria" required>
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