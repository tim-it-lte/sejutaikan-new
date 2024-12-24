@extends('layouts.dashboard.master')

@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between p-0 bg-white">
                                        <div class="iq-header-title">
                                            <h4 class="card-title text-primary">Activity Statistic</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body p-0">
                                       <div id="patient-chart-1"></div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
