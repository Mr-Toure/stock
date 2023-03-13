@extends('layouts.app')

@section('template_title')
    Commande
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Commande') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('commandes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="mdi mdi-plus"></i>{{ __('Nouvelle Demande') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Libelle</th>
										<th>Date Commande</th>
										<th>Fournisseur</th>
										<th>User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commandes as $commande)
                                        <tr class="{{ $commande->status ? "table-success":""  }}">
                                            <td>{{ ++$i }}</td>

											<td>{{ $commande->libelle }}</td>
											<td>{{ $commande->date_com }}</td>
											<td>{{ $commande->fournisseur->name }}</td>
											<td>{{ $commande->user->name }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('commandes.show',$commande->id) }}"><i class="mdi mdi-eye-circle"></i> Voir</a>
                                                @if(!$commande->status)
                                                    <a class="btn btn-sm btn-warning " href="{{ route('commandes.livraison',$commande) }}"><i class="mdi mdi-hand-heart"></i> livrer</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $commandes->links() !!}
            </div>
        </div>
    </div>
@endsection
