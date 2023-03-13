@extends('layouts.app')

@section('template_title')
    Update Printer
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Mettre les informations de l'imprimante</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('printers.update', $printer->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('printer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
