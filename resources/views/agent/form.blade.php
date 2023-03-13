<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('name') }}
                {{ Form::text('name', $agent->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('surname') }}
                {{ Form::text('surname', $agent->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Surname']) }}
                {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('matricule') }}
                {{ Form::text('matricule', $agent->matricule, ['class' => 'form-control' . ($errors->has('matricule') ? ' is-invalid' : ''), 'placeholder' => 'Matricule']) }}
                {!! $errors->first('matricule', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('email', $agent->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('post') }}
                {{ Form::text('post', $agent->post, ['class' => 'form-control' . ($errors->has('post') ? ' is-invalid' : ''), 'placeholder' => 'Post']) }}
                {!! $errors->first('post', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="d-flex align-items-start">
                @if ($agent->name)
                    <img class="me-2 rounded-circle" src="{{ asset($agent->picture)}}" width="50" alt="image">
                @endif
                <div class="form-group">
                    {{ Form::label('picture') }}
                    {{ Form::file('picture', ['class' => 'form-file' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
                    {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('phone') }}
                {{ Form::text('phone', $agent->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('service_id') }}
                {{ Form::select('service_id', $services, old('service_id', $agent->service_id), ['class' => 'form-select' . ($errors->has('service_id') ? ' is-invalid' : '') ,'placeholder' => 'Service Id']) }}
                {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
