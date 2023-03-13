@extends('layouts.app')

@section('template_title')
    {{ $fournisseur->name ?? 'Show Fournisseur' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Fournisseur</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('fournisseurs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $fournisseur->name }}
                        </div>
                        <div class="form-group">
                            <strong>Town:</strong>
                            {{ $fournisseur->town }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $fournisseur->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $fournisseur->status }}
                        </div>
                        <div class="form-group">
                            <strong>Picture:</strong>
                            {{ $fournisseur->picture }}
                        </div>
                        <div class="form-group">
                            <strong>Typefour Id:</strong>
                            {{ $fournisseur->typefour_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
