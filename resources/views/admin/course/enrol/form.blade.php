<form id="ajaxForm"
      action="{{ isset($purchase) ? route('admin.course.purchaseLog.update', $purchase->id) : route('admin.course.purchaseLog.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6 pr-1">
            <div class="form-group">
                <label for="">Choose Course **</label>
                <select name="course_id" id="course_id" class="form-control">
                    <option value="" {{ !isset($purchase) ? 'selected' : '' }} disabled>Select a Course</option>
                    @foreach ($courses as $course)
                        <option value="{{$course->id}}" {{ (isset($purchase) && $purchase->id == $course->id) ? 'selected' : '' }}>
                            {{$course->title}}
                        </option>
                    @endforeach
                </select>
                <p id="errcourse_id" class="mb-0 text-danger em"></p>
                <p class="text-success font-weight-bold mt-1" id="course_price_info"></p>
            </div>
        </div>
        <div class="col-lg-6 pl-1">
            <div class="form-group">
                <label for="">Choose Batch **</label>
                <select name="batch_id" class="form-control">
                    <option value="" disabled>Select batch</option>
                    @foreach ($batches as $batch)
                        <option value="{{$batch->id}}" {{ isset($purchase) && $purchase->batch_id == $batch->id ? 'selected' : '' }}>
                            {{$batch->name}}
                        </option>
                    @endforeach
                </select>
                <p id="errbatch_id" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Choose Student **</label>
                <select name="user_id" class="form-control select2">
                    <option value="" selected disabled>Select a Student</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" {{ (isset($purchase) && $purchase->user_id == $user->id) ? 'selected' : '' }}>
                            {{$user->full_name}} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                <p id="erruser_id" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="discount_type">Discount Type **</label>
                <select id="discount_type" type="text" class="form-control" name="discount_type">
                    <option id="fixed"
                            value="fixed" {{ (isset($purchase) && $purchase->discount_percentage == 'fixed') ? 'selected' : '' }}>
                        Fixed
                    </option>
                    <option id="percentage"
                            value="percentage" {{ (isset($purchase) && $purchase->discount_percentage == 'percentage') ? 'selected' : '' }}>
                        Percentage
                    </option>
                </select>
                <p id="errdiscount_type" class="mb-0 text-danger em"></p>
            </div>
        </div>
        <div class="col-md-4" style="display: none">
            <div class="form-group">
                <label for="">Discount Percentage **</label>
                <input
                    id="discount_percentage"
                    type="number"
                    class="form-control"
                    name="discount_percentage"
                    value="{{ $purchase->discount ?? '' }}"
                >
                <p id="errdiscount_percentage" class="mb-0 text-danger em"></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Discount Amount</label>
                <input
                    id="discount"
                    type="number"
                    class="form-control"
                    name="discount"
                    value=""
                >
                <p id="errdiscount" class="mb-0 text-danger em"></p>
                <p class="text-warning"><small>If percentage is selected, it auto calculates the amount </small></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Paid Amount **</label>
                <input
                    id="paid_amount"
                    type="number"
                    class="form-control"
                    name="paid_amount"
                    value=""
                >
                <p id="errpaid_amount" class="mb-0 text-danger em"></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Payment Due **</label>
                <input
                    id="payment_due"
                    type="number"
                    class="form-control"
                    name="payment_due"
                    placeholder="Enter Payment Due"
                    value="0"
                    readonly
                >
                <p id="errpayment_due" class="mb-0 text-danger em"></p>
                <p class="text-warning"><small>This is an auto calculated value based on (Course Price - Paid
                        Amount - Discount) </small></p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Notes (if any)</label>
        <textarea
            class="form-control"
            name="notes"
            rows="6"
            cols="80"
            placeholder="Enter Notes"
        ></textarea>
        <p id="errnotes" class="mb-0 text-danger em"></p>
    </div>
</form>
