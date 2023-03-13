@extends('layouts.app')

@section('template_title')
    Ssdirection
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sous Direction') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('ssdirections.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Libelle</th>
										<th>Direction</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ssdirections as $ssdirection)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $ssdirection->libelle }}</td>
											<td>{{ $ssdirection->direction->libelle }}</td>

                                            <td>
                                                <form action="{{ route('ssdirections.destroy',$ssdirection->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('ssdirections.show',$ssdirection->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('ssdirections.edit',$ssdirection->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
