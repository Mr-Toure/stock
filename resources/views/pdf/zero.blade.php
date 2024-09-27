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
								<img src="{{ public_path('/img/mairie.jpg') }}" alt="" width="100">
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
					<span><b><u>Liste des fournitures Informatique</u></b></span>
				</h2>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
		<div class="printBody">
			<div class="pez">
					<div class="bodyContent"><br>
						<table class="table">
							<thead class="bg-secondary text-white">
								<tr>
									<th width="20">MARQUE</th>
									<th>DESIGNATION</th>
									<th width="25">Qte stock</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($fournitures as $fourniture)
                                    @if($fourniture->instock !== null and $fourniture->instock->qte === 0)
                                        <tr>
                                            <td>{{ $fourniture->marque }}</td>
                                            <td align="left">{{ $fourniture->designation }}</td>
                                            <td>
                                                @if($fourniture->instock !== null and $fourniture->instock->qte > 0)
                                                    {{ $fourniture->instock->qte ?? 0 }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
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
						<td align="right"><div><u>Service Informatique</u></div></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>  