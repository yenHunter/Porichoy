@extends('layouts.vertical', ['title' => 'Form Select'])

@section('css')
    @vite(['node_modules/choices.js/public/assets/styles/choices.min.css', 'node_modules/select2/dist/css/select2.min.css'])
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Select'])

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Choices.Js</h4>
                    <p class="text-muted mb-0">
                        Choices.js is a lightweight, configurable select box/text input plugin. Similar to Select2 and
                        Selectize but without the jQuery dependency.
                    </p>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input: Default</h5>
                            <p class="text-muted mb-0">Set <code>data-choices</code> attribute to set a default single
                                select.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" id="choices-single-default"
                                name="choices-single-default">
                                <option value="">This is a placeholder</option>
                                <option value="Choice 1">Choice 1</option>
                                <option value="Choice 2">Choice 2</option>
                                <option value="Choice 3">Choice 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input: Option Groups</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-groups</code> attribute to set
                                option group</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" data-choices-groups=""
                                data-placeholder="Select City" id="choices-single-groups" name="choices-single-groups">
                                <option value="">Choose a city</option>
                                <optgroup label="UK">
                                    <option value="London">London</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Liverpool">Liverpool</option>
                                </optgroup>
                                <optgroup label="FR">
                                    <option value="Paris">Paris</option>
                                    <option value="Lyon">Lyon</option>
                                    <option value="Marseille">Marseille</option>
                                </optgroup>
                                <optgroup disabled="" label="DE">
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Munich">Munich</option>
                                    <option value="Berlin">Berlin</option>
                                </optgroup>
                                <optgroup label="US">
                                    <option value="New York">New York</option>
                                    <option disabled="" value="Washington">Washington</option>
                                    <option value="Michigan">Michigan</option>
                                </optgroup>
                                <optgroup label="SP">
                                    <option value="Madrid">Madrid</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Malaga">Malaga</option>
                                </optgroup>
                                <optgroup label="CA">
                                    <option value="Montreal">Montreal</option>
                                    <option value="Toronto">Toronto</option>
                                    <option value="Vancouver">Vancouver</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input: No Search</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-search-false
                                    data-choices-removeItem</code></p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" data-choices-removeitem=""
                                data-choices-search-false="" id="choices-single-no-search" name="choices-single-no-search">
                                <option value="Zero">Zero</option>
                                <option value="One">One</option>
                                <option value="Two">Two</option>
                                <option value="Three">Three</option>
                                <option value="Four">Four</option>
                                <option value="Five">Five</option>
                                <option value="Six">Six</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input: No Sorting</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-sorting-false</code> attribute.
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" data-choices-sorting-false=""
                                id="choices-single-no-sorting" name="choices-single-no-sorting">
                                <option value="Madrid">Madrid</option>
                                <option value="Toronto">Toronto</option>
                                <option value="Vancouver">Vancouver</option>
                                <option value="London">London</option>
                                <option value="Manchester">Manchester</option>
                                <option value="Liverpool">Liverpool</option>
                                <option value="Paris">Paris</option>
                                <option value="Malaga">Malaga</option>
                                <option disabled="" value="Washington">Washington</option>
                                <option value="Lyon">Lyon</option>
                                <option value="Marseille">Marseille</option>
                                <option value="Hamburg">Hamburg</option>
                                <option value="Munich">Munich</option>
                                <option value="Barcelona">Barcelona</option>
                                <option value="Berlin">Berlin</option>
                                <option value="Montreal">Montreal</option>
                                <option value="New York">New York</option>
                                <option value="Michigan">Michigan</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Multiple Select Input: Default</h5>
                            <p class="text-muted mb-0">Set <code>data-choices multiple</code> attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" id="choices-multiple-default" multiple=""
                                name="choices-multiple-default">
                                <option selected="" value="Choice 1">Choice 1</option>
                                <option value="Choice 2">Choice 2</option>
                                <option value="Choice 3">Choice 3</option>
                                <option disabled="" value="Choice 4">Choice 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Multiple Select Input: With Remove Button</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-removeItem multiple</code>
                                attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" data-choices-removeitem=""
                                id="choices-multiple-remove-button" multiple="" name="choices-multiple-remove-button">
                                <option selected="" value="Choice 1">Choice 1</option>
                                <option value="Choice 2">Choice 2</option>
                                <option value="Choice 3">Choice 3</option>
                                <option value="Choice 4">Choice 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Multiple Select Input: Option Groups</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-multiple-groups="true"
                                    multiple</code> attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control" data-choices="" data-choices-multiple-groups="true"
                                id="choices-multiple-groups" multiple="" name="choices-multiple-groups">
                                <option value="">Choose a city</option>
                                <optgroup label="UK">
                                    <option value="London">London</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Liverpool">Liverpool</option>
                                </optgroup>
                                <optgroup label="FR">
                                    <option value="Paris">Paris</option>
                                    <option value="Lyon">Lyon</option>
                                    <option value="Marseille">Marseille</option>
                                </optgroup>
                                <optgroup disabled="" label="DE">
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Munich">Munich</option>
                                    <option value="Berlin">Berlin</option>
                                </optgroup>
                                <optgroup label="US">
                                    <option value="New York">New York</option>
                                    <option disabled="" value="Washington">Washington</option>
                                    <option value="Michigan">Michigan</option>
                                </optgroup>
                                <optgroup label="SP">
                                    <option value="Madrid">Madrid</option>
                                    <option value="Barcelona">Barcelona</option>
                                    <option value="Malaga">Malaga</option>
                                </optgroup>
                                <optgroup label="CA">
                                    <option value="Montreal">Montreal</option>
                                    <option value="Toronto">Toronto</option>
                                    <option value="Vancouver">Vancouver</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Text Input: Limit Values with Remove Button</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-limit="3"
                                    data-choices-removeItem</code> attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-choices="" data-choices-limit="3"
                                data-choices-removeitem="" id="choices-text-remove-button" type="text"
                                value="Task-1" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Text Input: Unique Values Only</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-text-unique-true</code>
                                attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-choices="" data-choices-text-unique-true=""
                                id="choices-text-unique-values" type="text" value="Project-A, Project-B" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Text Input: Disabled</h5>
                            <p class="text-muted mb-0">Set <code>data-choices data-choices-text-disabled-true</code>
                                attribute.</p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-choices="" data-choices-text-disabled-true=""
                                id="choices-text-disabled" type="text"
                                value="josh@joshuajohnson.co.uk, joe@bloggs.co.uk" />
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Select2</h4>
                    <p class="text-muted">
                        Select2 is an advanced replacement for standard select boxes.
                        It supports searching, remote data sources, and infinite scrolling of results.
                    </p>
                    <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Single Select Input with Button -->
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input with Button</h5>
                            <p class="text-muted mb-0">An example of a select dropdown with an appended button using
                                Select2.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control select2" data-toggle="select2" id="select2BasicExample">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                                <option value="TN">Tennessee</option>
                                <option value="WI">Wisconsin</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="IN">Indiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="OH">Ohio</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WV">West Virginia</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Single Select Input with Groups -->
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Single Select Input with Groups</h5>
                            <p class="text-muted mb-0">Select2 can take a regular select box with optgroup support for
                                better organization.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control select2" data-toggle="select2">
                                <option>Select</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Multiple Select Input -->
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <h5>Multiple Select Input</h5>
                            <p class="text-muted mb-0">Select2 multiple select with grouped options and placeholder.</p>
                        </div>
                        <div class="col-lg-6">
                            <select class="select2 form-control select2-multiple" data-placeholder="Choose ..."
                                data-toggle="select2" multiple="multiple">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/form-choice.js'])
    @vite(['resources/js/pages/form-select2.js'])
@endsection
