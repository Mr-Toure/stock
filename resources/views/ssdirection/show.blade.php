@extends('layouts.app')

@section('template_title')
    {{ $ssdirection->name ?? 'Show Ssdirection' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ssdirection</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ssdirections.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $ssdirection->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Direction Id:</strong>
                            {{ $ssdirection->direction_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
