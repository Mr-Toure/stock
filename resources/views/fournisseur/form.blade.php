<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('Nom du Fournisseur') }}
                {{ Form::text('name', $fournisseur->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nom']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Ville') }}
                {{ Form::text('town', $fournisseur->town, ['class' => 'form-control' . ($errors->has('town') ? ' is-invalid' : ''), 'placeholder' => 'Ville']) }}
                {!! $errors->first('town', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-3">
                {{ Form::label('Numero du fournisseur') }}
                {{ Form::text('phone', $fournisseur->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Numero']) }}
                {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('Logo du fournisseur') }}
                {{ Form::file('picture', ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : '')]) }}
                {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>

    @if ($fournisseur->name)
        <div class="row">
            <div class="image d-flex justify-content-center">
                <img class="my-2 " src="{{ asset($fournisseur->picture)}}" width="100" alt="image">
            </div>
        </div>
    @endif
    <div class="box-footer py-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
