<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('libelle') }}
            {{ Form::text('libelle', $commande->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
            {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_com') }}
            {{ Form::text('date_com', $commande->date_com, ['class' => 'form-control' . ($errors->has('date_com') ? ' is-invalid' : ''), 'placeholder' => 'Date Com']) }}
            {!! $errors->first('date_com', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fournisseur_id') }}
            {{ Form::text('fournisseur_id', $commande->fournisseur_id, ['class' => 'form-control' . ($errors->has('fournisseur_id') ? ' is-invalid' : ''), 'placeholder' => 'Fournisseur Id']) }}
            {!! $errors->first('fournisseur_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $commande->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>