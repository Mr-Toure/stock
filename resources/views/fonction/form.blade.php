<div class="box box-info padding-1">
    <div class="box-body">

       <div class="row">
           <div class="col-md-6">
               <div class="form-group">
                   {{ Form::label('libelle') }}
                   {{ Form::text('libelle', $fonction->libelle, ['class' => 'form-control' . ($errors->has('libelle') ? ' is-invalid' : ''), 'placeholder' => 'Libelle']) }}
                   {!! $errors->first('libelle', '<div class="invalid-feedback">:message</div>') !!}
               </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-4">
                            {{ Form::label('Sous Direction') }}
                            {{ Form::select('ssdirection_id', $ssdirections, old('ssdirection_id', $fonction->ssdirection_id), ['class' => 'form-control' . ($errors->has('ssdirection_id') ? ' is-invalid' : ''), 'placeholder' => 'Faire un Choix']) }}
                            {!! $errors->first('ssdirection_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-4">
                            {{ Form::label('service') }}
                            {{ Form::select('service_id', $services, old('service_id', $fonction->service_id), ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Faire un choix']) }}
                            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-md-6">
               <div class="row">
                   <div class="col-2">
                       <div class="form-group">
                           {{ Form::label('initial') }}
                           {{ Form::text('initial', $fonction->initial, ['class' => 'form-control' . ($errors->has('initial') ? ' is-invalid' : ''), 'placeholder' => 'Initial']) }}
                           {!! $errors->first('initial', '<div class="invalid-feedback">:message</div>') !!}
                       </div>
                   </div>
                   <div class="col-6">
                       <div class="form-group">
                           {{ Form::label('Direction') }}
                           {{ Form::select('direction_id', $directions, old('direction_id', $fonction->direction_id), ['class' => 'form-select' . ($errors->has('direction_id') ? ' is-invalid' : ''), 'placeholder' => 'Faire un Choix']) }}
                           {!! $errors->first('direction_id', '<div class="invalid-feedback">:message</div>') !!}
                       </div>
                   </div>
               </div>
           </div>
       </div>

    </div>
    <div class="box-footer d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
