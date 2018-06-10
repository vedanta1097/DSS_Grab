<!-- create criteria -->
<div class="modal fade" tabindex="-1" role="dialog" id="CreateModal" aria-labelledby="CreateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/crips" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Crips</h4>
        </div>
    
        <div class="modal-body">
          <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <select class="form-control" id="kriteria" name="kriteria">
              @foreach($criterias as $cri)
              <option value="{{ $cri->id }}">{{ $cri->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" 
            placeholder="keterangan crips" name="keterangan" required>
          </div>
          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="text" class="form-control" id="nilai" 
            placeholder="Nilai crips" name="nilai" required>
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