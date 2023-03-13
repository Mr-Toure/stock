<div class="box box-info padding-1">
    <div class="row">
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('Designation') }}
                {{ Form::text('name', $printer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group py-3">
                {{ Form::label('Numero de serie') }}
                {{ Form::text('reference', $printer->reference, ['class' => 'form-control' . ($errors->has('reference') ? ' is-invalid' : ''), 'placeholder' => 'Reference']) }}
                {!! $errors->first('reference', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('marque') }}
                {{ Form::text('marque', $printer->marque, ['class' => 'form-control' . ($errors->has('marque') ? ' is-invalid' : ''), 'placeholder' => 'Marque']) }}
                {!! $errors->first('marque', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group py-3">
                {{ Form::label('type d\'imprimante') }}
                {{ Form::text('type', $printer->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
                {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('Image de l\'imprimante') }}
                {{ Form::file('picture', ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
                {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('Agent propriètaire') }}
                {{ Form::select('agent_id', $agents, old('agent_id', $printer->agent_id), ['class' => 'form-control' . ($errors->has('agent_id') ? ' is-invalid' : ''), 'placeholder' => 'Choisir un agent']) }}
                {!! $errors->first('agent_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
    <div class="box-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
