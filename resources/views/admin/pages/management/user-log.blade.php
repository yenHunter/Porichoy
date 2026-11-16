@extends('admin.layouts.vertical', ['title' => 'User Log'])

@section('css')
    @vite(['node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'])
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'System', 'title' => 'User Log'])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div>
                        <h4 class="card-title mb-1">User Log</h4>
                        <p class="small mb-0 text-info">
                            The {{ $log_limit }} most recent actions taken in the admin area.
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped dt-responsive align-middle mt-2 mb-0" data-tables="basic">
                        <thead class="thead-sm text-uppercase fs-xxs">
                            <tr>
                                <th>Model</th>
                                <th>Action</th>
                                <th>User name</th>
                                <th>IP Address</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log_list as $item)
                                <tr>
                                    <td>
                                        {{ Str::headline($item->module ?? '—') }}
                                    </td>
                                    <td>
                                        {{ $item->action }}
                                    </td>
                                    <td>
                                        @if ($item->user)
                                            {{ $item->user->full_name }}
                                        @else
                                            <span class="text-muted" title="The account was deleted; the log is kept">
                                                Deleted user
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->user_ip ?? '—' }}
                                        @if ($item->user_agent)
                                            <br>
                                            <small class="text-muted" title="{{ $item->user_agent }}">
                                                {{ Str::limit($item->user_agent, 40) }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $item->created_at?->format('M d, Y H:i') ?? '—' }}
                                        </small>
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
