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
                                        <tr>

											<td>{{ $besoin->fournitures[0]->typefour->libelle }}</td>
											<td>{{ $besoin->agent->name }} {{ $besoin->agent->surname }}</td>
											<td>{{ $besoin->created_at->format('d-m-Y') }}</td>
											<td>{{ $besoin->agent->service->ssdirection->direction->initiale }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-success " href="{{ route('besoins.terminated',$besoin->id) }}"><i class="fa fa-fw fa-check"></i></a>
                                                <a class="btn btn-sm btn-danger " href="{{ route('besoins.canceled',$besoin->id) }}"><i class="fa fa-fw fa-cancel"></i></a>
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
