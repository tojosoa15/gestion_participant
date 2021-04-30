<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirmation compte participant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
<!--   <style type="text/css">
  	.pull-rigth{
  		float: left;
  	} 
  </style> -->
</head>
<body>
	<div class="container">
	   	<h4>Objet : Mail de confirmation</h4><br>
	  	<p>Madame, Monsieur</p><br>
	  	<p>Bonjour {{$nom}},</p><br><br>
		  <label>Votre mail est: {{$email}}</label><br><br>
      <p>Veuiller cliquer sur ce lien pour confirmer votre compte: <a href="{{route(('participants.validation', $email))}}">Activer</a>
    </p><br>
</body>
</html>