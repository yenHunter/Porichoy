@extends('layouts.vertical', ['title' => 'Other Plugins'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Other Plugins'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Form Inputmask</h4>
                    <p class="text-muted mb-0">
                        Inputmask is a javascript library that creates an input mask. Inputmask can run against vanilla
                        javascript, jQuery, and jqlite. (Hoverable Inputmask)
                    </p>
                </div>
                <div class="card-body">
                    <!-- Example 1: Date -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Date</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="00/00/0000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="00/00/0000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 2: Hour -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Hour</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code> <code>data-mask-format="00:00:00"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="00:00:00" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 3: Date & Hour -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Date &amp; Hour</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="00/00/0000 00:00:00"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="00/00/0000 00:00:00" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 4: ZIP Code -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>ZIP Code</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="00000-000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="00000-000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 5: Crazy ZIP Code -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Crazy ZIP Code</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="0-00-00-00"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="0-00-00-00" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 6: Money -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Money</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="000.000.000.000.000,00"</code>, <code>data-reverse="true"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="000.000.000.000.000,00" data-reverse="true"
                                data-toggle="input-mask" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 7: Money 2 -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Money 2</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="#.##0,00"</code>, <code>data-reverse="true"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="#.##0,00" data-reverse="true"
                                data-toggle="input-mask" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 8: Telephone -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Telephone</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="0000-0000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="0000-0000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 9: Telephone with Area Code -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>Telephone with Area Code</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="(00) 0000-0000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="(00) 0000-0000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 10: US Telephone -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>US Telephone</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="(000) 000-0000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="(000) 000-0000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 11: São Paulo Cellphones -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>São Paulo Cellphones</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="(00) 00000-0000"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="(00) 00000-0000" data-toggle="input-mask"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 12: CPF -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>CPF</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="000.000.000-00"</code>, <code>data-reverse="true"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="000.000.000-00" data-reverse="true"
                                data-toggle="input-mask" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 13: CNPJ -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>CNPJ</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="00.000.000/0000-00"</code>, <code>data-reverse="true"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="00.000.000/0000-00" data-reverse="true"
                                data-toggle="input-mask" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Example 14: IP Address -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5>IP Address</h5>
                            <p class="text-muted mb-0">
                                Add attribute <code>data-toggle="input-mask"</code>
                                <code>data-mask-format="099.099.099.099"</code>, <code>data-reverse="true"</code>
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" data-mask-format="099.099.099.099" data-reverse="true"
                                data-toggle="input-mask" type="text" />
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header d-block">
                    <h4 class="card-title mb-1">Typeahead</h4>
                    <p class="text-muted">
                        a flexible JavaScript library that provides a strong foundation for building robust typeaheads
                    </p>
                    <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                        <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"></button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Basic -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Basic</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control typeahead" placeholder="Enter states from USA"
                                type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Bloodhound -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">BloodHound (Suggestion Engine)</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control bloodhound-typeahead"
                                placeholder="Enter states from USA" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Prefetch -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Prefetch</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control prefetch-typeahead"
                                placeholder="Enter states from USA" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Default Suggestions -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Default Suggestions</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control default-suggestions-typeahead"
                                placeholder="Default Suggestions" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Custom Template -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Custom Template</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control custom-template-typeahead"
                                placeholder="Search For Oscar Winner" type="text" />
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <!-- Multiple Datasets -->
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Multiple Datasets</h5>
                        </div>
                        <div class="col-lg-6">
                            <input autocomplete="off" class="form-control multi-datasets-typeahead"
                                placeholder="NBA and NHL Teams" type="text" />
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h4 class="card-title">Input Touchspin</h4>
                    </div>
                    <span class="badge badge-soft-success badge-label py-1 fs-xxs">Exclusive</span>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Default Touchspin</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group" data-touchspin="">
                                <button class="btn btn-light floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="1" />
                                <button class="btn btn-light floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Sizes</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group input-group-sm" data-touchspin="">
                                <button class="btn btn-light floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control border-0" max="800000" type="number"
                                    value="0" />
                                <button class="btn btn-light floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group input-group-lg mt-2" data-touchspin="">
                                <button class="btn btn-light floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control border-0" max="800000" type="number"
                                    value="0" />
                                <button class="btn btn-light floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Colors</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group" data-touchspin="">
                                <button class="btn btn-primary floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-primary floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-secondary floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-secondary floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-info floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-info floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-success floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-success floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-warning floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-warning floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-danger floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-danger floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-dark floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-dark floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-purple floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-purple floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <button class="btn btn-soft-primary floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-soft-primary floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Readonly</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group" data-touchspin="">
                                <button class="btn btn-light floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" readonly=""
                                    type="number" value="1" />
                                <button class="btn btn-light floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Disabled</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group" data-touchspin="">
                                <button class="btn btn-light floating" data-minus="" disabled="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" disabled="" max="800000"
                                    type="number" value="1" />
                                <button class="btn btn-light floating" data-plus="" disabled="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Style</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group" data-touchspin="">
                                <button class="btn btn-primary rounded-circle floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-primary rounded-circle floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group rounded-pill mt-2" data-touchspin="">
                                <button class="btn btn-primary rounded-circle floating" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control form-control-sm border-0" max="800000" type="number"
                                    value="100" />
                                <button class="btn btn-primary rounded-circle floating" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group border-0 mt-2" data-touchspin="">
                                <button class="btn btn-outline-secondary" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control border-secondary" max="100" min="0"
                                    type="number" value="2" />
                                <button class="btn btn-outline-secondary" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                            <div class="input-group border-0 mt-2" data-touchspin="">
                                <button class="btn btn-soft-success" data-minus="" type="button"><i
                                        class="ti ti-minus"></i></button>
                                <input class="form-control border-success-subtle" max="100" min="0"
                                    type="number" value="2" />
                                <button class="btn btn-soft-success" data-plus="" type="button"><i
                                        class="ti ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 border-top border-dashed"></div>
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <h5 class="fw-semibold mb-1">Vertical Style</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group input-group-sm" data-touchspin="">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-soft-success" data-plus="" type="button"><i
                                            class="ti ti-plus"></i></button>
                                    <button class="btn btn-soft-danger" data-minus="" type="button"><i
                                            class="ti ti-minus"></i></button>
                                </div>
                                <input class="form-control border-0" max="10" min="0" type="number"
                                    value="1" />
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-success" data-plus="" type="button"><i
                                            class="ti ti-plus"></i></button>
                                    <button class="btn btn-danger" data-minus="" type="button"><i
                                            class="ti ti-minus"></i></button>
                                </div>
                                <input class="form-control border-0" max="10" min="0" type="number"
                                    value="1" />
                            </div>
                            <div class="input-group input-group-lg mt-2" data-touchspin="">
                                <div class="btn-group-vertical">
                                    <button class="btn btn-dark" data-plus="" type="button"><i
                                            class="ti ti-plus"></i></button>
                                    <button class="btn btn-dark" data-minus="" type="button"><i
                                            class="ti ti-minus"></i></button>
                                </div>
                                <input class="form-control border-0" max="10" min="0" type="number"
                                    value="1" />
                            </div>
                            <div class="input-group mt-2" data-touchspin="">
                                <input class="form-control border-0" max="10" min="0" type="number"
                                    value="1" />
                                <div class="btn-group-vertical">
                                    <button class="btn btn-dark" data-plus="" type="button"><i
                                            class="ti ti-plus"></i></button>
                                    <button class="btn btn-dark" data-minus="" type="button"><i
                                            class="ti ti-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
    @vite(['resources/js/pages/form-inputmask.js'])
    @vite(['resources/js/pages/form-typehead.js'])
@endsection
