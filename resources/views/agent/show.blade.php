@extends('layouts.app')

@section('template_title')
    {{ $agent->name ?? 'Show Agent' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <div class="float-left">
                            <span class="card-title">Show Agent</span>
                        </div> --}}
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('agents.index') }}"><--</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4 my-3">
                                        <div class="form-group">
                                            <strong>Nom:</strong>
                                            {{ $agent->name }}
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <div class="form-group">
                                            <strong>Prénom(s):</strong>
                                            {{ $agent->surname }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 my-3">
                                        <div class="form-group">
                                            <strong>Numero de téléphone:</strong>
                                            {{ $agent->phone }}
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <div class="form-group">
                                            <strong>Post Bureau:</strong>
                                            {{ $agent->post }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mt-3">
                                        <div class="form-group">
                                            <strong>Direction:</strong>
                                            {{ $agent->ssdirection->direction->libelle ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mt-3">
                                        <div class="form-group">
                                            <strong>Sous-Direction:</strong>
                                            {{ $agent->ssdirection->libelle ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                {{--  <div class="row">
                                    <div class="col-md-8 mt-3">
                                        <div class="form-group">
                                            <strong>Service:</strong>
                                            {{ $agent->service->libelle }}
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-4 my-3">
                                <div class="form-group">
                                    <img src="{{ asset($agent->picture) }}" class="image" width="150px" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @if ($agent->bonreceptions != null)
                    <div class="card">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">Les recentes demandes</h4>

                                    <p><b class="text-danger">{{  $agent->besoins != null ? $agent->besoins->count() : "" }}</b> besoins non traitée</p>

                                    <table class="table table-bordered border-primary table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Demandeurs</th>
                                                <th>Direction</th>
                                                <th>type de fourniture</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agent->bonreceptions as $besoin)
                                                <tr>
                                                    <td class="table-user">
                                                        <img src="{{ asset('img/user.jpg') }}" alt="table-user" class="me-2 rounded-circle" />
                                                        {{ $besoin->agent->name }} {{ $besoin->agent->surname }}
                                                    </td>
                                                    <td>{{ $besoin->agent->service->ssdirection->direction->initiale }}</td>
                                                    <td>{{ $besoin->fournitures->first()->typefour->libelle }}</td>
                                                    <td>
                                                        @if ($besoin->status == 200)
                                                            <span class="badge bg-success">Terminer</span>
                                                        @elseif ($besoin->status == 500)
                                                            <span class="badge bg-danger">Refuser</span>
                                                        @elseif ($besoin->status == 400)
                                                            <span class="badge bg-info">Approuver</span>
                                                        @else
                                                            <span class="badge bg-info">Approuver</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $besoin->created_at->format('d-m-Y H:m') }}</td>
                                                    <td class="table-action text-center">
                                                        <a class="btn btn-sm btn-info " href="{{ route('besoin.show',$besoin->id) }}"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table> <!-- end table-responsive-->
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
