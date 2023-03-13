@extends('layouts.app')

@section('template_title')
    {{ $commande->name ?? 'Show Commande' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Commande</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('commandes.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $commande->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Date Com:</strong>
                            {{ $commande->date_com }}
                        </div>
                        <div class="form-group">
                            <strong>Fournisseur Id:</strong>
                            {{ $commande->fournisseur->name }}
                        </div>
                        <div class="form-group">
                            <strong>User:</strong>
                            {{ $commande->user->name}}
                        </div>
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Designation</th>
                                    <th>Quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande->fournitures as $fourniture)
                                    <tr>
                                        <td><span class="badge bg-primary"> {{  $fourniture->id  }}</span></td>
                                        <td>{{ $fourniture->designation }}</td>
                                        <td>{{ $fourniture->pivot->qte }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
