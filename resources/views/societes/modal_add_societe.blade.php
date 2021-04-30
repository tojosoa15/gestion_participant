<!-- Modal -->
	<div class="modal fade" id="modal_add_societe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="s">Nouvelle société</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	      	{{csrf_field()}}
			<div class="form-group">
				<label class="control-label" for="title">Nom *:</label>
				<input type="text" name="nom" class="form-control" data-error="Entrer le nom." required autocomplete="off" id="nom" />
				<div class="help-block with-errors"></div>
			</div>
	      </div>

	      <div class="modal-footer">
	        	<button type="button" class="btn btn-success" onclick="addSociete();">Enregistrer</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
	      </div>
	    </div>
	  </div>
	</div>