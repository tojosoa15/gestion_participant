<!-- Modal -->
	<div class="modal fade" id="modal_delete_participant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="s">Suppression participant</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<input type="hidden" name="id_participant" id="id_participant" value="">
	      		<label>Voulez-vous vraiment supprimer ce participant?</label>
	      </div>
	      <div class="modal-footer">
	        	<button type="button" class="btn btn-success" onclick="deleteParticipant();">Oui</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
	      </div>
	    </div>
	  </div>
	</div>