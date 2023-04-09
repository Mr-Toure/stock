<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group my-2">
                {{ Form::label('Nom') }}
                {{ Form::text('name', $agent->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nom']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group my-2">
                {{ Form::label('Prénom(s)') }}
                {{ Form::text('surname', $agent->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Prénom(s)']) }}
                {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group my-2">
                {{ Form::label('matricule') }}
                {{ Form::text('matricule', $agent->matricule, ['class' => 'form-control' . ($errors->has('matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule']) }}
                {!! $errors->first('matricule', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group my-2">
                {{ Form::label('email') }}
                {{ Form::text('email', $agent->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-6">
            <div class="form-group my-2">
                {{ Form::label('Post Telephonique') }}
                {{ Form::text('post', $agent->post, ['class' => 'form-control' . ($errors->has('post') ? ' is-invalid' : ''), 'placeholder' => 'ex: 444']) }}
                {!! $errors->first('post', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="d-flex align-items-start">
                @if ($agent->name)
                    <img class="me-2 rounded-circle" src="{{ asset($agent->picture)}}" width="50" alt="image">
                @endif
                <div class="form-group my-2">
                    {{ Form::label('picture') }}
                    {{ Form::file('picture', ['class' => 'form-file' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
                    {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group my-2">
                {{ Form::label('phone') }}
                {{ Form::text('phone', $agent->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group my-2">
                {{ Form::label('Service') }}
                {{ Form::select('ssdirection_id', $ssdirection, old('ssdirection_id', $agent->ssdirection_id), ['class' => 'form-select' . ($errors->has('ssdirection_id') ? ' is-invalid' : '') ,'placeholder' => 'Service']) }}
                {!! $errors->first('ssdirection_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
