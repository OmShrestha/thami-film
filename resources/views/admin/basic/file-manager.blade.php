@extends('admin.layout')

@section('content')
    <style>
        .separate-file-manager {
            position: relative;
            width: 100%;
            /*100vh minus 50px*/
            height: calc(100vh - 70px);
            overflow: hidden;
        }

        .separate-file-manager iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="separate-file-manager">
                            <iframe src="{{url('laravel-filemanager')}}?serial=1&page=file-manager"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

