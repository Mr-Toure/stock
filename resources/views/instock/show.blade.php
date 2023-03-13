@extends('layouts.app')

@section('template_title')
    {{ $instock->name ?? 'Show Instock' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Instock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('instocks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fourniture Id:</strong>
                            {{ $instock->fourniture_id }}
                        </div>
                        <div class="form-group">
                            <strong>Qte:</strong>
                            {{ $instock->qte }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
