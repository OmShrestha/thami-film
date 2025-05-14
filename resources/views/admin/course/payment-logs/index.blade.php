@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Payments for {{ $purchase->order_number }}</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('admin.dashboard')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.course.purchaseLog') }}">Purchases</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Payment Logs</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class=" d-inline-block">{{ $purchase->first_name . ' - ' . $purchase->course->title }}</div>
                        </div>

                        <div class="col-lg-4 mt-2 mt-lg-0">
                            <button class="btn btn-danger float-right btn-sm d-none bulk-delete"
                                    data-href="{{route('admin.course.purchaseBulkOrderDelete')}}"><i class="flaticon-interface-5"></i>
                                Delete
                            </button>
                        </div>
                        <div class="col-lg-2 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#createModal">
                                <i class="fas fa-plus"></i> Add new payment log
                            </a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($logs) == 0)
                                <h3 class="text-center">NO PAYMENT LOGS FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input
                                                    type="checkbox"
                                                    class="bulk-check"
                                                    data-val="all"
                                                >
                                            </th>
                                            <th scope="col">Paid Amount</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check" data-val="{{$log->id}}">
                                                </td>

                                                <td>{{$log->amount}}</td>
                                                <td>{{$log->payment_gateway}}</td>

                                                <td>
                                                    <form action="{{route('admin.course.payment-logs.status')}}"
                                                          id="paymentLogStatusForm{{$log->id}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="log_id" value="{{$log->id}}">
                                                        <select
                                                            class="{{$log->status ? 'bg-success' : 'bg-danger'}} form-control-sm text-white border-0"
                                                            name="status"
                                                            onchange="document.getElementById('paymentLogStatusForm{{$log->id}}').submit();s">
                                                            <option value="1" {{($log->status) ? 'selected' : ''}}>Paid</option>
                                                            <option value="0" {{!$log->status ? 'selected' : ''}}>Not Paid</option>
                                                        </select>
                                                    </form>
                                                </td>

                                                <td>
                                                    <a class="btn btn-secondary btn-sm editbtn" href="#editModal" data-toggle="modal"
                                                       data-payment_log_id="{{$log->id}}"
                                                       data-user_id="{{$log->user_id}}"
                                                       data-course_purchase_id="{{$log->course_purchase_id}}"
                                                       data-amount="{{$log->amount}}"
                                                       data-payment_gateway="{{$log->payment_gateway}}"
                                                       data-transaction_id="{{$log->transaction_id}}">
                                                        <span class="btn-label">
                                                          <i class="fas fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </a>
                                                </td>

                                                <td>
                                                    <form class="deleteform d-block" action="{{route('payment-logs.destroy', $log->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="log_id" value="{{$log->id}}">
                                                        <button type="submit" class="deletebtn btn btn-danger btn-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            {{$logs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Payment Log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="ajaxForm" class="modal-form create" action="{{route('payment-logs.store')}}" method="POST">
                        @csrf

                        <input type="hidden" name="course_purchase_id" value="{{$purchase->id}}">

                        <div class="form-group d-none">
                            <label for="">Course</label>
                            <input type="text" class="form-control" name="course_id" value="{{ $purchase->course->id }}"
                                   placeholder="{{ $purchase->course->title }}" readonly>
                            <p id="errcourse_id" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group d-none">
                            <label for="">Student Name</label>
                            <input type="text" class="form-control" name="user_id" value="{{ $purchase->user->id }}"
                                   placeholder="{{ $purchase->first_name }}" readonly>
                            <p id="erruser_id" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Amount **</label>
                            <input type="text" class="form-control" name="amount" value="" placeholder="Enter Amount">
                            <p id="erramount" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Payment Method **</label>
                            <input type="text" class="form-control" name="payment_gateway" value="" placeholder="Eg. Esewa, Bank, etc">
                            <p id="errpayment_gateway" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Transaction ID (Optional)</label>
                            <input type="text" class="form-control" name="transaction_id" value=""
                                   placeholder="Eg. Reference ID from Mobile Banking, etc">
                            <p id="errtransaction_id" class="mb-0 text-danger em"></p>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Payment Log Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Payment log</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="ajaxEditForm" class="" action="{{route('payment-logs.update', $purchase->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input id="inpayment_log_id" type="hidden" name="payment_log_id" value="">
                        <input type="hidden" name="course_purchase_id" value="{{$purchase->id}}">

                        <div class="form-group d-none">
                            <label for="">Course</label>
                            <input type="text" id="incourse_id" class="form-control" name="course_id" value="{{ $purchase->course->id }}"
                                   placeholder="{{ $purchase->course->title }}" readonly>
                            <p id="eerrcourse_id" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group d-none">
                            <label for="">Student Name</label>
                            <input type="text" id="inpurchase_id" class="form-control" name="user_id" value="{{ $purchase->user->id }}"
                                   placeholder="{{ $purchase->first_name }}" readonly>
                            <p id="eerruser_id" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Amount **</label>
                            <input type="text" id="inamount" class="form-control" name="amount" value="" placeholder="Enter Amount">
                            <p id="eerramount" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Payment Method **</label>
                            <input type="text" id="inpayment_gateway" class="form-control" name="payment_gateway" value=""
                                   placeholder="Eg. Esewa, Bank, etc">
                            <p id="eerrpayment_gateway" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Transaction ID (Optional)</label>
                            <input type="text" id="intransaction_id" class="form-control" name="transaction_id" value=""
                                   placeholder="Eg. Reference ID from Mobile Banking, etc">
                            <p id="eerrtransaction_id" class="mb-0 text-danger em"></p>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="updateBtn" type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
