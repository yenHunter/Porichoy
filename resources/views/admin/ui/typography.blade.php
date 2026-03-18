@extends('layouts.vertical', ['title' => 'Typography'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'UI', 'title' => 'Typography'])

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Display Headings</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="display-1">Display 1</h1>
                    <h1 class="display-2">Display 2</h1>
                    <h1 class="display-3">Display 3</h1>
                    <h1 class="display-4">Display 4</h1>
                    <h1 class="display-5">Display 5</h1>
                    <h1 class="display-6">Display 6</h1>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Headings</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h1>Heading 1 <small>Sub Heading</small></h1>
                    <h2>Heading 2 <small>Sub Heading</small></h2>
                    <h3>Heading 3 <small>Sub Heading</small></h3>
                    <h4>Heading 4 <small>Sub Heading</small></h4>
                    <h5>Heading 5 <small>Sub Heading</small></h5>
                    <h6>Heading 6 <small>Sub Heading</small></h6>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Naming a Source</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">A well-known quote, contained in a blockquote element. </p>
                    <figure>
                        <blockquote class="blockquote">
                            <p>"Design is not just what it looks like and feels like. Design is how it works."</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Steve Jobs in <cite title="Design Philosophy">Design Philosophy</cite>
                        </figcaption>
                    </figure>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Inline Text Elements</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Styling for common inline HTML5 elements.</p>
                    <p class="lead">Your title goes here</p>
                    <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                    <p><del>This line of text is meant to be treated as deleted text.</del></p>
                    <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                    <p><ins>This line of text is meant to be treated as an addition to thedocument.</ins></p>
                    <p><u>This line of text will render as underlined</u></p>
                    <p><small>This line of text is meant to be treated as fine print.</small></p>
                    <p><strong>This line rendered as bold text.</strong></p>
                    <p><em>This line rendered as italicized text.</em></p>
                    <p class="mb-0">Nulla <abbr title="attribute">attr</abbr> vitae elit libero, a pharetra augue.</p>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Unordered</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">A list of items in which the order does not explicitly matter.</p>
                    <ul>
                        <li>
                            Fully responsive design
                        </li>
                        <li>
                            Built with Bootstrap 5 framework
                        </li>
                        <li>
                            Clean and modern UI components
                        </li>
                        <li>
                            Cross-browser compatibility
                        </li>
                        <li>
                            Multiple form elements and validations
                            <ul>
                                <li>
                                    Rich input controls
                                </li>
                                <li>
                                    Step-based form wizards
                                </li>
                                <li>
                                    Real-time validation
                                </li>
                                <li>
                                    Customizable styles
                                </li>
                            </ul>
                        </li>
                        <li>
                            Advanced chart and graph libraries
                        </li>
                        <li>
                            Integrated data tables and sorting
                        </li>
                        <li>
                            Developer-friendly code structure
                        </li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Ordered</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">A list of items in which the order does explicitly matter.</p>
                    <ol>
                        <li>
                            Install all dependencies
                        </li>
                        <li>
                            Configure project environment settings
                        </li>
                        <li>
                            Set up folder structure and routing
                        </li>
                        <li>
                            Integrate UI components and layout
                        </li>
                        <li>
                            Implement core modules
                            <ol>
                                <li>
                                    Authentication &amp; Authorization
                                </li>
                                <li>
                                    Dashboard widgets and metrics
                                </li>
                                <li>
                                    User profile management
                                </li>
                                <li>
                                    Notification &amp; messaging systems
                                </li>
                            </ol>
                        </li>
                        <li>
                            Connect backend APIs and test data flow
                        </li>
                        <li>
                            Optimize performance and responsive design
                        </li>
                        <li>
                            Final testing and deployment
                        </li>
                    </ol>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Unstyled</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted"><strong>This only applies to immediate children
                            list items</strong>, meaning you will need to add the class for any nested lists
                        as well.</p>
                    <ul class="list-unstyled">
                        <li>
                            Install project dependencies
                        </li>
                        <li>
                            Configure build settings
                            <ul>
                                <li>
                                    Update environment variables
                                </li>
                            </ul>
                        </li>
                        <li>
                            Setup project structure and routes
                        </li>
                        <li>
                            Launch local development server
                        </li>
                    </ul>
                    <h5>Inline List</h5>
                    <p class="text-muted m-b-15">
                        Display list items horizontally using <code>display: inline-block;</code> and appropriate spacing.
                    </p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            HTML
                        </li>
                        <li class="list-inline-item">
                            CSS
                        </li>
                        <li class="list-inline-item">
                            JavaScript
                        </li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Abbreviations </h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Add .initialism to an abbreviation for a slightly smaller font-size.</p>
                    <p><abbr title="attribute">attr</abbr></p>
                    <p><abbr class="initialism" title="HyperText Markup Language">HTML</abbr></p>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Alignment </h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Use text utilities as needed to change the alignment of your
                        blockquote.</p>
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>"Design is not just what it looks like and feels like. Design is how it works."</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Steve Jobs in <cite title="Steve Jobs Biography">Steve Jobs Biography</cite>
                        </figcaption>
                    </figure>
                    <figure class="text-end">
                        <blockquote class="blockquote">
                            <p>"Simplicity is the ultimate sophistication."</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            Leonardo da Vinci in <cite title="Design Philosophy">Design Philosophy</cite>
                        </figcaption>
                    </figure>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Inline </h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">Remove a list's bullets and apply some light margin with a
                        combination of two classes, .list-inline and .list-inline-item.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">This is a list item.</li>
                        <li class="list-inline-item">And another one.</li>
                        <li class="list-inline-item">But they're displayed inline.</li>
                    </ul>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Blockquotes</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        For quoting blocks of content from another source within your document. Wrap
                        <code>&lt;blockquote class="blockquote"&gt;</code> around any
                        <abbr title="HyperText Markup Language">HTML</abbr> as the quote.
                    </p>
                    <blockquote class="blockquote">
                        <p class="mb-0">"Good design is obvious. Great design is transparent."</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Joe Sparano in <cite title="Design Principles">Design Principles</cite>
                    </figcaption>
                    <p class="text-muted m-b-15">
                        Use text utilities as needed to change the alignment of your blockquote.
                    </p>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">"First, solve the problem. Then, write the code."</p>
                    </blockquote>
                    <figcaption class="blockquote-footer text-center">
                        John Johnson in <cite title="Developer Wisdom">Developer Wisdom</cite>
                    </figcaption>
                    <blockquote class="blockquote text-end">
                        <p class="mb-0">"Simplicity is the soul of efficiency."</p>
                    </blockquote>
                    <figcaption class="blockquote-footer text-end">
                        Austin Freeman in <cite title="Efficiency in Design">Efficiency in Design</cite>
                    </figcaption>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Description List Alignment</h4>
                    </div>
                    <div class="card-action">
                        <a class="card-action-item" data-action="card-toggle" href="#!"><i
                                class="ti ti-chevron-up"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Align terms and descriptions horizontally by using our grid system’s predefined classes (or semantic
                        mixins). For longer terms, you can optionally add a
                        <code>.text-truncate</code> class to truncate the text with an ellipsis.
                    </p>
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Dashboard</dt>
                        <dd class="col-sm-9">An overview panel that displays key metrics and activity summaries.</dd>
                        <dt class="col-sm-3">Form Validation</dt>
                        <dd class="col-sm-9">
                            <p>Includes validation for all major input types with real-time feedback.</p>
                            <p>Built-in support for custom rules and error messages.</p>
                        </dd>
                        <dt class="col-sm-3">Responsive Grid</dt>
                        <dd class="col-sm-9">Utilizes Bootstrap’s flexible grid layout for consistent responsiveness across
                            devices.</dd>
                        <dt class="col-sm-3 text-truncate">User Management Module</dt>
                        <dd class="col-sm-9">Easily manage roles, permissions, and user profiles from a single interface.
                        </dd>
                        <dt class="col-sm-3">Nested Features</dt>
                        <dd class="col-sm-9">
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Email Notifications</dt>
                                <dd class="col-sm-8">Customizable alerts and triggers integrated into app workflows.</dd>
                            </dl>
                        </dd>
                    </dl>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
