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
                                <a href="{{ route('agents.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-plus"></i>
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
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

										<th>Photo</th>
										<th>Nom</th>
										<th>Prénom(s)</th>
										<th>Fonction</th>
										<th>Poste Bureau</th>
										<th>Direction</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="{{ $agent->picture ?? asset('/img/mairie.jpg')}}" width="40" alt="Generic placeholder image">
                                                </div>
                                            </td>
											<td>{{ $agent->name }}</td>
											<td>{{ $agent->surname }}</td>
											<td>{{ substr($agent->fonction->libelle, 0, 20) }}{{...}}</td>
											<td>{{ $agent->post }}</td>
											<td>{{ $agent->fonction->direction->initiale ?? '' }}</td>

                                            <td>
                                                <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('agents.show',$agent->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('agents.edit',$agent->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
