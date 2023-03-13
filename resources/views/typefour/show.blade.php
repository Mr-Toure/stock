@extends('layouts.app')

@section('template_title')
    {{ $typefour->name ?? 'Show Typefour' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Typefour</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('typefours.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $typefour->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Famille Id:</strong>
                            {{ $typefour->famille_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
