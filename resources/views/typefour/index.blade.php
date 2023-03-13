@extends('layouts.app')

@section('template_title')
    Typefour
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Typefour') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('typefours.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>

										<th>Désignation de type</th>
										<th>Famille</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typefours as $typefour)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $typefour->libelle }}</td>
											<td>{{ $typefour->famille->libelle ?? "" }}</td>

                                            <td>
                                                <form action="{{ route('typefours.destroy',$typefour->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('typefours.edit',$typefour->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $typefours->links() !!}
            </div>
        </div>
    </div>
@endsection
