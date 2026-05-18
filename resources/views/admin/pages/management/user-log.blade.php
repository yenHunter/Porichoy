@extends('admin.layouts.vertical', ['title' => 'User Log'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css', 'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['title' => 'User Log'])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">User Log</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped align-middle mt-2 mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Model</th>
                                <th>Action</th>
                                <th>User name</th>
                                <th>IP Address</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log_list as $item)
                                <tr>
                                    <td>
                                        {{ $item->module }}
                                    </td>
                                    <td>
                                        {{ $item->action }}
                                    </td>
                                    <td>
                                        {{ $item->user->full_name }}
                                    </td>
                                    <td>
                                        {{ $item->user_ip }}
                                    </td>
                                    <td>
                                        {{ $item->updated_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/pages/management-user-log.js'])
@endsection
