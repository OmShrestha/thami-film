<!-- Details Modal -->
<div class="modal fade" id="detailsModal{{$purchase->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Username:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->user?->username)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Name:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->full_name ?: $purchase->fname)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Email:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->email)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Course:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->course->title)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Batch:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->user?->batches->first()?->batch?->name)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Course Price:</strong>
                        </div>
                        <div class="col-lg-10">Rs. {{convertUtf8($purchase->current_price)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Discount Amount:</strong>
                        </div>
                        <div class="col-lg-10">Rs. {{convertUtf8($purchase->discount)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Payment Due:</strong>
                        </div>
                        <div class="col-lg-10">Rs. {{convertUtf8($purchase->payment_due)}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Payment Method:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->payment_method)}}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-2">
                            <strong>Payment Status:</strong>
                        </div>
                        <div class="col-lg-10">
                            @if (strtolower($purchase->payment_status) == 'completed')
                                <span class="badge badge-success">Completed</span>
                            @else
                                <span class="badge badge-warning">Incomplete</span>
                            @endif
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-lg-2">
                            <strong style="text-transform: capitalize;">Notes:</strong>
                        </div>
                        <div class="col-lg-10">{{convertUtf8($purchase->notes)}}</div>
                    </div>
                    <hr>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
