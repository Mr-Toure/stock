<div class="box box-info padding-1">
    <div class="row">

        <div class="col-6">
            <div class="form-group py-2">
                {{ Form::label('libelle') }}
                {{ Form::text('libelle', $service->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
                {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-6">
            <div class="form-group py-2">
                {{ Form::label('Sous-Direction') }}
                {{ Form::select('ssdirection_id', $ssdirections, old('ssdirection_id', $service->ssdirection_id), ['class' => 'form-control ssdirection' . ($errors->has('ssdirection_id') ? ' is-invalid' : ''), 'placeholder' => 'Choix de la sous-direction', 'requiere']) }}
                {!! $errors->first('ssdirection_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

    </div>
    <div class="box-footer d-flex justify-content-end py-2">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.ssdirection').select2();
    });
</script>
