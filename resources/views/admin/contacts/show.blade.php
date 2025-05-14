{{-- attachment modal --}}
<div class="modal fade" id="contactsModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Contact message by {{ $message->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Name</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Email</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Subject</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->subject }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Phone</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->phone }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Message</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->message }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Referrer</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->referrer }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>Date</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->created_at->format('d/m/y - h:i A') }} <br> <i>({{ $message->created_at->diffForHumans() }})</i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 py-3 border">
                        <strong>IP Address</strong>
                    </div>
                    <div class="col-md-9 py-3 border">
                        {{ $message->ip }}
                    </div>
                </div>

            </div>

            <div class="modal-footer"></div>
        </div>
    </div>
</div>
