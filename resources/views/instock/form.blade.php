<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fourniture_id') }}
            {{ Form::text('fourniture_id', $instock->fourniture_id, ['class' => 'form-control' . ($errors->has('fourniture_id') ? ' is-invalid' : ''), 'placeholder' => 'Fourniture Id']) }}
            {!! $errors->first('fourniture_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qte') }}
            {{ Form::text('qte', $instock->qte, ['class' => 'form-control' . ($errors->has('qte') ? ' is-invalid' : ''), 'placeholder' => 'Qte']) }}
            {!! $errors->first('qte', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>