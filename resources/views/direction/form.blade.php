<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('libelle') }}
                {{ Form::text('libelle', $direction->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
                {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group py-3">
                {{ Form::label('initiale') }}
                {{ Form::text('initiale', $direction->initiale, ['class' => 'form-control' . ($errors->has('initiale') ? ' is-invalid' : ''), 'placeholder' => 'Initiale']) }}
                {!! $errors->first('initiale', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('pass') }}
                {{ Form::text('pass', $direction->pass, ['class' => 'form-control' . ($errors->has('pass') ? ' is-invalid' : ''), 'placeholder' => 'Pass']) }}
                {!! $errors->first('pass', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group py-3">
                {{ Form::label('vpass') }}
                {{ Form::text('vpass', $direction->vpass, ['class' => 'form-control' . ($errors->has('vpass') ? ' is-invalid' : ''), 'placeholder' => 'Vpass']) }}
                {!! $errors->first('vpass', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="box-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
