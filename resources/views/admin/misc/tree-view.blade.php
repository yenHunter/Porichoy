@extends('layouts.vertical', ['title' => 'Treeview'])

@section('css')
@vite(['node_modules/jstree/dist/themes/default/style.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Miscellaneous', 'title' => 'Treeview'])

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Treeview</h4>
                </div>
                <div class="card-body">
                    <div id="jstree-1">
                        <ul>
                            <li>
                                Dashboard
                                <ul>
                                    <li data-jstree='{ "selected": true }'>
                                        <a href="javascript:;">Overview</a>
                                    </li>
                                    <li>Analytics</li>
                                    <li data-jstree='{ "opened": true }'>
                                        Reports
                                        <ul>
                                            <li data-jstree='{ "disabled": true }'>Archived Report</li>
                                            <li data-jstree='{ "type": "file" }'>Current Report</li>
                                        </ul>
                                    </li>
                                    <li>Settings</li>
                                </ul>
                            </li>
                            <li>
                                Users
                                <ul>
                                    <li>New Users</li>
                                    <li>Active Users</li>
                                    <li>Banned Users</li>
                                    <li data-jstree='{ "opened": true }'>
                                        Teams
                                        <ul>
                                            <li>Admin Team</li>
                                            <li>Marketing Team</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Files
                                <ul>
                                    <li>Documents</li>
                                    <li>Images</li>
                                    <li>Audio</li>
                                    <li>Videos</li>
                                    <li>Archives</li>
                                </ul>
                            </li>
                            <li>
                                Settings
                                <ul>
                                    <li>System Settings</li>
                                    <li>Security</li>
                                    <li>Languages</li>
                                </ul>
                            </li>
                            <li data-jstree='{ "type": "link" }'>
                                <a href="https://www.example.com" target="_blank">External Resource</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Custom Icons &amp; Clickable Nodes</h4>
                </div>
                <div class="card-body">
                    <div id="jstree-2">
                        <ul>
                            <li>
                                Main Category
                                <ul>
                                    <li data-jstree='{ "selected" : true, "icon": "ti ti-star text-primary fs-lg" }'>
                                        <a href="javascript:;"> Favorite Item </a>
                                    </li>
                                    <li data-jstree='{ "icon" : "ti ti-file-text text-success fs-lg" }'>
                                        Documentation Files
                                    </li>
                                    <li data-jstree='{ "opened" : true, "icon" : "ti ti-folder-open text-warning fs-lg" }'>
                                        Project Resources
                                        <ul>
                                            <li data-jstree='{ "disabled" : true, "icon": "ti ti-ban text-muted fs-lg" }'>
                                                Restricted Access
                                            </li>
                                            <li data-jstree='{ "type" : "file", "icon": "ti ti-file fs-lg" }'>
                                                Final Report.pdf
                                            </li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{ "icon" : "ti ti-user text-danger fs-lg" }'>
                                        Team Member Info
                                    </li>
                                </ul>
                            </li>
                            <li data-jstree='{ "type" : "link", "icon": "ti ti-link text-info" }'>
                                <a href="#!"> Buy <span class="text-danger fw-semibold fst-italic">MyAdmin</span> -
                                    Click here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Checkable Tree</h4>
                </div>
                <div class="card-body">
                    <div>
                        <div id="jstree-3"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Context Menu</h4>
                    <p class="text-muted mb-0">Right-click on any tree item to access options like create, rename, edit,
                        copy, cut, and more.</p>
                </div>
                <div class="card-body">
                    <div>
                        <div id="jstree-4"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Drag &amp; Drop</h4>
                </div>
                <div class="card-body">
                    <div id="jstree-5"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ajax Data</h4>
                </div>
                <div class="card-body">
                    <div id="jstree-6"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')    
    @vite(['resources/js/pages/misc-treeview.js'])
@endsection
