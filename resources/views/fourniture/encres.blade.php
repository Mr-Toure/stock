@extends('layouts.app')

@section('template_title')
    Fourniture
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Fourniture') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('fournitures.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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

										<th>Picture</th>
										<th>Désignation</th>
										<th>Marque</th>
										<th>Qte Seuil</th>
										<th>Prix Unitaire</th>
										<th>Type fourniture</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fournitures as $fourniture)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="{{ asset($fourniture->picture) }}" width="40" alt="image">
                                                </div>
                                            </td>
											<td>{{ $fourniture->designation }}</td>
											<td>{{ $fourniture->marque }}</td>
											<td>{{ $fourniture->qte_seuil }}</td>
											<td>{{ $fourniture->c_moyen_achat }}</td>
											<td>{{ $fourniture->typefour->libelle }}</td>

                                            <td>
                                                <form action="{{ route('fournitures.destroy',$fourniture->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('fournitures.show',$fourniture->id) }}"><i class="mdi mdi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('fournitures.edit',$fourniture->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> </button>
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
