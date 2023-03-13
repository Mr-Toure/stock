@extends('layouts.app')

@section('template_title')
    Bonreception
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bonreception') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bonreceptions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Libelle</th>
										<th>Date Recep</th>
										<th>Status</th>
										<th>Type</th>
										<th>Sender</th>
										<th>Treatby</th>
										<th>Treated At</th>
										<th>Validated At</th>
										<th>Common</th>
										<th>Agent Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bonreceptions as $bonreception)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bonreception->libelle }}</td>
											<td>{{ $bonreception->date_recep }}</td>
											<td>{{ $bonreception->status }}</td>
											<td>{{ $bonreception->type }}</td>
											<td>{{ $bonreception->sender }}</td>
											<td>{{ $bonreception->treatBy }}</td>
											<td>{{ $bonreception->treated_at }}</td>
											<td>{{ $bonreception->validated_at }}</td>
											<td>{{ $bonreception->common }}</td>
											<td>{{ $bonreception->agent_id }}</td>

                                            <td>
                                                <form action="{{ route('bonreceptions.destroy',$bonreception->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bonreceptions.show',$bonreception->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bonreceptions.edit',$bonreception->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bonreceptions->links() !!}
            </div>
        </div>
    </div>
@endsection
