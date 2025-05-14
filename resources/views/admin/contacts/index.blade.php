@extends('admin.layout')

@section('styles')
    <style>
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 800px !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-header">
        <h4 class="page-title">Contact Messages</h4>
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
                <a href="#">Contact Messages</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-title d-inline-block">Messages List</div>
                        </div>
                        <div class="col-lg-6 mt-2 mt-lg-0">
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.contacts.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($messages) == 0)
                                <h3 class="text-center">NO MESSAGES FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="bulk-check" data-val="{{$message->id}}">
                                                </td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->phone }}</td>
                                                @php $sub = str_replace('-', ' ', $message->subject); @endphp
                                                <td class="text-capitalize">{{ $sub }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="#" data-toggle="modal"
                                                       data-target="#contactsModal{{ $message->id }}">Show</a>
                                                </td>
                                                <td>
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.contacts.destroy', $message->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="contacts_id" value="{{$message->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                          <span class="btn-label">
                                                            <i class="fas fa-trash"></i>
                                                          </span> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            @include('admin.contacts.show')

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
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
