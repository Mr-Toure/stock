@extends('layouts.app')

@section('template_title')
    {{ $bonreception->name ?? 'Show Bonreception' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Bonreception</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('bonreceptions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Libelle:</strong>
                            {{ $bonreception->libelle }}
                        </div>
                        <div class="form-group">
                            <strong>Date Recep:</strong>
                            {{ $bonreception->date_recep }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $bonreception->status }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $bonreception->type }}
                        </div>
                        <div class="form-group">
                            <strong>Sender:</strong>
                            {{ $bonreception->sender }}
                        </div>
                        <div class="form-group">
                            <strong>Treatby:</strong>
                            {{ $bonreception->treatBy }}
                        </div>
                        <div class="form-group">
                            <strong>Treated At:</strong>
                            {{ $bonreception->treated_at }}
                        </div>
                        <div class="form-group">
                            <strong>Validated At:</strong>
                            {{ $bonreception->validated_at }}
                        </div>
                        <div class="form-group">
                            <strong>Common:</strong>
                            {{ $bonreception->common }}
                        </div>
                        <div class="form-group">
                            <strong>Agent Id:</strong>
                            {{ $bonreception->agent_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
