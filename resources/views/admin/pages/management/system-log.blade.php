@extends('admin.layouts.vertical', ['title' => 'System Log'])

@section('content')
    @include('admin.layouts.partials.page-title', ['subtitle' => 'System', 'title' => 'System Log'])
    <div class="row">
        {{-- Sidebar: File List --}}
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Log Files</h5>
                </div>
                <div class="list-group list-group-flush" style="max-height: 80vh; overflow-y: auto;">
                    @forelse($files as $file)
                        <a href="{{ route('management.system.application-log', ['file' => $file['name']]) }}"
                            class="list-group-item list-group-item-action {{ $currentFile === $file['name'] ? 'active text-info' : '' }}">
                            <div class="d-flex justify-content-between align-items-center gap-2">
                                <span class="text-truncate"><i class="ti ti-file"></i> {{ $file['name'] }}</span>
                                <span class="badge bg-secondary">{{ number_format($file['size'] / 1024, 1) }} KB</span>
                            </div>
                            <small class="text-muted">
                                {{ $file['modified'] ? date('M d, Y H:i', $file['modified']) : '—' }}
                            </small>
                        </a>
                    @empty
                        <div class="list-group-item text-muted">No log files found.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Main Area: Log Content --}}
        <div class="col-md-9">
            @if (! $currentFile)
                <div class="card">
                    <div class="card-body py-5 text-center">
                        <i class="ti ti-file-off fs-1 text-muted"></i>
                        <p class="mb-0 mt-2 text-muted">No log files have been written yet.</p>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                        <div>
                            <h5 class="card-title mb-0">
                                Viewing: <span class="text-primary">{{ $currentFile }}</span>
                            </h5>
                            @if ($truncated)
                                <p class="small text-muted mb-0">
                                    Showing the newest {{ count($logs) }} of {{ $total }} entries.
                                </p>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-secondary">{{ $total }} Entries</span>
                            <form action="{{ route('management.system.application-log') }}" method="GET">
                                <input type="hidden" name="file" value="{{ $currentFile }}">
                                <select class="form-select form-select-sm" name="level"
                                    aria-label="Filter by level" onchange="this.form.submit()">
                                    <option value="">All levels</option>
                                    @foreach ($levels as $option)
                                        <option value="{{ $option }}" @selected($level === $option)>
                                            {{ ucfirst($option) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
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
                                                <span class="badge bg-{{ match (strtolower($log['level'])) {
                                                        'error', 'critical', 'alert', 'emergency' => 'danger',
                                                        'warning' => 'warning',
                                                        'notice' => 'info',
                                                        'info' => 'primary',
                                                        'debug' => 'secondary',
                                                        default => 'dark',
                                                    } }}">
                                                    {{ $log['level'] }}
                                                </span>
                                            </td>
                                            <td class="text-muted">{{ $log['date'] }}</td>
                                            <td class="text-break">
                                                {{ $log['message'] }}
                                                @if ($log['detail'] !== '')
                                                    <details class="mt-1">
                                                        <summary class="small text-primary">Stack trace</summary>
                                                        <pre class="small mb-0 mt-1 text-muted" style="white-space: pre-wrap;">{{ $log['detail'] }}</pre>
                                                    </details>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-4 text-center">
                                                {{ $level ? 'No entries at this level in the file tail.' : 'File is empty or format not recognized.' }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
@endsection
