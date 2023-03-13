@extends('layouts.besoin')

@section('template_title')
    Famille
@endsection

@section('content')
	@extends('layouts.besoin')

@section('template_title')
    Famille
@endsection

@section('content')
	<div class="second">
    <div class="connectName text-center"><h4>{{-- <?= $user['libelle'] ?> --}}</h4></div>
    <div class="main"> <br><br>
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Agent</th>
                    <th>Fourniture</th>
                    <th>Exprimé le</th>
                    <th>Demandée</th>
                    <th>Accordée</th>
                    <th>Etat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agents as $agent)
                    @foreach ($agent->bonreceptions->whereNotIn('status',100)->sortDesc() as $besoin)
                        <tr>
                            <td rowspan="{{ $besoin->fournitures->count() +1 }}">
                                {{ $besoin->agent->name . ' ' . $besoin->agent->surname }}
                                <br> <b><?= $besoin->post ?></b> <br>
                                @if($besoin->status == 100)
									<i class="text-secondary">Pas encore Validé par votre supérieur </i> <br>
                                @elseif($besoin->status == 105)
                                    <i class="text-secondary"> Envoyé pour traitement </i>
                                @elseif($besoin->status == 300)
                                    <i class="text-warning"> Demande mise en attente </i>
                                @elseif($besoin->status == 400)
                                    <i class="text-success"> Valider par le service Informatique </i>
                                @elseif($besoin->status == 500)
                                    <i class="text-danger"> Demande Refusé </i>
                                @endif
                            </td>
                        </tr>
                        @foreach ($besoin->fournitures as $fourniture)
                            <tr vertical-align: middle;>
                                <td>{{ $fourniture->designation }}</td>
                                <td>{{ $fourniture->pivot->created_at->format('d-m-Y H:m') }}</td>
                                <td>{{ $fourniture->pivot->qte }}</td>
                                <td><b>{{ $fourniture->pivot->sent ?? ''}}</b></td>
                                <td>
                                    @if($besoin->status == 200)
                                        <span class="text-success">Terminer</span>
                                    @elseif($besoin->status == 500)
                                        <span class="text-danger">Refuser</span>
                                    @elseif($besoin->status == 300)
                                        <span class="text-warning">Indisponible</span>
                                    @elseif($besoin->status == 400)
                                    {!! $fourniture->pivot->sent == 0 ? "<span class='text-warning'>Indisponible</span>" : "<span class='text-info'>Disponible</span>"!!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@stop