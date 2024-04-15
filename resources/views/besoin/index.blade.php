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

                            <div class="float-right">
                                @if(isset($besoins))
                                    @if($besoins->whereIn('status',105)->count())
                                        <span>Besoin en attente : </span><span class="badge bg-warning"><b>{{ $besoins->whereIn('status',105)->count() }}</b></span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <h3>Besoins en cours <span class="badge bg-info">{{ $besoins->whereIn('status',[105, 300])->count() }}</span></h3>
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-hover table-centered mb-0">
                                <thead class="thead">
                                    <tr>
										<th>Type de besoin</th>
										<th>Exprimé par</th>
										<th>Exprimé le</th>
										<th>Direction</th>
                                        <th>Traiter</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($besoins->whereIn('status',[105, 300])->sortDesc() as $besoin)
                                        <tr {!! $besoin->status == 300 ? "class='bg-warning-lighten'" : "" !!}>

											<td>{{ $besoin->fournitures[0]->typefour->libelle ?? "" }}</td>
											<td>{{ $besoin->agent->name }} {{ $besoin->agent->surname }}</td>
											<td>{{ $besoin->created_at->format('d-m-Y H:m') }}</td>
											<td>{{ $besoin->agent->fonction->direction->initiale }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('besoin.show',$besoin->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <h3>Besoins traités <span class="badge bg-info">{{ $besoins->whereIn('status', [200, 400, 500])->count() }}</span></h3>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-hover table-centered mb-0">
                                <thead class="thead">
                                    <tr>
										<th>Type de besoin</th>
										<th>Exprimé par</th>
										<th>Exprimé le</th>
										<th>Direction</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($besoins->whereIn('status', [200, 400, 500])->sortDesc() as $besoin)
                                        <tr>

											<td>{{ $besoin->fournitures[0]->typefour->libelle }}</td>
											<td>{{ $besoin->agent->name }} {{ $besoin->agent->surname }}</td>
											<td>{{ $besoin->created_at->format('d-m-Y') }}</td>
											<td>{{ $besoin->agent->fonction->direction->initiale }}</td>
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
                                            <td>
                                                <a class="btn btn-sm btn-success " href="{{ route('besoin.show',$besoin->id) }}"><i class="fa fa-file-pdf"></i></a>
                                                {{-- <a class="btn btn-sm btn-success " href="{{ route('besoin.show',$besoin->id) }}"><i class="fa fa-fw fa-eye"></i></a> --}}
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
