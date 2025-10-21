@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet" type="text/css">

    <style>
        /*.fas{*/
        /*    color: white;*/
        /*}*/
    </style>

@endpush

@section('contents')

    {{--  Charts  --}}
    @role('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Admin Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-school h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Classes</span>
                            <h4 class="mb-3">
                                <span class="">{{$total_classes}}</span>
                            </h4>

                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-chalkboard h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Courses</span>
                            <h4 class="mb-3">
                                <span class="">{{$total_courses}}</span>
                            </h4>
                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-users h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Students</span>
                            <h4 class="mb-3">
                                <span class="">{{$total_students}}</span>
                            </h4>
                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-user-plus h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Enrollments</span>
                            <h4 class="mb-3">
                                <span class="">{{$total_enrollments}}</span>
                            </h4>

                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>


    </div>
    @endrole

    @role('teacher')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Teacher Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-school h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Courses</span>
                            <h4 class="mb-3">
                                <span class="">{{ $total_courses ?? 0 }}</span>
                            </h4>

                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-pen h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Lessons</span>
                            <h4 class="mb-3">
                                <span class="">{{ $total_lessons ?? 0 }}</span>
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-users h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Enrollments</span>
                            <h4 class="mb-3">
                                <span class="">{{ $total_enrollments ?? 0 }}</span>
                            </h4>
                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4 text-center  rounded">
                            <i class="fas fa-money-bill h2"></i>
                        </div>

                        <div class="col-8">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Sale</span>
                            <h4 class="mb-3">
                                <span class="">{{ $total_earnings ?? 0 }} (BDT)</span>
                            </h4>
                        </div>


                    </div>

                </div><!-- end card body -->
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.teacher.ledger', Auth::user()->id) }}">
                <div class="card card-h-100 shadow">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4 text-center  rounded">
                                <i class="fas fa-money-bill h2"></i>
                            </div>

                            <div class="col-8">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">Account Balance</span>
                                <h4 class="mb-3">
                                    <span class="">{{ $account_balance ?? 0 }} (BDT)</span>
                                </h4>
                            </div>


                        </div>

                    </div><!-- end card body -->
                </div>
            </a>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Teacher Agreement</h4>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-h-100 shadow">
                <!-- card body -->
                <div class="card-body">
                    {!! $teacher_agreement ?? '' !!}
                </div>
            </div>
        </div>
    </div>
    @endrole

@endsection

@push('backendJs')
    {{--    <script src=" {{asset('public/backend')}}/assets/libs/apexcharts/apexcharts.min.js"></script>--}}
    <script
        src=" {{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script
        src="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    {{--    <script src=" {{asset('public/backend')}}/assets/js/pages/dashboard.init.js"></script>--}}

@endpush
