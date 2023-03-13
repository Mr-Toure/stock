@extends('layouts.app')

@section('template_title')
    Instock
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Instock') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('instocks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Fourniture Id</th>
										<th>Qte</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instocks as $instock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $instock->fourniture_id }}</td>
											<td>{{ $instock->qte }}</td>

                                            <td>
                                                <form action="{{ route('instocks.destroy',$instock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('instocks.show',$instock->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('instocks.edit',$instock->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $instocks->links() !!}
            </div>
        </div>
    </div>
@endsection
