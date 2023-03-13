@extends('layouts.app')

@section('template_title')
    {{ $printer->name ?? 'Show Printer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Printer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('printers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $printer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Reference:</strong>
                            {{ $printer->reference }}
                        </div>
                        <div class="form-group">
                            <strong>Marque:</strong>
                            {{ $printer->marque }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $printer->type }}
                        </div>
                        <div class="form-group">
                            <strong>Picture:</strong>
                            {{ $printer->picture }}
                        </div>
                        <div class="form-group">
                            <strong>Agent Id:</strong>
                            {{ $printer->agent_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
