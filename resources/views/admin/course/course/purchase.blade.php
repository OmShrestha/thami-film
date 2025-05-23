@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Courses</h4>
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
                <a href="#">Courses</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Enrolments</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card-title d-inline-block">Courses</div>
                        </div>

                        <div class="col-lg-7 mt-2 mt-lg-0">
                            <button
                                class="btn btn-danger float-right btn-sm d-none bulk-delete"
                                data-href="{{route('admin.course.purchaseBulkOrderDelete')}}"
                            ><i class="flaticon-interface-5"></i> Delete
                            </button>
                            <form class="float-right mr-4" action="{{route('admin.course.purchaseLog')}}" method="GET">
                                <input name="order_number" type="text" class="form-control" placeholder="Search Order Number"
                                       value="{{request()->input('order_number')}}">
                            </form>
                        </div>
                        <div class="col-lg-2 mt-2 mt-lg-0">
                            <a
                                href="{{ route('admin.course.purchaseLog.add') . '?language=' . request()->input('language') }}"
                                class="btn btn-primary float-right btn-sm"
                            ><i class="fas fa-plus"></i> Add new Enrolment</a>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($purchases) == 0)
                                <h3 class="text-center">NO PURCHASES LOG FOUND</h3>
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
                                            <th scope="col">Batch</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Payment Status</th>
                                            {{--<th scope="col">Receipt</th>--}}
                                            <th scope="col">Payment Logs</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        class="bulk-check"
                                                        data-val="{{$purchase->id}}"
                                                    >
                                                </td>
                                                <td>{{$purchase->user?->batches->first()?->batch?->name}}</td>
                                                <td>{{strlen($purchase->course->title) > 25 ? mb_substr($purchase->course->title,0,25,'utf-8') . '...' : $purchase->course->title}}</td>
                                                <td>{{$purchase->user?->full_name}}</td>
                                                <td>
                                                    @if ($purchase->gateway_type == 'offline')
                                                        <form action="{{route('admin.course.purchasePaymentStatus')}}"
                                                              id="paymentStatusForm{{$purchase->id}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                                                            <select
                                                                class="{{strtolower($purchase->payment_status) == 'completed' ? 'bg-success' : 'bg-danger'}} form-control-sm text-white border-0"
                                                                name="payment_status"
                                                                onchange="document.getElementById('paymentStatusForm{{$purchase->id}}').submit();s">
                                                                <option
                                                                    value="Completed" {{strtolower($purchase->payment_status) == 'completed' ? 'selected' : ''}}>
                                                                    Completed
                                                                </option>
                                                                <option
                                                                    value="Pending" {{strtolower($purchase->payment_status) == 'pending' ? 'selected' : ''}}>
                                                                    Incomplete
                                                                </option>
                                                            </select>
                                                        </form>
                                                    @else
                                                        <span
                                                            class="{{strtolower($purchase->payment_status) == 'completed' ? 'badge badge-success' : 'badge badge-danger'}}">{{strtolower($purchase->payment_status) == 'completed' ? 'Completed' : 'Incomplete'}}</span>
                                                    @endif
                                                </td>
                                                {{-- <td>--}}
                                                {{--     @if (!empty($purchase->receipt))--}}
                                                {{--         <a href="" class="btn btn-secondary btn-sm" data-toggle="modal"--}}
                                                {{--            data-target="#receiptModal{{$purchase->id}}">Receipt</a>--}}
                                                {{--     @else--}}
                                                {{--         ---}}
                                                {{--     @endif--}}
                                                {{-- </td>--}}
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                                       data-target="#detailsModal{{$purchase->id}}">Details</a>

                                                    <a href="{{ route('payment-logs.index', ['purchase_id' => $purchase->id]) }}"
                                                       class="btn btn-success btn-sm ml-2">Logs</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.course.purchaseLog.edit', $purchase->id) }}"
                                                       class="btn btn-secondary btn-sm my-1">Edit</a>
                                                    <form class="deleteform d-block my-1" action="{{route('admin.course.purchaseDelete')}}"
                                                          method="post">
                                                        @csrf
                                                        <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
                                                        <button type="submit" class="deletebtn btn btn-danger btn-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            @includeIf('admin.course.course.receipt')
                                            @includeIf('admin.course.course.purchase-details')

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
                            {{$purchases->appends(['order_number' => request()->input('order_number')])->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
