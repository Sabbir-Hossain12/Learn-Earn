@extends('backend.layout.master')

@push('backendCss')
    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

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
        <div class="modal fade" id="mainPurchese" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Payments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form name="form" method="post" action="{{ route('admin.teacher.payment-store') }}">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ auth()->user()->id }}" hidden>
                            <input type="hidden" name="teacher_id" value="{{ $user->id }}" hidden>

                            <div class="form-group mb-2">
                                <label for="transaction_id">Trx ID</label>
                                <input type="text" name="transaction_id" class="form-control" id="transaction_id"
                                       required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="quantity">Amount</label>
                                <input type="number" min="0" name="amount" class="form-control" id="amount" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="payment_method">Payment Method</label>

                                <select name="payment_method" class="form-control" id="payment_method" required>
                                    <option value="bkash">BKash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="comments">Comments</label>
                                <textarea name="comments" class="form-control" id="comments"></textarea>
                            </div>

                            <div class="form-group" style="text-align: right">
                                <div class="submitBtnSCourse">
                                    <button type="submit" class="btn btn-primary  btn-block">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- End popup Modal-->

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

                                <div>
                                    <span>
                                        <span class="fw-bold"> Teacher Address:</span>
                                        {{ $user->address ?? '' }}
                                    </span>
                                </div>

                                <div>
                                    <span>
                                        <span class="fw-bold"> Payment Method:</span>
                                        {{ strtoupper($user->payment_method ?? '') }}
                                    </span>
                                </div>

                                <div>
                                    <span>
                                        <span class="fw-bold"> Payment Info:</span>
                                        {{ $user->payment_info ?? '' }}
                                    </span>
                                </div>
                            </div>

                            <div>

                                <div><span><span
                                            class="fw-bold"> Account Amount:</span> {{ $user->account_balance ?? '' }}</span>
                                </div>

                            </div>


                            @role('admin')
                            <div class="" style="text-align: right">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#mainPurchese"><span style="font-weight: bold;">+</span> Add
                                    Payment
                                </button>
                            </div>
                            @endrole

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
                                        <th>Date</th>
                                        <th>Invoice ID</th>
                                        <th>Transaction ID</th>
                                        <th>A/C Title</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($payments as $key=>$payment)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->created_at->format('d M Y h:i A') }}</td>
                                            <td>{{ $payment->invoiceID }}</td>
                                            <td>{{ $payment->transaction_id }}</td>
                                            <td>Deposit</td>
                                            <td>
                                                @role('admin')
                                                {{ $payment->amount }}
                                                @endrole
                                            </td>
                                            <td>
                                                @role('teacher')
                                                {{ $payment->amount }}
                                                @endrole
                                            </td>
                                            <td>{{ $payment->comments }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
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
    <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#purcheseinfotbl').DataTable();
        })
    </script>
@endpush
