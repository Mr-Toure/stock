@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-xl-3 ">
                        <div class="card shadow-none m-0 text-info">
                            <div class="card-body text-center">
                                <i class="dripicons-store text-info" style="font-size: 24px;"></i>
                                <h3><span>{{ $fours->count() }}</span></h3>
                                <p class="text-black font-15 mb-0">Article gérés</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start text-success">
                            <div class="card-body text-center">
                                <i class="dripicons-checklist text-success" style="font-size: 24px;"></i>
                                <h3><span>{{ $instocks->count()  }}</span></h3>
                                <p class="text-black font-15 mb-0">Article En Stock</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start text-danger">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-danger" style="font-size: 24px;"></i>
                                <h3>
                                    <span>
                                        {{ $count = 0 }}
                                        @foreach ($instocks as $i=>$instock)
                                            @if($instock->fourniture->qte_seuil > $instock->qte)
                                                {{ $count == $count++ }}
                                            @endif
                                        @endforeach
                                        {{ $count }}
                                    </span>
                                </h3>
                                <p class="text-black font-15 mb-0">Article En Rupture</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card shadow-none m-0 border-start text-warning">
                            <div class="card-body text-center">
                                <i class="dripicons-graph-line text-warning" style="font-size: 24px;"></i>
                                <h3><span>{{ $besoins->whereIn('status',300)->count() }}</span></h3>
                                <p class="text-black font-15 mb-0">Besoins en Attente</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->


<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Status des Sorties</h4>

                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart" data-colors="#10c469,#ff5b5b"></canvas>
                </div>

                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="fw-normal">
                            <span>65%</span>
                        </h3>
                        <p class="text-muted mb-0">Informatique</p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                        <h3 class="fw-normal">
                            <span>30%</span>
                        </h3>
                        <p class="text-muted mb-0">Bureau</p>
                    </div>
                </div>
                <!-- end row-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Tableau des sorties recentes</h4>

                <p><b class="text-danger">{{ $besoins->whereIn('status',105)->count() }}</b> besoins non traitée</p>

                <table class="table table-bordered border-primary table-centered mb-0">
                    <thead>
                        <tr>
                            <th>Demandeurs</th>
                            <th>Direction</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($besoins->whereIn('status',105)->take(4) as $besoin)
                            <tr>
                                <td class="table-user">
                                    <img src="{{ asset('img/user.jpg') }}" alt="table-user" class="me-2 rounded-circle" />
                                    {{ $besoin->agent->name }} {{ $besoin->agent->surname }}
                                </td>
                                <td>{{ $besoin->agent->service->ssdirection->direction->initiale }}</td>
                                <td>{{ $besoin->created_at->format('d-m-Y H:m') }}</td>
                                <td class="table-action text-center">
                                    <a class="btn btn-sm btn-info " href="{{ route('besoin.show',$besoin->id) }}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> <!-- end table-responsive-->

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Repartition</h4>

                <div dir="ltr">
                    <div class="mt-3 chartjs-chart" style="height: 320px;">
                        <canvas id="task-area-chart" data-bgColor="#536de6" data-borderColor="#536de6"></canvas>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

@stop
