@extends('layouts.app')

@section('template_title')
    Bonlivraison
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bonlivraison') }}
                            </span>

                             {{-- <div class="float-right">
                                <a href="{{ route('bonlivraisons.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Libelle</th>
										<th>Date Liv</th>
										<th>Status</th>
										<th>Commande Id</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bonlivraisons as $bonlivraison)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $bonlivraison->libelle }}</td>
											<td>{{ $bonlivraison->date_liv }}</td>
											<td>{{ $bonlivraison->status ? 'livré':'non-livré' }}</td>
											<td>{{ $bonlivraison->commande->libelle }}</td>
											<td>{{ $bonlivraison->user->name }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('bonlivraisons.show', $bonlivraison->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bonlivraisons->links() !!}
            </div>
        </div>
    </div>
@endsection
