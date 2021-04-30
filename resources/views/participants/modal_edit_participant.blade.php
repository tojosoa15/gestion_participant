<!-- Modal -->
	<div class="modal fade" id="modal_edit_participant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="s">Modification participant</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	      		<input type="hidden" name="id" id="participant-id" value="">
				<div class="form-group">
					<label class="control-label" for="title">Nom *:</label>
					<input type="text" name="nom_modal_participant" class="form-control" data-error="Entrer le nom." required autocomplete="off" id="nom_modal_participant" value="" />
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label class="control-label" for="title">Email *:</label>
					<input type="text" name="email_modal_participant" class="form-control" data-error="Entrer le nom." required autocomplete="off" id="email_modal_participant" value="" />
					<div class="help-block with-errors"></div>
				</div>
	      </div>

	      <div class="modal-footer">
	        	<button type="button" class="btn btn-success" onclick="editParticipant();">Enregistrer</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
	      </div>
	    </div>
	  </div>
	</div>