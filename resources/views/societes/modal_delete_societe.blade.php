<!-- Modal -->
	<div class="modal fade" id="modal_delete_societe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="s">Suppression société</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<input type="hidden" name="id_societe" id="id_societe" value="">
	      		<label>Voulez-vous vraiment supprimer cette société?</label>
	      </div>
	      <div class="modal-footer">
	        	<button type="button" class="btn btn-success" onclick="deleteSociete();">Oui</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
	      </div>
	    </div>
	  </div>
	</div>