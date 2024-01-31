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
                                  {{ __('Ajouter') }}
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
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

										<th>Picture</th>
										<th>Désignation</th>
										<th>Marque</th>
										<th>Qte Seuil</th>
										<th>Qte en Stock</th>
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
                                                    @if($fourniture->typefour?->id == 5)
                                                        <img class="me-2 rounded-circle"  src="{{ file_exists(public_path($fourniture->picture)) ? asset($fourniture->picture) : asset('img/cart.jpg')  }}" width="40" alt="image">
                                                    @else
                                                        {{-- <img class="me-2 rounded-circle" src="{{ asset($fourniture->picture) }}" width="40" alt="image"> --}}
                                                        <img class="me-2 rounded-circle"  src="{{ file_exists(public_path($fourniture->picture)) ? asset($fourniture->picture) : asset('img/four.jpg')  }}" width="40" alt="image">
                                                    @endif
                                                </div>
                                            </td>
											<td>{{ $fourniture->designation }}</td>
											<td>{{ $fourniture->marque }}</td>
											<td>{{ $fourniture->qte_seuil }}</td>
											<td>{{ $fourniture->instock->qte ?? 0 }}</td>
											<td>{{ $fourniture->typefour?->libelle }}</td>

                                            <td>
                                                <form action="{{ route('fournitures.destroy',$fourniture->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-warning" href="{{ route('fournitures.edit',$fourniture->id) }}"><i class="mdi mdi-table-edit"></i></a>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('fournitures.show',$fourniture->id) }}"><i class="mdi mdi-eye"></i></a>
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
