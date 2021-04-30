<!-- Modal -->
	<div class="modal fade" id="modal_add_participant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="s">Nouveau participant</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	      	{{csrf_field()}}
			<div class="form-group">
				<label class="control-label" for="title">Nom *:</label>
				<input type="text" name="nom_participant" class="form-control" data-error="Entrer le nom." required autocomplete="off" id="nom_participant" />
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<label class="control-label" for="title">Sociétés:</label>
				<select class="form-control border border-dark js-example-basic-single dropdown-select" name="societe" id="societe" multiple="multiple">
                    <option value="0">Séléctionnez</option>
                    @foreach($societes as $societe)
                    	<option value="{{$societe->id_societe}}">{{$societe->name}}</option>
                   	@endforeach
                </select>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<label class="control-label" for="title">Email *:</label>
				<input type="email" name="email" class="form-control" data-error="Entrer un email valide." required autocomplete="off" id="email" />
				<div class="help-block with-errors"></div>
			</div>
	      </div>

	      <div class="modal-footer">
	        	<button type="button" class="btn btn-success" onclick="addParticipant();">Enregistrer</button>
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
	      </div>
	    </div>
	  </div>
	</div>