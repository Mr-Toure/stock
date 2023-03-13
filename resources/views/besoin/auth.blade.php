<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEMANDES DE CONSOMMABLES</title>
	<link rel="stylesheet" href="{{ asset('assets/besoins/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/besoins/css/select2.min.css') }}">
</head>
<body>
	@include('sweetalert::alert')
    <section id="main">
        <div id="middleBlue"></div>
		<div class="auth contens">
			<div class="logo">
				<img src="{{ asset('/img/mairie.png')}}" alt="Logo inci">
			</div>
			<div class="forms">
				<form method="POST" action="{{ route('besoins.verify') }}"  role="form" enctype="multipart/form-data">
				@csrf
					<div class="form-group">
						<label for="code" class="w-100 text-center mb-3">Entrez Votre Code Direction</label>
						<input type="password" name="code" class="form-control text-center" autofocus id="code" required placeholder="Code Direction" autocomplete="off">
					</div>
					<div class="form-group d-flex justify-content-end mt-4">
						<button class="btn btn-success mt-4">Suivant</button>
					</div>
				</form>
			</div>
		</div>
    </section>

	<script src="{{ asset('assets/besoins/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/besoins/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/besoins/js/all.min.js') }}"></script>
</body>
</html>