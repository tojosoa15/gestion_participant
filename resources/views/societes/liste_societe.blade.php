<div class="row">
	<div class="pull-right">
        <a href="#" onclick="formAddSociete();"><button type="submit" class="btn btn-success">Nouvelle société</button></a>
    </div><br>
	<div class="col-lg-6 pull-left">
		<h3>Liste des sociétés</h3>
	</div>
</div>
<table class="table table-bordered" id="list-societe">
	<thead>

	    <tr>

		<th>Nom</th>

		<!-- <th>Email</th> -->

		<th width="200px">Action</th>

	    </tr>

	</thead>

	<tbody>

	</tbody>

</table>
@include('societes.modal_edit_societe')
@include('societes.modal_delete_societe')
@include('societes.modal_add_societe')