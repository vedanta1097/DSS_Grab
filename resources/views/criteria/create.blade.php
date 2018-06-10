<!-- create criteria -->
<div class="modal fade" tabindex="-1" role="dialog" id="CreateModal" aria-labelledby="CreateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/kriteria" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Kriteria</h4>
        </div>
    
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Kriteria</label>
            <input type="text" class="form-control" id="nama" 
            placeholder="Nama kriteria" name="nama" required>
          </div>
          <div class="form-group">
            <label for="atribut">Atribut</label>
            <select class="form-control" id="atribut" name="atribut">
              <option value="cost">Cost</option>
              <option value="benefit">Benefit</option>
            </select>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="text" class="form-control" id="bobot" 
            placeholder="Bobot" name="bobot" required>
          </div>
        </div>

        {{ csrf_field() }}

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

