@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible dismiss-3" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <style>
        .bg-purple-50 {
            background: #696cff50;
        }

        .bg-green-50 {
            background: #71dd3750;
        }

        .bg-orange-50 {
            background: #fd7e1450;
        }
    </style>



    <div class="row">
        <div class="col-md-8">

            <!-- Total admin -->
            <div class="col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">{{ __('Admins') }}</h5>
                            <div id="YearlyAdminCount" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total admin -->

            <!-- Total User -->
            <div class="col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">{{ __('Users') }}</h5>
                            <div id="YearlyUserCount" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total User -->


            <!-- Total Customers -->
            <div class="col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">{{ __('Customers') }}</h5>
                            <div id="YearlyCustomerCount" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Customers -->



        </div>

        <div class="col-md-4">
            <div class="col-lg-12 col-md-12 col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <div class="bg-green-50 rounded d-flex align-items-start justify-content-center">
                                    <i class="fa-solid fa-newspaper m-2" style="font-size: 22px;color:#71dd37 "></i>
                                </div>
                            </div>
                        </div>
                        <span>{{ __('Admin') }}</span>
                        <h3 class="card-title text-nowrap mb-1">{{ $admin }}</h3>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <div class="bg-purple-50 rounded d-flex align-items-start justify-content-center">
                                    <i class="fa-solid fa-user m-2" style="font-size: 22px; color:#696cff"></i>
                                </div>
                            </div>
                        </div>
                        <span>{{ __('Customers') }}</span>
                        <h3 class="card-title text-nowrap mb-1">{{ $customers }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <div class="bg-purple-50 rounded d-flex align-items-start justify-content-center">
                                    <i class="fa-solid fa-user m-2" style="font-size: 22px; color:#696cff"></i>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">{{ __('Users') }}</span>
                        <h3 class="card-title mb-2">{{ $users }}</h3>
                    </div>
                </div>
            </div>






        </div>

    </div>

@endsection
