<!DOCTYPE html>

<html>

<head>

	<title>Gestion des utilisateurs</title>

	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
	<link rel="stylesheet" href="{{asset('css/select2/dist/css/select2.min.css')}}" />
	<link rel="stylesheet" href="{{asset('bootstrap-selectpicker/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-selectpicker/css/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

	<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.twbsPagination.min.js')}}"></script>
	<script src="{{asset('js/validator.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('css/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('css/datatables.net/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('css/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{asset('css/datatables.net/js/dataTables.checkboxes.js')}}"></script>
	<script src="{{asset('css/datatables.net/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('bootstrap-selectpicker/js/select2.min.js')}}"></script>
	<script src="{{asset('bootstrap-selectpicker/js/select2.js')}}"></script>
	<script src="{{asset('js/scriptAjax.js')}}"></script>
    <script src="{{asset('js/jquery-confirm.min.js')}}"></script>
    <!-- <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/bootstrap-select.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/bootstrap.js')}}"></script> -->
    <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
	@include('script_home')
</head>

<body>
	<div class="container">
		
		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="">
		            <h1>Gestion des participants</h1>
		            <hr>
		        </div>
		    </div>
		</div>
		<!-- Tabs navs -->

		<ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
		  <li class="nav-item active" role="presentation" >
		    <a id="ex1-tab-1" data-mdb-toggle="tab" href="#tabs-societe" role="tab"aria-controls="tabs-societe" aria-selected="true">Gerer société</a>
		  </li>
		  <li class="nav-item" role="presentation">
		    <a id="tab-participant" data-mdb-toggle="tab" href="#tabs-participant" role="tab" aria-controls="tabs-participant" aria-selected="false">Gerer participant</a>
		  </li>
		</ul>
		<!-- Tabs navs -->

		<!-- Tabs content -->
		<div class="tab-content" id="ex1-content">
		  <div class="tab-pane fade show active" id="tabs-societe" role="tabpanel" aria-labelledby="tab-societe">
		    	@include('societes.liste_societe')
		  </div>
		  <div class="tab-pane fade" id="tabs-participant" role="tabpanel" aria-labelledby="tab-participant">
		    	@include('participants.liste_participant')
		  </div>
		</div>
		<!-- Tabs content -->
	</div>

</body>

</html>