@extends('layouts.app')

@section('template_title')
    Printer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Printer') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('printers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Ajouter une nouvelle imprimante') }}
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

										<th>Image</th>
										<th>Désignation</th>
										<th>numero de serie</th>
										<th>Marque</th>
										<th>Type</th>
										<th>Agent</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($printers as $printer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <div class="d-flex align-items-start">
                                                    <img class="me-2 rounded-circle" src="{{ asset($printer->picture ?? "")}}" width="40" alt="Generic placeholder image">

                                                </div>
                                            </td>
											<td>{{ $printer->name }}</td>
											<td>{{ $printer->reference }}</td>
											<td>{{ $printer->marque }}</td>
											<td>{{ $printer->type }}</td>
											<td><a href="{{ route('agents.show',$printer->agent->id) }}">{{ $printer->agent->name }} {{ $printer->agent->surname }}</a></td>

                                            <td>
                                                <form action="{{ route('printers.destroy',$printer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('printers.show',$printer->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('printers.edit',$printer->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
