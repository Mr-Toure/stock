@extends('layouts.app')

@section('template_title')
    {{ $fourniture->name ?? 'Show Fourniture' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fournitures.index') }}">Retour</a>
                        </div>
                        <div class="float-left">
                            <span class="card-title">
                                <h3>{{$fourniture->designation}}</h3>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between"> 
                            <div class="form-group">
                                <strong>Marque:</strong>
                                {{ $fourniture->marque }}
                            </div>
                            <div class="form-group">
                                <strong>Caracteristique : </strong>
                                {{ $fourniture->caracteristique }}
                            </div>
                            <div class="form-group">
                                <strong>Quantité minimum : </strong>
                                {{ $fourniture->qte_seuil }}
                            </div>
                            <div class="form-group">
                                <strong>Quantité en Stock : </strong>
                                {{ $fourniture->qte_seuil }}
                            </div>
                            <div class="form-group">
                                <strong>Type Fourniture</strong>
                                {{ $fourniture->typefour->libelle }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Historique des sorties</h3>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead class="thead">
                                <th>Nom Agent</th>
                                <th>Date</th>
                                <th>Etat</th>
                                <th>traiter par</th>
                                <th>Quantité</th>
                            </thead>
                            <tbody>
                                @foreach($fourniture->bonreceptions as $besoin)
                                    <tr>
                                        <td>{{ $besoin->agent->name }} {{ $besoin->agent->surname}}</td>
                                        <td>{{ $besoin->created_at }}</td>
                                        <td>
                                            @if($besoin->treatBy == 500)
                                                <span class="badge badge-success"></span>
                                            @endif
                                            @if($besoin->treatBy == 200)
                                                <span></span>
                                            @endif
                                        </td>
                                        <td>{{$besoin->treatBy ?? 0}}</td>
                                        <td>{{$besoin->pivot->sent ?? 0}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <h3>Historique des Entrées</h3>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead class="thead">
                                <th>Nom Agent</th>
                                <th>Date</th>
                                <th>Quantité</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
