@extends('layouts.default')

@section('title', 'Graphs')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li><a href="#" class="active">Graphs</a></li>
            </ul>
            <div class="page-title">
                <i class="material-icons">timeline</i><h3>Graphs</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN GRAPHS  -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>&nbsp;</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    <div class="clearfix"></div>
                                    <div class="chartdiv" id="learner_by_intervention"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>&nbsp;</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    <div class="clearfix"></div>
                                    <div class="chartdiv" id="learner_by_company"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>&nbsp;</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    <div class="clearfix"></div>
                                    <div class="chartdiv" id="learner_by_gender"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    </div>

                    <!-- END GRAPHS -->
                </div>
            </div>

        </div>
    </div>
    <!-- BEGIN PAGE CONTAINER-->
@endsection
@section('footer')
    @parent
    <script src={{URL::asset("theme/plugins/amCharts/amcharts.js")}} type="text/javascript"></script>
    <script src={{URL::asset("theme/plugins/amCharts/pie.js")}} type="text/javascript"></script>
    <script src={{URL::asset("theme/plugins/amCharts/export.min.js")}} type="text/javascript"></script>
    <script src={{URL::asset("theme/plugins/amCharts/light.js")}} type="text/javascript"></script>
    <link rel="stylesheet" media="all" type="text/css" href={{URL::asset("theme/plugins/amCharts/export.css")}} />

    <script>
        var genderChart = AmCharts.makeChart( "learner_by_gender", {
            "type": "pie",
            "theme": "light",
            "titles": [ {
                "text": "Learners By Gender",
                "size": 16
            } ],
            "dataProvider": [
                    @foreach($gender as $data)
                        { "value" : {{$data['value']}}, "gender" : "{{$data['name']}}" },
                    @endforeach
            ],
            "valueField": "value",
            "titleField": "gender",
            "startEffect": "elastic",
            "startDuration": 2,
            "labelRadius": 15,
            "innerRadius": "50%",
            "depth3D": 10,
            "balloonText": "[[title]]<br><span style='font-size:10px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 15,
            "export": {
                "enabled": false
            }
        } );

        var companyChart = AmCharts.makeChart( "learner_by_company", {
            "type": "pie",
            "theme": "light",
            "titles": [ {
                "text": "Learners By Company",
                "size": 16
            } ],
            "dataProvider": [
                    @foreach($company as $data)
                        { "value" : {{$data['value']}}, "company" : "{{$data['name']}}" },
                    @endforeach
            ],
            "valueField": "value",
            "titleField": "company",
            "startEffect": "elastic",
            "startDuration": 2,
            "labelRadius": 15,
            "innerRadius": "50%",
            "depth3D": 10,
            "balloonText": "[[title]]<br><span style='font-size:10px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 15,
            "export": {
                "enabled": false
            }
        } );

        var companyChart = AmCharts.makeChart( "learner_by_intervention", {
            "type": "pie",
            "theme": "light",
            "titles": [ {
                "text": "Learners By Intervention",
                "size": 16
            } ],
            "dataProvider": [
                    @foreach($intervention as $data)
                        { "value" : {{$data['value']}}, "intervention" : "{{$data['name']}}" },
                    @endforeach
            ],
            "valueField": "value",
            "titleField": "intervention",
            "balloonText": "[[title]]<br><span style='font-size:10px'><b>[[value]]</b> ([[percents]]%)</span>",
            "balloon": {"fixedPosition":true}
        } );
    </script>
@endsection