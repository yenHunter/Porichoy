@extends('admin.layouts.vertical', ['title' => 'System Log'])

@section('css')
@endsection

@section('content')
    @include('admin.layouts.partials.page-title', ['title' => 'System Log'])
    <div class="row">
        {{-- Sidebar: File List --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Log Files</h5>
                </div>
                <div class="list-group list-group-flush" style="max-height: 80vh; overflow-y: auto;">
                    @forelse($files as $file)
                        <a href="{{ route('management.system.application-log', ['file' => $file]) }}"
                            class="list-group-item list-group-item-action {{ $currentFile == $file ? 'active text-info' : '' }}">
                            <i class="ti ti-file"></i> {{ $file }}
                        </a>
                    @empty
                        <div class="list-group-item">No logs found.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Main Area: Log Content --}}
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        Viewing: <span class="text-primary">{{ $currentFile }}</span>
                    </h5>
                    <span class="badge bg-secondary">{{ count($logs) }} Entries</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 80vh; overflow-y: auto;">
                        <table class="table table-hover table-striped table-sm mb-0"
                            style="font-family: monospace; font-size: 0.85rem;">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th style="width: 150px;">Level</th>
                                    <th style="width: 180px;">Date</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr>
                                        <td>
                                            <span class="badge bg-{{ getLogColor($log['level']) }}">
                                                {{ $log['level'] }}
                                            </span>
                                        </td>
                                        <td class="text-muted">{{ $log['date'] }}</td>
                                        <td class="text-break">{{ Str::limit($log['message'], 200) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">File is empty or
                                            format not recognized.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Helper PHP function for colors (add at bottom of file) --}}
@php
    function getLogColor($level)
    {
        return match (strtolower($level)) {
            'error', 'critical', 'alert', 'emergency' => 'danger',
            'warning' => 'warning',
            'notice' => 'info',
            'info' => 'primary',
            'debug' => 'secondary',
            default => 'dark',
        };
    }
@endphp

@section('scripts')
@endsection
