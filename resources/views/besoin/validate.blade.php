@extends('layouts.besoin')

@section('template_title')
    Famille
@endsection

@section('content')
<div class="second">
    {{-- <div class="connectName"><h5><?= $user['libelle'] ?></h5></div> --}}
    <div class="main">
    <!--  <div class="btn btn-success col-1 admore fixed-top mt-1" data-count="1" style="left:75%; cursor: pointer;"><i class="fas fa-plus"></i></div>
        <div class="links "><a href="#" id="newNeed" class="btn btn-secondary position-fixed mt-1" data-parent='1' style="right: 5%; top: -1px; z-index: 1000" >Autre Agents ?</a> </div> -->

        <form action="{{ route("besoins.send") }}" method="post">
            {{ csrf_field();  }}
            <div class="row d-flex col-md-12 flex-col justify-content-start" id="needs" data-counter='1'>
                <div class="sticky-top agent col-md-3 text-center">
                    <div class="profil" id="need-1">
                        <img src="{{ asset('assets/besoins/images/user.png') }}" id="profil-1" alt="Logo Agent">
                        <div class="loader" id="loader"></div>
                    </div>
                    <div class="sticky-top form-group">
                        <label for="agent-1"><b>Choisir l'Agent</b></label>
                        <select name="agent" class="custom-select form-control agents" data-count="1" id="agent">
                            <option disabled selected></option>
                            @foreach (session('agents') as $agent)
                                <option class="mb-4" value="{{ $agent->id }}">{{ $agent->name }} {{ $agent->surname }}</option>
                                <option disabled></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="one-need col-md-9 " id="need">
                    <div class="elements" id="container">
                        <div class="d-flex w-100 flex-column items-align-center">
                            <div class="sticky-top d-flex w-40 justify-content-center m-4">
                                <div class="btn btn-dark text-center my-4">Ajouter une nouvelle ligne</div>
                                <!--<button class="btn btn-info"><i class="fa fa-plus-circle"></i></button>-->
                                <a  id="add" class="btn btn-primary my-4"><i class="fa fa-plus-circle"></i></a>
                            </div>

                            <div class="input" id="input">
                                <div class="form-group w-100">
                                    <div class="add-btn d-flex items-align-center">
                                        <label for="article" class="btn btn-warning">Article </label>
                                    {{-- </div> --}}
                                        <div class="form-inline m-1">
                                            <div class="card-body p-4">
                                                <table id="items">

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br clear="both"> <br>
                            <div class="form-group d-flex justify-content-center">
                                <a href="#" class="btn btn-danger mr-4">Annuler</a>
                                <input type="submit" value="Envoyer" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    let data = <?= session('agents') ?>;
    let uri = '';
    let agents = document.querySelectorAll('#agent');
    let profils = document.querySelectorAll('.profil img');

    agents.forEach(function(profil){
        profil.addEventListener('change', function(e){
            let id_agent = e.target.options[e.target.selectedIndex].value
            const filteredData = data.filter(agent => id_agent == agent['id']);
    console.log(filteredData[0]['picture']);
            if (filteredData.length > 0) {
                uri = filteredData[0]['picture'];
            }

            let count = profil.getAttribute('data-count');
            let img = document.querySelector("#profil-" + count)
            img.src = uri != null ? `{{  asset('${uri}')  }}` : "{{ asset('assets/besoins/images/user.png') }}";
            document.querySelector("#container").style.display = 'block';
        })
    });
    profils.forEach(function(profil){
        profil.addEventListener('load', function(e){
            let c = profil.parentNode.getAttribute('id');
            if(e.returnValue !== true){
                document.querySelector('#' + c + ' .loader').style.display = 'block';
            }
        })
    });

    // console.log(profils)
</script>
<script>
    $(document).ready(function() {
        //when the Add Field button is clicked
        var i = 0;
        $("#add").click(function(e) {
            i++;
            console.log('je suis ',i)
            //const id = '#fourniture_id_'+i;
            $("#items").append(`
                <tr id="items_${i}">
                    <td>
                        <div class="col-md-1" id='count${i}'>
                            <b class="text-info">${i}_</b>
                        </div>
                    </td>
                    <td>
                        <div>
                            <select name="fourniture_id[]" id="fourniture_id_${i}" class="form-control ($errors->has('fourniture_id_${i}') ? ' is-invalid' : '')">
                                <option selected disabled>Faire un choix ...</option>
                                @foreach ($fours as $four)
                                <option value="{{ $four->id }}">{{ $four->designation }}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! $errors->first('fourniture_id_${i}', '<div class="invalid-feedback">:message</div>') !!}
                    </td>
                    <td>
                        <div class="my-2">
                            {{ Form::number('qte[]', null, ['class' => 'form-control' . ($errors->has('qte') ? ' is-invalid' : ''), 'placeholder' => 'Qte', 'required'=>'required', 'min'=>'1']) }}
                            {!! $errors->first('qte', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td>
                        <a onClick="$('#items_${i}').remove(); $('#count${i}').remove()" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            `);
            $('#fourniture_id_'+i).select2();
        });
    });
</script>
<script src="{{ asset('assets/besoins/js/main.js') }}"></script>
@stop
