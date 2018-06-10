<!--  set data to edit modal -->
<script>
  $(document).on('click','.open-edit-modal',function(){
      var url = "/alternatif";
      var id  = $(this).val();
      $('#modal-form-edit').html("");

      $.get(url + '/' + id, function (data) {
          //data[2] = selected alternative data (check alternativeController @ edit)
          $('#edit-data-form').attr('action', '/alternatif/' + data[2].id);
          $('#nama-alternatif').val(data[2].nama);
          $('#keterangan-alternatif').val(data[2].keterangan);

          //create select box for each criteria
          let select_box_html = '';
          $.each(data[0], function(i, criteria) { 
              select_box_html += 
                  '<div class="form-group">'+
                      '<label>'+ criteria.nama +'</label>'+
                      '<select class="form-control" name="criteria[]" id="criteria'+ i +'">';

              $.each(data[1], function(j, crips) { //generate option for each select
                  if (criteria.id == crips.criteria_id) {
                      select_box_html += '<option value="'+ crips.id +'">'+ crips.keterangan +'</option>'
                  }
              });
              select_box_html += '</select></div>';
          });
          
          $('#modal-form-edit').append(select_box_html);
          
          //set value of each select box 
          $.each(data[0], function(k, criteria) {
              let select_box_id = "#criteria" + k;
              $.each(data[3], function(l, crips) {
                  if (criteria.id == crips.criteria_id) {
                      $(select_box_id).val(crips.crips_id);
                  }
              });
          });

          $('#EditModal').modal('show');
      }) 
  });
</script>

<!-- edit alternative -->
<div class="modal fade" tabindex="-1" role="dialog" id="EditModal" aria-labelledby="EditModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="POST" id="edit-data-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Alternatif</h4>
        </div>
    
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama ALternatif</label>
            <input type="text" class="form-control" id="nama-alternatif" 
            placeholder="Nama alternatif" name="nama" value="" required>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan-alternatif" 
            placeholder="Keterangan" name="keterangan" value="">
          </div>
          <!-- loop select box according to criteria -->
          <div id="modal-form-edit"></div>
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