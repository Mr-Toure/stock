<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Designation') }}
            {{ Form::text('libelle', $typefour->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Designation']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('famille') }}
            {{ Form::select('famille_id', $familles, old('famille_id', $typefour->famille_id), ['class' => 'form-control' . ($errors->has('famille_id') ? ' is-invalid' : ''), 'placeholder' => 'Choisir une Famille']) }}
            {!! $errors->first('famille_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
