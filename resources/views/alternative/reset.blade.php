<!-- show reset modal -->
<script>
  $(document).on('click','.open-reset-modal',function(){
      $('#resetModal').modal('show');
  });
</script>

<!-- reset alternative -->
<div class="modal fade" tabindex="-1" role="dialog" id="resetModal" aria-labelledby="resetModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="/alternatif/reset" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reset Alternatif</h4>
      </div>
  
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus semua data alternatif?</p>
      </div>
      
      {{ csrf_field() }}

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Reset</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal