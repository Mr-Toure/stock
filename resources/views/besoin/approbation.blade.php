@extends('layouts.app')

@section('template_title')
    Agent
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Agent') }}
                            </span>

                           {{--  <div class="float-right">
                                <a href="{{ route('agents.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-centered mb-0">
                                <thead class="thead">
                                    <tr>
                                        <th>Type de besoin</th>
                                        <th>Exprimé par</th>
                                        <th>Exprimé le</th>
                                        <th>Direction</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($besoins as $besoin)
                                        <tr class="main-row" data-besoin-id="{{ $besoin->id }}">
                                            <td>{{ $besoin->fournitures[0]->typefour->libelle }}</td>
                                            <td>{{ $besoin->agent->name }} {{ $besoin->agent->surname }}</td>
                                            <td>{{ $besoin->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $besoin->agent->fonction->direction->initiale }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="{{ route('besoins.terminated', $besoin->id) }}"><i class="fa fa-fw fa-check"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('besoins.canceled', $besoin->id) }}"><i class="fa fa-fw fa-cancel"></i></a>
                                                <button class="btn btn-sm btn-info toggle-details" type="button">Détails</button>
                                            </td>
                                        </tr>
                                        <tr class="details-row" style="display: none;">
                                            <td colspan="5">
                                                <div>
                                                    <strong class="bg-info text-white p-2">Détails de la commande :</strong>
                                                    <table class="table table-hover table-centered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Designation</th>
                                                                <th>Qte Demandée</th>
                                                                <th>Qte en stock</th>
                                                                <th>Qte Accordée</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($besoin->fournitures as $fourniture)
                                                                <tr>
                                                                    <td>{{ $fourniture->designation }}</td>
                                                                    <td>{{ $fourniture->pivot->qte }}</td>
                                                                    <td>{{ $fourniture->instock->qte ?? 0}}</td>
                                                                    <td>{{ $fourniture->pivot->sent ?? '' }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <script>
                                document.querySelectorAll('.toggle-details').forEach(button => {
                                    button.addEventListener('click', () => {
                                        const mainRow = button.closest('.main-row');
                                        const detailsRow = mainRow.nextElementSibling;
                            
                                        // Toggle the display of the details row
                                        if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
                                            detailsRow.style.display = 'table-row'; // Affiche la ligne de détails
                                        } else {
                                            detailsRow.style.display = 'none'; // Masque la ligne de détails
                                        }
                                    });
                                });
                            </script>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
