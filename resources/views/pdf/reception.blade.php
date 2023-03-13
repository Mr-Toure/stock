<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style>
		body{
			display: block;
			align-content: center;
			width: 100%;
			margin: auto;
			clear: both;
			backgound-image:url({{ public_path('/img/mairie.png') }})
		}
		.printType{
			text-align: center;
		}
		.dc{
			padding: 5px;
		}
		.table{
			border: 1px solid #ccc;
			border-collapse: collapse;
			width: 95%;
			text-align: center;
		}
		.table thead {
			background-color: lavender;
		}	

		.table th,
		.table td {
			border: 1px solid black;

			max-width: 300px;
			padding: 15px;
			line-height: 20px;
		}

		.bodyContent{
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.row{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.arm{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="printElements">
		<table width="100%">
				<tbody>
					<tr>
						<td align="left">
							<div class="img">
								<img src="{{ public_path('/img/logo.jpg') }}" alt="" width="300">
							</div>
						</td>
						<td align="right">
							<div text-align="center">
								<span>RÉPUBLIQUE DE CÔTE D'IVOIRE</span> <br/>
								<span style="margin-right:30px">Union - Discipline - Travail </span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		<div class="printHeader">
			<div class="rci">
				<h2 class="printType">
					<span><b><u>BON DE RECEPTION</u></b></span>
				</h2>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
		<div class="printBody">
			<div class="pez">
					<div class="bodyHeader">
						<table width="100%">
							<tbody>
								<tr>
									<td align="left"><div><b>Date demande: </b> {{ $besoin->newDate($besoin->date_recep)->format('d/m/Y H:m') }}</div></td>
									<td align="right"><div><b>N°</b> :  <span style="color:red">Impri_00_Nat_{{ $besoin->id }}</span></div></td>
								</tr>
							</tbody>
						</table>
						<table width="100%">
							<tbody>
								<tr>
									<td align="left"><div><b>Date de R&eacute;ception: </b> <?= date('d/m/Y H:m') ?></div></td>
									<td align="right"><div><b>Direction</b> : {{ $besoin->agent->service->ssdirection->direction->libelle }} </div></td>
								</tr>
							</tbody>
						</table>
						<div class="dc"><b>Nom : </b> {{ $besoin->agent->name }} {{ $besoin->agent->surname }}</div>
						<div class="dc"><b>Email : </b> {{ $besoin->agent->email }}</div>
						<br>
					</div>
					<div class="bodyContent"><br>
						<table class="table">
							<thead class="bg-secondary text-white">
								<tr>
									<th width="20">MARQUE</th>
									<th>DESIGNATION</th>
									<th width="25">Qte DEMANDE</th>
									<th width="25">Qte ACCORDE</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($besoin->fournitures as $fourniture)
									<tr>
										<td>{{ $fourniture->marque }}</td>
										<td align="left">{{ $fourniture->designation }}</td>
										<td>{{ $fourniture->pivot->qte }}</td>
										<td>{{ $fourniture->pivot->sent }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<br>
					<br>
					<br>
					<div class="bodyFooter">
						<b><u>Observation :</u></b>
					</div>
					<br>
					<br>
					<br>
					<br>
				</div>
			</div>
			<br>
			<br>
			<br>
		<div class="row">
			<table width="100%">
				<tbody>
					<tr>
						<td align="left"><div><u>Pour la direction</u></div></td>
						<td align="right"><div><u>Gestion Stock</u></div></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>