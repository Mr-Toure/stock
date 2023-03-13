@extends('layouts.app')

@section('template_title')
    Update Commande
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Faire une livraison</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('commandes.update', $commande) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @foreach ($commande->fournitures as $fourniture)
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <span class="form-control mr-lg-2">{{ $fourniture->designation }}</span>
                                </div>
                                <div class="col-md-3 my-2">
                                    <span class="form-control col-6 mr-lg-2">{{ $fourniture->pivot->qte }}</span>
                                </div>
                                <div class="col-md-3 my-2">
                                    <input type="number" class="form-control col-2 mr-lg-2" name="liv_qte[]" value="{{ $fourniture->pivot->qte }}" placeholder="Qte dmd" required="required">
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary float-end">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
