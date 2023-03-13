<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Designation de la famille') }}
            {{ Form::text('libelle', $famille->libelle, ['class' => 'form-control m-2' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Famile']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
