<!--  set data to edit modal -->
<script>
  $(document).on('click','.open-create-modal',function(){
      var url = "/alternatif/create";
      $('#modal-form-create').html("");

      $.get(url, function (data) {
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

          $('#modal-form-create').append(select_box_html);
          $('#CreateModal').modal('show');
      }) 
  });
</script>

<!-- create alternative -->
<div class="modal fade" tabindex="-1" role="dialog" id="CreateModal" aria-labelledby="CreateModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form action="/alternatif" method="POST">
    		<div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		<h4 class="modal-title">Tambah Alternatif</h4>
    		</div>
    
    		<div class="modal-body">
		    	<div class="form-group">
	        	<label for="nama">Nama ALternatif</label>
	        	<input type="text" class="form-control" id="nama" 
	        	placeholder="Nama alternatif" name="nama" required>
		    	</div>
		    	<div class="form-group">
	        	<label for="keterangan">Keterangan</label>
	        	<input type="text" class="form-control" id="keterangan" 
	        	placeholder="Keterangan" name="keterangan" >
		    	</div>
          <!-- loop select box according to criteria -->
          <div id="modal-form-create"></div>
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
