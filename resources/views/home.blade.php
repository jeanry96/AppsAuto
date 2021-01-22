@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}" >
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Start Small Box -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ ($nasabah) }}</h3>
                                    <p>Total Account</p>
                                </div>
                                <div class="icon">
                                <i class="ion ion-ios-book-outline"></i>
                                </div>
                                <a href="customers/account" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $autodebet }}<sup style="font-size: 20px"></sup></h3>
                                    <p>Total Account Autodebet</p>
                                </div>
                                <div class="icon">
                                <i class="ion ion-ios-contact-outline"></i>
                                </div>
                                <a href="customer/autodebet" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $importScLsTlp }}</h3>
                                    <p>Total Data Import</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-upload-outline"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $exportScLsTlp }}</h3>
                                    <p>Total Data To Export</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-download-outline"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- End Small Box -->
                </div>
            </div>
        </div>
    </div>
@stop
