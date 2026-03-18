@extends('layouts.horizontal', ['title' => 'Horizontal Menu'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'Horizontal'])
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="m-0">Your custom content here</h4>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('scripts')
@endsection
