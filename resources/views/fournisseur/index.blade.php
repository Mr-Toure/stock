@extends('layouts.app')

@section('template_title')
    Fournisseur
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fournisseur') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Ajout d\'un fournisseur') }}
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
                                        <th>N°</th>

										<th>Photo</th>
										<th>Nom du fournisseur</th>
										<th>Ville</th>
										<th>Numéro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="{{ $fournisseur->picture !== null ? asset($fournisseur->picture) : asset('/public/img/logo.jpg') }}" width="40" alt="image">

                                                </div>
                                            </td>
											<td>{{ $fournisseur->name }}</td>
											<td>{{ $fournisseur->town }}</td>
											<td>{{ $fournisseur->phone }}</td>

                                            <td>
                                                <form action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('fournisseurs.edit',$fournisseur->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
