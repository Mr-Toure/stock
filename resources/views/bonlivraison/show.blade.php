@extends('layouts.app')

@section('template_title')
    {{ $bonlivraison->name ?? 'Show Bonlivraison' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bonlivraison</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bonlivraisons.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $bonlivraison->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Date Livraison</strong>
                            {{ $bonlivraison->date_liv }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $bonlivraison->status }}
                        </div>
                        <div class="form-group">
                            <strong>Commande</strong>
                            {{ $bonlivraison->commande->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>User</strong>
                            {{ $bonlivraison->user->name }}
                        </div>
                        <table class="table table-hover table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Designation</th>
                                    <th>Quantité commandé</th>
                                    <th>Quantité livré</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bonlivraison->fournitures as $fourniture)
                                    @foreach ($fourniture->commandes as $commande)
                                        <tr>
                                            <td><span class="badge bg-primary"> {{  $fourniture->id  }}</span></td>
                                            <td>{{ $fourniture->designation }}</td>
                                                <td>{{ $commande->pivot->qte }}</td>
                                                <td>{{ $fourniture->pivot->qte }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
