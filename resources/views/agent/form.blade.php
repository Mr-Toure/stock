<style>
    .form-group{
        margin: 10px;
    }
</style>
<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('Nom') }}
                {{ Form::text('name', $agent->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Toure']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Prénom(s)') }}
                {{ Form::text('surname', $agent->surname, ['class' => 'form-control' . ($errors->has('surname') ? ' is-invalid' : ''), 'placeholder' => 'Simplice']) }}
                {!! $errors->first('surname', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                {{ Form::label('matricule') }}
                {{ Form::text('matricule', $agent->matricule, ['class' => 'form-control' . ($errors->has('matricule') ? ' is-invalid' : ''), 'placeholder' => '0785-H']) }}
                {!! $errors->first('matricule', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('email') }}
                {{ Form::text('email', $agent->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'x.x@port-bouet.ci']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('Numéro de Poste') }}
                {{ Form::text('post', $agent->post, ['class' => 'form-control' . ($errors->has('post') ? ' is-invalid' : ''), 'placeholder' => '457']) }}
                {!! $errors->first('post', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="d-flex align-items-start">
                @if ($agent->name)
                    <img class="me-2 rounded-circle" src="{{ asset($agent->picture)}}" width="50" alt="image">
                @endif
                <div class="form-group">
                    {{ Form::label('Photo') }}
                    <br>
                    {{ Form::file('picture', ['class' => 'form-file' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
                    {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                {{ Form::label('Numéro de Téléphone') }}
                {{ Form::text('phone', $agent->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => '0747644499']) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{--{{ Form::label('Fonction') }}--}}
                {{--{{ Form::select('fonction_id', $fonctions, old('fonction_id', $agent->fonction_id), ['id'=>'fonction_id', 'class' => 'form-select' . ($errors->has('fonction_id') ? ' is-invalid' : '') ,'placeholder' => 'Faire un Choix', 'required']) }}
                {!! $errors->first('fonction_id', '<div class="invalid-feedback">:message</div>') !!}--}}
                <label for="fonction_id">Fonction</label>
                <select id="fonction_id" name="fonction_id" class="form-select" required>
                    <option selected disabled>Faire un choix</option>
                    @foreach($fonctions as $directionId => $fonctionsGroup)
                        <optgroup label="{{ $fonctionsGroup[0]?->direction?->libelle }}">
                            @foreach($fonctionsGroup as $fonction)
                                <option value="{{ $fonction->id }}">{{ $fonction->libelle }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="box-footer d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#fonction_id').select2()
    });
</script>
