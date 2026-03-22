@extends('layouts.vertical', ['title' => 'i18 Support'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['title' => 'i18 Support', 'subtitle' => 'Miscellaneous'])

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Example</h4>
        </div>
        <div class="card-body">
            <h5 class="mb-2">You can change the language of demo text as well as the menu with simple function fire on
                buttons click. Try it:</h5>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-light gap-1 d-inline-flex align-items-center" data-translator-lang="en">
                    <img alt="user-image" class="me-1 rounded" data-translator-image="" height="18"
                        src="/images/flags/us.svg" /> <span class="align-middle">English</span>
                </button>
                <button class="btn btn-light gap-1 d-inline-flex align-items-center" data-translator-lang="hi">
                    <img alt="user-image" class="me-1 rounded" data-translator-image="" height="18"
                        src="/images/flags/in.svg" /> <span class="align-middle">Hindi</span>
                </button>
                <button class="btn btn-light gap-1 d-inline-flex align-items-center" data-translator-lang="it">
                    <img alt="user-image" class="me-1 rounded" data-translator-image="" height="18"
                        src="/images/flags/it.svg" /> <span class="align-middle">Italian</span>
                </button>
                <button class="btn btn-light gap-1 d-inline-flex align-items-center" data-translator-lang="es">
                    <img alt="user-image" class="me-1 rounded" data-translator-image="" height="18"
                        src="/images/flags/es.svg" /> <span class="align-middle">Spanish</span>
                </button>
                <button class="btn btn-light gap-1 d-inline-flex align-items-center" data-translator-lang="ru">
                    <img alt="user-image" class="me-1 rounded" data-translator-image="" height="18"
                        src="/images/flags/ru.svg" /> <span class="align-middle">Russian</span>
                </button>
            </div>
            <h5 class="mt-3">Example:</h5>
            <div class="bg-light-subtle border border-dashed p-3 rounded-3" style="height: 85px;">
                <p class="mb-0" data-lang="demo-text"></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">i18support Configuration</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <span class="badge badge-soft-success py-1 badge-label fs-base text-uppercase mb-2">Step 1</span>
                <p class="text-muted">To enable i18n support in your application, you need to define all translatable text.
                    The most effective way to do this is by storing the text in an external JSON file. For example:</p>
                <div class="row">
                    <div class="col-md-4">
                        <h5>en.json</h5>
                        <pre class="bg-light-subtle border border-dashed rounded">
                                    <code class="language-javascript">
                                        {
                                            "dashboards": "Dashboards",
                                            "dashboard-one": "Dashboard v.1",
                                            "dashboard-two": "Dashboard v.2"
                                        }
                                    </code>
                                </pre>
                    </div>
                    <div class="col-md-4">
                        <h5>es.json</h5>
                        <pre class="bg-light-subtle border border-dashed rounded">
                                    <code class="language-javascript">
                                        {
                                            "dashboards": "Paneles",
                                            "dashboard-one": "Panel v.1",
                                            "dashboard-two": "Panel v.2"
                                        }
                                    </code>
                                </pre>
                    </div>
                    <div class="col-md-4">
                        <h5>ru.json</h5>
                        <pre class="bg-light-subtle border border-dashed rounded">
                                        <code class="language-javascript">
                                            {
                                                "dashboards": "Панели",
                                                "dashboard-one": "Панель v.1",
                                                "dashboard-two": "Панель v.2"
                                            }
                                        </code>
                                    </pre>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <span class="badge badge-soft-success py-1 badge-label fs-base text-uppercase mb-2">Step 2</span>
                <p class="text-muted">
                    Next you need to add html indicators in all place you want to use <code>data-lang</code>.
                </p>
                <pre class="bg-light-subtle border border-dashed rounded">
                                <code class="language-markup">
                                &lt;div&gt;
                                    &lt;span data-lang="dashboards"&gt; Dashboards &lt;/span&gt;
                                    &lt;span data-lang="dashboard-one"&gt; Dashboard v.1 &lt;/span&gt;
                                    &lt;span data-lang="dashboard-two"&gt; Dashboard v.2 &lt;/span&gt;
                                &lt;/div&gt;
                                </code>
                            </pre>
            </div>
            <div>
                <span class="badge badge-soft-success py-1 badge-label fs-base text-uppercase mb-2">Step 3</span>
                <p class="text-muted">
                    After that if you want to change the language you just need to add buttons and fire the
                    <code>selectedLanguage</code>.
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-2">HTML Code</h5>
                        <pre class="bg-light-subtle border border-dashed rounded">
                                    <code class="language-markup">
                                    &lt;a class="btn btn-light" data-translator-lang="en"&gt; Set EN language&lt;/a&gt;

                                    &lt;a class="btn btn-light" data-translator-lang="es"&gt; Set ES language&lt;/a&gt;
                                    </code>
                                </pre>
                        <h5 class="mt-3 mb-2">Javascript Code</h5>
                        <pre class="bg-light-subtle border border-dashed rounded">
                                    <code class="language-javascript">
                                        let selectedLanguage = "en";
                                    </code>
                                </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
