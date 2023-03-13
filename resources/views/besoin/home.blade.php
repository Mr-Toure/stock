@extends('layouts.besoin')

@section('template_title')
    Famille
@endsection

@section('content')
	<div class="second">
        <div style="display: flex; width: 100%; height: 100%; justify-content: center; align-items: center;">
            <section class="commandArea">
                <div class="articles">
                    <div class="articleTitle text-center"><i class="fas fa-hand-holding"></i> Choix de la catégorie</div>
                    <hr>
                    <br><br>
                    <div class="art">
                        <form method="GET" action="{{ route('besoins.validated') }}" name="getFamilly"  role="form" enctype="multipart/form-data">
                            <div id="mains">
                                <div class="form-group">
                                    <!-- <label for="category"><h5>Catégorie</h5></label> -->
                                    <select name="category" class="custom-select form-control" id="agent" required="required">
                                        <option disabled selected class="text-center">---------- Faire un choix ----------</option>
                                        <?php foreach($familles as $family): ?>
                                            <option class="text-center" value="{{ $family->id }}">
                                                {{ $family->libelle }}
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary " value="Continuer">
                            </div>
                        </form>
                        <br clear="both">
                    </div>
                </div>
            </section>
        </div>
    </div>
@stop