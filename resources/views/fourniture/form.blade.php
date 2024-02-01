<style>
    .form-group{
        margin: 15px;
    }
</style>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('designation') }}
                    {{ Form::text('designation', $fourniture->designation, [
                        'class' => 'form-control' . ($errors->has('designation') ? ' is-invalid' : ''),
                        'placeholder' => 'Designation',
                        'list' => 'fournitures-datalist'  // Add the 'list' attribute
                    ]) }}
                    {!! $errors->first('designation', '<div class="invalid-feedback">:message</div>') !!}

                    <datalist id="fournitures-datalist">
                        @foreach ($fournitures as $fourniture)
                            <option value="{{ $fourniture->designation }}">{{ $fourniture->designation }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('marque') }}
                    {{ Form::text('marque', $fourniture->marque, ['class' => 'form-control' . ($errors->has('marque') ? ' is-invalid' : ''), 'placeholder' => 'Marque']) }}
                    {!! $errors->first('marque', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {{ Form::label('reference') }}
                    {{ Form::text('reference', $fourniture->reference, ['class' => 'form-control' . ($errors->has('reference') ? ' is-invalid' : ''), 'placeholder' => 'Reference']) }}
                    {!! $errors->first('reference', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('caracteristique') }}
                    {{ Form::textarea('caracteristique', $fourniture->caracteristique, ['class' => 'form-control' . ($errors->has('caracteristique') ? ' is-invalid' : ''), 'placeholder' => 'Caracteristique']) }}
                    {!! $errors->first('caracteristique', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">
                        {{ Form::label('qte_seuil') }}
                        {{ Form::text('qte_seuil', $fourniture->qte_seuil, ['class' => 'form-control' . ($errors->has('qte_seuil') ? ' is-invalid' : ''), 'placeholder' => 'Qte Seuil']) }}
                        {!! $errors->first('qte_seuil', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('cout moyen d\'achat') }}
                        {{ Form::text('c_moyen_achat', $fourniture->c_moyen_achat, ['class' => 'form-control' . ($errors->has('c_moyen_achat') ? ' is-invalid' : ''), 'placeholder' => 'Prix Unitaire']) }}
                        {!! $errors->first('c_moyen_achat', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('picture') }}
                        {{ Form::file('picture', ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
                        {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('type fourniture') }}
                    {{ Form::select('typefour_id', $typefours, old('typefour_id', $fourniture->typefour_id), ['class' => 'form-select' . ($errors->has('typefour_id') ? ' is-invalid' : ''), 'placeholder' => 'Typefour Id']) }}
                    {!! $errors->first('typefour_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Lié à une imprimante') }}
                    {{ Form::select('printer', $printers, old('printer', $fourniture->printer), ['class' => 'form-select' . ($errors->has('printer') ? ' is-invalid' : ''), 'placeholder' => 'Choisir une imprimante']) }}
                    {!! $errors->first('printer', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer d-flex mt-4 justify-content-end">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
