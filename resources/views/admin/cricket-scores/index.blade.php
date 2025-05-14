@extends('admin.layout')

@section('content')

    <div class="page-header">
        <h4 class="page-title">Client Feedbacks</h4>
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
                <a href="#">Client Feedbacks</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-title d-inline-block">Feedbacks</div>
                        </div>
                        <div class="col-lg-6 mt-2 mt-lg-0">
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                    data-href="{{route('admin.feedback.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped mt-3">
                                    <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($updates as $key => $update)
                                        <tr>
                                            <td class="text-center">
                                                {{ $update }}
                                            </td>
                                            <td class="text-center d-flex" style="align-items: center; place-content:center">
                                                <button href="{{ route('admin.cricket.api.update') }}?type={{ $key }}"
                                                        class="btn btn-primary float-right btn-sm mr-2 import-api-data"><i
                                                        class="fa fa-plus pr-1"></i> Import API Data
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.import-api-data').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: "Are you sure?",
                text: "The current data will be replaced with new data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willImport) => {
                    if (willImport) {
                        var btn = $(this);
                        btn.html('<i class="fas fa-spinner fa-spin"></i> Importing...');
                        btn.attr('disabled', true);
                        window.location.href = url;
                    }
                });
        });
    </script>

@endsection
