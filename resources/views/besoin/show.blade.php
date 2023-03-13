@extends('layouts.app')

@section('template_title')
    {{ $besoin->libelle ?? 'Show Commande' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        <div class="float-left">
                            <a class="btn btn-secondary" href="{{ route('besoin.index') }}"> Retour</a>
                        </div>
                        <div class="float-right">
                            @if( $besoin->status == 400 || $besoin->status == 200)
                                <a href="{{ route('besoins.pdf', $besoin->id) }}" class="btn btn-danger">Imprimer le bon du besoin</a>
                            @else
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#traite_btn">Traiter le besoin</button>
                                @if ($besoin->status != 300)
                                    <a href="{{ route('besoins.await', $besoin->id) }}" class="btn btn-warning">Mettre en Attente</a>
                                @endif
                            @endif

                        </div>

                    </div>
                    {{-- <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                    </div> --}}
                    <div class="card-body">
						<div class="form-group">
                            <strong>Nom & Prénom(s)</strong>
                            {{ $besoin->agent->name}} {{ $besoin->agent->surname}}
                        </div>
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $besoin->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Date expression besoin:</strong>
                            {{ $besoin->created_at->format('d-m-Y H:m:s') }}
                        </div>
                        <div class="form-group">
                            <strong>Service</strong>
                            {{ $besoin->agent->service->libelle }}
                        </div>
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>MARQUE</th>
                                    <th>Designation</th>
                                    <th>Qte Demandée</th>
                                    <th>Qte en stock</th>
                                    <th>Qte Accordée</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($besoin->fournitures as $fourniture)
                                    <tr>
                                        <td>{{ $fourniture->marque }}</td>
                                        <td>{{ $fourniture->designation }}</td>
                                        <td>{{ $fourniture->pivot->qte }}</td>
                                        <td>{{ $fourniture->instock->qte ?? 0}}</td>
                                        <td>{{ $fourniture->pivot->sent ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="traite_btn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"  data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Traitement du besoin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form method="post" action="{{ route('besoins.sender',$besoin->id) }}">
                    <div class="modal-body">
                        <table class="table table-bordered border-primary table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>MARQUE</th>
                                    <th>DESIGNATION</th>
                                    <th>QTE DEMANDE</th>
                                    <th>QTE EN STOCK</th>
                                    <th>QTE A ACCORDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="besoin" value="{{ $besoin->id }}">
                                    @foreach ($besoin->fournitures as $fourniture)
                                        <tr>
                                            <td>{{ $fourniture->marque }}</td>
                                            <td>{{ $fourniture->designation }}</td>
                                            <td>{{ $fourniture->pivot->qte }}</td>
                                            <td
                                            @if (isset($fourniture->instock->qte))
                                                @if($fourniture->instock->qte == 0 )
                                                    class="bg-danger"
                                                @endif
                                            @else
                                                class="bg-danger"
                                            @endif
                                            >{{ $fourniture->instock->qte ?? 0}}</td>
                                            <td>
                                                <input
                                                    class="form-control"
                                                    type="number"
                                                    value="{{ $fourniture->pivot->qte }}"
                                                    name="qte_send[]"
                                                    min="0"
                                                    max="{{ $fourniture->pivot->qte}}"
                                                    @if (isset($fourniture->instock->qte))
                                                        @if($fourniture->instock->qte == 0 )
                                                            disabled
                                                            hidden
                                                        @endif
                                                    @else
                                                        disabled
                                                        hidden
                                                    @endif
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
