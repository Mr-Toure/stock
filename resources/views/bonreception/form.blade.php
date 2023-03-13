<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $bonreception->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_recep') }}
            {{ Form::text('date_recep', $bonreception->date_recep, ['class' => 'form-control' . ($errors->has('date_recep') ? ' is-invalid' : ''), 'placeholder' => 'Date Recep']) }}
            {!! $errors->first('date_recep', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $bonreception->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $bonreception->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sender') }}
            {{ Form::text('sender', $bonreception->sender, ['class' => 'form-control' . ($errors->has('sender') ? ' is-invalid' : ''), 'placeholder' => 'Sender']) }}
            {!! $errors->first('sender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('treatBy') }}
            {{ Form::text('treatBy', $bonreception->treatBy, ['class' => 'form-control' . ($errors->has('treatBy') ? ' is-invalid' : ''), 'placeholder' => 'Treatby']) }}
            {!! $errors->first('treatBy', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('treated_at') }}
            {{ Form::text('treated_at', $bonreception->treated_at, ['class' => 'form-control' . ($errors->has('treated_at') ? ' is-invalid' : ''), 'placeholder' => 'Treated At']) }}
            {!! $errors->first('treated_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('validated_at') }}
            {{ Form::text('validated_at', $bonreception->validated_at, ['class' => 'form-control' . ($errors->has('validated_at') ? ' is-invalid' : ''), 'placeholder' => 'Validated At']) }}
            {!! $errors->first('validated_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('common') }}
            {{ Form::text('common', $bonreception->common, ['class' => 'form-control' . ($errors->has('common') ? ' is-invalid' : ''), 'placeholder' => 'Common']) }}
            {!! $errors->first('common', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('agent_id') }}
            {{ Form::text('agent_id', $bonreception->agent_id, ['class' => 'form-control' . ($errors->has('agent_id') ? ' is-invalid' : ''), 'placeholder' => 'Agent Id']) }}
            {!! $errors->first('agent_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>