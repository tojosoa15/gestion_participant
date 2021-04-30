<div class="row">
	<!-- <div class="col-lg-9">
		<h3>Nouveau participant</h3>
		<form data-toggle="validator" method="POST" id="form-participant-ajout" action="{{route('participants.add_participant')}}">
			{{csrf_field()}}
			<div class="form-group">
				<label class="control-label" for="title">Nom *:</label>
				<input type="text" name="nom_participant" class="form-control" data-error="Entrer le nom." required autocomplete="off" id="nom_participant" />
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group">
				<label class="control-label" for="title">Sociétés:</label>
				<select class="form-control border border-dark js-example-basic-multiple dropdown-select " name="societe[]" id="societe[]" multiple>
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
			<div class="form-group">
				<button type="submit" class="btn btn-success" id="submit-form-participant">Enregistrer</button>
				<button type="reset" class="btn btn-danger">Annuler</button>
			</div>
  		</form>
	</div> -->
	<div class="pull-right">
        <a href="#" onclick="formAddParticipant();"><button type="submit" class="btn btn-success">Nouveau participant</button></a>
        <a href="#" onclick="deletSelected();"><button type="submit" class="btn btn-danger">Suppression multiple</button></a>
    </div><br>
	<div class="col-lg-6">
		<h3>Liste des participants</h3>
	</div>
</div>
<table class="table table-bordered" id="list-participant" style="width: 100%;">

	<thead>

	    <tr>
	    	<th data-form-search="3" class="table-check-checkbox" >
                <center>
                    <div >
                        <input name="select_all"  value="-1" type="checkbox"/>
                    </div>
                </center>

            </th>
			<th>Nom</th>

			<th>Sociétés</th>
			<th>Email</th>
			<th>Statut</th>

			<th width="200px">Action</th>

	    </tr>

	</thead>

	<tbody>

	</tbody>

</table>
@include('participants.modal_edit_participant')
@include('participants.modal_delete_participant')
@include('participants.modal_add_participant')