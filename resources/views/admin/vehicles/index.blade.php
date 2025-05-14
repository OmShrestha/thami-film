@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Vehicle Information</h4>
        <ul class="breadcrumbs">
            <li class="nav-home"><a href="{{route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">Vehicle Management</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card-title d-inline-block">Vehicles List</div>
                        </div>
                        <div class="col-lg-3">
                            @if (!empty($langs))
                                <select name="language" class="form-control"
                                        onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($langs as $lang)
                                        <option
                                            value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-lg-3 offset-lg-1 mt-2 mt-lg-0">

                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                               data-target="#createModal" {{ session()->has('siteName') ? '' : 'disabled' }}>
                                <i class="fas fa-plus"></i> Add Vehicle
                            </a>

                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                    data-href="{{route('admin.blog.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($vehicles == 0)
                                <h3 class="text-center">NO VEHICLES FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="ajax-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Featured</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Create Vehicle Modal -->
    @include('admin.vehicles.create')

    @include('admin.vehicles.scripts')

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#ajax-datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/admin/vehicles-ajax?language={{request()->input('language')}}&site={{request()->input('site')}}',
                    type: 'GET',
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return `<input type="checkbox" class="bulk-check" data-val="${data}">`;
                        }
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            var url = '{{ sprintf(loadImageFor('%s'), '') }}' + data;
                            return '<img src="' + url + '" alt="" width="80">';
                        }
                    },
                    {
                        data: 'name', name: 'name',
                        render: function (data, type, row) {
                            return '<a href="{{ getSiteUrlBySession() }}' + '/' + row.brand.slug + '/' + row.slug + '" target="_blank" class="text-dark">' + data + '</a>';
                        }
                    },
                    {
                        data: 'vehicle_brand_id',
                        name: 'vehicle_brand_id',
                        render: function (data, type, row) {
                            return data ? row.brand.name : '';
                        }
                    },
                    {
                        data: 'is_featured',
                        name: 'is_featured',
                        render: function (data, type, row) {
                            let select = `<form id="statusForm${row.id}" class="d-inline-block" action="/admin/vehicle/featured" method="post">` +
                                '@csrf' +
                                `<input type="hidden" name="vehicle_id" value="${row.id}">` +
                                `<select class="form-control form-control-sm ${data == 1 ? 'bg-success' : 'bg-danger'}" name="is_featured" onchange="document.getElementById('statusForm${row.id}').submit();">` +
                                `<option value="1" ${data == 1 ? 'selected' : ''}>Yes</option>` +
                                `<option value="0" ${data == 0 ? 'selected' : ''}>No</option>` +
                                `</select></form>`;
                            return select;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return '<a href="/admin/vehicles/' + row.id + '/edit?language={{ request()->input('language')  }}" title="Edit" class="btn btn-secondary btn-sm mr-1 my-1"><i class="fas fa-edit fa-sm"></i></a>' +
                                '<form class="deleteform d-inline-block" action="/admin/vehicles/' + row.id + '" method="post">' +
                                '@csrf' +
                                '@method("DELETE")' +
                                '<input type="hidden" name="blog_id" value="' + row.id + '">' +
                                '<button type="submit" title="Delete" class="btn btn-danger btn-sm deletebtn mb-1"><i class="fas fa-trash fa-sm"></i></button>' +
                                '</form>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection
