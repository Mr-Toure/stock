<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('libelle') }}
                {{ Form::text('libelle', $ssdirection->libelle, ['class' => 'form-control mt-2' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
                {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('Initulé de la direction') }}
                {{ Form::select('direction_id', $directions, old('direction_id', $ssdirection->direction_id), ['class' => 'form-control mt-2' . ($errors->has('direction_id') ? ' is-invalid' : ''), 'placeholder' => 'Choix de la Direction']) }}
                {!! $errors->first('direction_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


    </div>
    <div class="box-footer d-flex justify-content-end py-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
