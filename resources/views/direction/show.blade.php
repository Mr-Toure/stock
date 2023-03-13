@extends('layouts.app')

@section('template_title')
    {{ $direction->name ?? 'Show Direction' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Direction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('directions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $direction->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Initiale:</strong>
                            {{ $direction->initiale }}
                        </div>
                        <div class="form-group">
                            <strong>Pass:</strong>
                            {{ $direction->pass }}
                        </div>
                        <div class="form-group">
                            <strong>Vpass:</strong>
                            {{ $direction->vpass }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
