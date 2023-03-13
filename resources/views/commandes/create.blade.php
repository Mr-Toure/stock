@extends('layouts.app')

@section('template_title')
    Create Commande
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Commande</span>
                    </div>
                    <div class="card-body">
                        <div id="famille" class="container d-flex justify-content-center" style="min-width:720px!important">
                            <div class="col-12 {{ $display_step1}}">
                                <form method="POST" name="step1" action="{{ route('commandes.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-11 col-offset-2">
                                        <div class="card mt-3">
                                            <div class="card-header font-weight-bold"><b>Etape 1 :</b> choix du type de commande</div>
                                            <div class="card-body p-4 step">
                                                <div class="row justify-content-between px-3 text-center" style="justify-content:center !important">
                                                    <div class="form-group">
                                                        {{ Form::select('famille_id', $familles, null, ['class' => 'form-select' . ($errors->has('famille_id') ? ' is-invalid' : ''), 'placeholder' => 'Famille de la commande']) }}
                                                        {!! $errors->first('famille_id', '<div class="invalid-feedback">:message</div>') !!}
                                                    </div>
                                                    <input type="hidden" name="step" value="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="fournisseur" class="col-11 col-offset-2">
                                        <div class="card mt-3">
                                            <div class="card-header font-weight-bold"><b>Etape 2 :</b> choix du Fournisseur</div>
                                            <div class="card-body p-4 step">
                                                <div class="row justify-content-between px-3 text-center" style="justify-content:center !important">
                                                    <div class="form-group">
                                                        {{ Form::select('fournisseur_id', $fournisseurs, null, ['class' => 'form-select' . ($errors->has('fournisseur_id') ? ' is-invalid' : ''), 'placeholder' => 'Fournisseur de la commande']) }}
                                                        {!! $errors->first('fournisseur_id', '<div class="invalid-feedback">:message</div>') !!}
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                            <button class="action next btn btn-sm btn-outline-secondary float-end">Soumettre</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="commande" class="col-11 col-offset-2 {{ $display_step2}}">
                                <form method="POST" name="step1" action="{{ route('commandes.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mt-3">
                                        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                                            <div class="text-info"> <b>Etape 3 :</b> Edition de la commande</div>
                                            <div class="add-btn">
                                                <a  id="add" class="btn btn-outline-primary"><i class="mdi mdi-plus-box"></i></a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="step" value="2">
                                        <div class="card-body p-4 step">
                                            <div id="items" class="row justify-content-between px-3 text-center" style="justify-content:center !important">

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                        <button class="action next btn btn-sm btn-outline-secondary float-end">Soumettre</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            //when the Add Field button is clicked
            var i = 1;
            $("#add").click(function(e) {
                i++;
                //const id = '#fourniture_id_'+i;
                $('#fourniture_id_'+i).select2()
                $("#items").append(
                `
                <div id="items_${i}" class="row justify-content-between px-3 text-center my-2" style="justify-content:center !important">
                    <div class="col-md-8">
                        <select name="fourniture_id[]" id="fourniture_id_${i}" class="form-select ($errors->has('fourniture_id_${i}') ? ' is-invalid' : '')">
                            <option selected disabled>Faire un choix ...</option>
                            @foreach ($fours as $four)
                                <option value="{{ $four->id }}">{{ $four->designation }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('fourniture_id_${i}', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {{ Form::number('qte[]', null, ['class' => 'form-control' . ($errors->has('qte') ? ' is-invalid' : ''), 'placeholder' => 'Qte', 'required'=>'required', 'min'=>'1']) }}
                            {!! $errors->first('qte', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a onClick="$('#items_${i}').remove()" class="delete btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i></a>
                    </div>
                </div>
                `);
                $('#fourniture_id_'+i).select2();
            });
        });

    </script>
@endsection

