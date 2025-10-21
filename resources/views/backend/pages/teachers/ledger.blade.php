@extends('backend.layout.master')

@push('backendCss')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <style>
        .select2-container--open {
            z-index: 9999 !important;
        }

        .select2-dropdown {
            z-index: 9999;
        }
    </style>

@endpush

@section('contents')

    <div class="container-fluid pt-4 px-4">

        <div class="pagetitle row">
            <div class="col-6">
                <h1><a href="">Dashboard</a></h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Teacher</li>
                        <li class="breadcrumb-item active">Ledger</li>
                    </ol>
                </nav>
            </div>

        </div><!-- End Page Title -->


        {{-- //popup modal for Add Payment --}}
        <div class="modal fade" id="mainPurchese" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Payments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" method="post" action="">
                            @csrf
                            <input type="text" name="Teacher_id" value="" hidden>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" name="date" class="form-control" id="date" value="{{date('Y-m-d')}}">
                            </div>
                            <div class="form-group pb-2">
                                <label for="trx_id">Trx ID</label>
                                <input type="text" name="trx_id" class="form-control" id="trx_id">
                            </div>

                            <div class="form-group pb-2">
                                <label for="quantity">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount">
                            </div>

                            <div class="form-group pb-2">
                                <label for="payment_type_id">Payment Type</label>

                                <select name="payment_type_id" class="form-control" id="payment_type_id">
                                    <option value="bkash">BKash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>

                                </select>
                            </div>


                            <div class="form-group pb-2">
                                <label for="comments">Comments</label>
                                <textarea name="comments" class="form-control" id="comments"></textarea>
                            </div>

                            <div class="form-group" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" name="btn" class="btn btn-primary  btn-block">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div><!-- End popup Modal-->

        {{--      purchase/Teacher Ledger--}}

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center pb-3">Teacher info</h2>
                    <div class="card">
                        <div class="card-body pt-4 d-flex justify-content-between">
                            <div>
                                <div><span><span
                                            class="fw-bold"> Teacher Name:</span> {{ $user->name ?? '' }}</span>
                                </div>
                                <div><span><span
                                            class="fw-bold"> Teacher Phone:</span> {{ $user->phone ?? '' }} </span>
                                </div>
                                <div><span><span
                                            class="fw-bold"> Teacher Email:</span> {{ $user->email ?? '' }} </span>
                                </div>
                                <div><span><span
                                            class="fw-bold"> Teacher Address:</span> {{ $user->address ?? '' }} </span>
                                </div>
                            </div>

                            <div>

                                <div><span><span
                                            class="fw-bold"> Account Amount:</span> {{ $user->account_balance ?? '' }}</span>
                                </div>

                            </div>


                            <div class="" style="text-align: right">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#mainPurchese"><span style="font-weight: bold;">+</span> Add
                                    Payment
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- //table section for category --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center pb-3 mt-4">Teacher Ledger</h2>
                    <div class="card">
                        <div class="card-body pt-4">
                            @if(\Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ \Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-hover mb-0"
                                       id="purcheseinfotbl" width="100%">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>INV</th>
                                        <th>A/C Title</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        <tr class="">
                                            <td></td>
                                            <td></td>
                                            <td>Deposit</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>



@endsection

@push('backendJs')
    <script>
        flatpickr("#date", {});
        flatpickr("#editdate", {});
    </script>
@endpush
