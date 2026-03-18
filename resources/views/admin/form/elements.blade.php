@extends('layouts.vertical', ['title' => 'Form Elements'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Basic Elements'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Input Textfield Type</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Simple Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="simpleinput">Simple Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="simpleinput" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Floating Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="floatingInput">Floating Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating">
                                        <input class="form-control" id="floatingInput" placeholder="name" type="text" />
                                        <label>Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Validation Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="validInput">Valid Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control is-valid" id="validInput" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Placeholder -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-rounded">Rounded Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control rounded-pill" id="example-rounded"
                                        placeholder="Rounded Input" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Text Area -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-textarea">Text area</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Disabled -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-disable">Disabled</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" disabled="" id="example-disable" type="text"
                                        value="Disabled value" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Helping Text -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-helping">Helping text</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-helping" placeholder="Helping text"
                                        type="text" />
                                    <small class="form-text text-muted">
                                        A block of help text that breaks onto a new line and may extend beyond one line.
                                    </small>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Default select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Select with Icon</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="app-search">
                                        <select class="form-select form-control" id="discount">
                                            <option selected="">Choose Discount</option>
                                            <option value="No Discount">No Discount</option>
                                            <option value="Flat Discount">Flat Discount</option>
                                            <option value="Percentage Discount">Percentage Discount</option>
                                        </select>
                                        <i class="app-search-icon text-muted" data-lucide="percent"></i>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- with Label Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Label Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <div>
                                        <label class="form-label" for="labelInputInput1">Label Input</label>
                                        <input class="form-control" id="labelInputInput1" placeholder="name@example.com"
                                            type="email" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Search Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="SearchInput">Search Style</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="app-search">
                                        <input class="form-control" id="SearchInput"
                                            placeholder="Search for something..." type="search" />
                                        <i class="app-search-icon text-muted" data-lucide="search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Invalidation Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="inValidationInput">Invalid Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control is-invalid" id="inValidationInput" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Placeholder -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-placeholder">Placeholder</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-placeholder" placeholder="placeholder"
                                        type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Readonly -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-readonly">Readonly</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-readonly" readonly="" type="text"
                                        value="Readonly value" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Static Control -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-static">Static control</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control-plaintext" id="example-static" readonly=""
                                        type="text" value="email@example.com" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Default select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Default Select</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-select">
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Multiple Select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-multiselect">Multiple Select</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-control" id="example-multiselect" multiple="">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Input Types</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Email Input -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-email">Email</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-email" name="example-email"
                                        placeholder="Email" type="email" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Show/Hide Password -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="password">Show/Hide Password</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group" data-password="">
                                        <input class="form-control form-password" id="password"
                                            placeholder="Enter your password" type="password" />
                                        <button class="btn btn-light btn-icon" type="button">
                                            <i class="ti ti-eye password-eye-on"></i>
                                            <i class="ti ti-eye-closed d-none password-eye-off"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Time -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-time">Time</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-time" name="time" type="time" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Number -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-number">Number</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-number" name="number" type="number" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Range -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-range">Range</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-range" id="example-range" max="100" min="0"
                                        name="range" type="range" />
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- Password -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-password">Password</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-password" type="password"
                                        value="password" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Month -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-month">Month</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-month" name="month" type="month" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Week -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-week">Week</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-week" name="week" type="week" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Color -->
                            <div class="row g-lg-4 g-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-color">Color</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-color" name="color" type="color"
                                        value="#3a6c8f" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Input Group </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Basic Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Username</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input aria-describedby="basic-addon1" aria-label="Username" class="form-control"
                                            placeholder="Username" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Currency Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Amount</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input aria-label="Amount (to the nearest dollar)" class="form-control"
                                            type="text" />
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Textarea with Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Textarea</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text">With textarea</span>
                                        <textarea aria-label="With textarea" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Flex-nowrap Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Wrapping</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input aria-describedby="addon-wrapping" aria-label="Username"
                                            class="form-control" placeholder="Username" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Input group with text input and button -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Input + Button</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input aria-label="Recipient's username" class="form-control"
                                            placeholder="Recipient's username" type="text" />
                                        <button class="btn btn-dark" type="button">Button</button>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Multiple Files  -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="formFileMultiple01">Multiple Files</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="formFileMultiple01" multiple="" type="file" />
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- Email-like Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Recipient</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input aria-describedby="basic-addon2" aria-label="Recipient's username"
                                            class="form-control" placeholder="Recipient's username" type="text" />
                                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Multi-field Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Email Login</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Username" type="text" />
                                        <span class="input-group-text">@</span>
                                        <input class="form-control" placeholder="Server" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Vanity URL Input Group -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="basic-url">Vanity URL</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                        <input aria-describedby="basic-addon3" class="form-control" id="basic-url"
                                            type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Input group with dropdown and text input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Dropdown + Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                            type="button">
                                            Dropdown
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="!#">Action</a>
                                            <a class="dropdown-item" href="!#">Another action</a>
                                            <a class="dropdown-item" href="!#">Something else here</a>
                                        </div>
                                        <input aria-describedby="basic-addon1" aria-label="" class="form-control"
                                            placeholder="" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- File input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="inputGroupFile04">File Input</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="inputGroupFile04" type="file" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Input Group Select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="inputGroupSelect01">Input Group Select</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                        <select class="form-select" id="inputGroupSelect01">
                                            <option selected="">Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Floating Labels </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Floating Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Email address</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating">
                                        <input class="form-control" id="floatingInputEmail"
                                            placeholder="name@example.com" type="email" />
                                        <label for="floatingInputEmail">Email address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Floating Textarea -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="floatingTextarea">Comments</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" placeholder="Leave a comment here" style="height: 100px"></textarea>
                                        <label for="floatingTextarea">Comments</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- Floating Password -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="floatingPassword">Password</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating">
                                        <input class="form-control" id="floatingPassword" placeholder="Password"
                                            type="password" />
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Floating Select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="floatingSelect">Select Menu</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-floating">
                                        <select aria-label="Floating label select example" class="form-select"
                                            id="floatingSelect">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Input Sizes </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Small Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-input-small">Small</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control form-control-sm" id="example-input-small"
                                        name="example-input-small" placeholder=".input-sm" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Large Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-input-large">Large</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control form-control-lg" id="example-input-large"
                                        name="example-input-large" placeholder=".input-lg" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Large Select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Large Select</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-select form-select-lg">
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- Normal Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-input-normal">Normal</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" id="example-input-normal" name="example-input-normal"
                                        placeholder="Normal" type="text" />
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Grid Size Input -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label" for="example-gridsize">Grid Sizes</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input class="form-control" id="example-gridsize" placeholder=".col-sm-4"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Small Select -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Small Select</label>
                                </div>
                                <div class="col-lg-8">
                                    <select class="form-select form-select-sm">
                                        <option selected="">Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Checks, Radios and Switches </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Default Checkboxes -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Checkboxes</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkDefault" type="checkbox" />
                                        <label class="form-check-label" for="checkDefault">Default Checkbox</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input form-check-input-light" id="checkLight"
                                            type="checkbox" />
                                        <label class="form-check-label" for="checkLight">Light Checkbox</label>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check form-check-inline">
                                            <input checked="" class="form-check-input" id="checkInline1"
                                                type="checkbox" />
                                            <label class="form-check-label" for="checkInline1">Inline 1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="checkInline2" type="checkbox" />
                                            <label class="form-check-label" for="checkInline2">Inline 2</label>
                                        </div>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkIndeterminate" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="checkIndeterminate">
                                            Disabled indeterminate checkbox
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input checked="" class="form-check-input" disabled=""
                                            id="checkCheckedDisabled" type="checkbox" value="" />
                                        <label class="form-check-label" for="checkCheckedDisabled">
                                            Disabled checked checkbox
                                        </label>
                                    </div>
                                    <h5 class="mt-3">Sizes</h5>
                                    <div class="form-check fs-lg mb-2">
                                        <input checked="" class="form-check-input mt-1" id="checkSize1"
                                            type="checkbox" />
                                        <label class="form-check-label fs-base" for="checkSize1">I'm 16px Checkbox</label>
                                    </div>
                                    <div class="form-check form-check-secondary fs-xxl mb-2">
                                        <input checked="" class="form-check-input mt-1" id="checkSize2"
                                            type="checkbox" />
                                        <label class="form-check-label fs-base" for="checkSize2">i'm 20px Checkbox</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Switches -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Switches</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-check form-switch mb-2">
                                        <input checked="" class="form-check-input" id="switch1" type="checkbox" />
                                        <label class="form-check-label" for="switch1">Enabled Switch</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" disabled="" id="switch2" type="checkbox" />
                                        <label class="form-check-label" for="switch2">Disabled Switch</label>
                                    </div>
                                    <h5 class="mt-3">Sizes</h5>
                                    <div class="form-check form-switch fs-lg mb-2">
                                        <input checked="" class="form-check-input mt-1" id="checkboxSize16"
                                            type="checkbox" />
                                        <label class="form-check-label fs-base" for="checkboxSize16">I'm 16px
                                            Switch</label>
                                    </div>
                                    <div class="form-check form-switch form-check-secondary fs-xxl mb-2">
                                        <input checked="" class="form-check-input mt-1" id="checkboxSize20"
                                            type="checkbox" />
                                        <label class="form-check-label fs-base" for="checkboxSize20">I'm 20px
                                            Switch</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Colored Checkboxes -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Colored Checkboxes</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex flex-wrap gap-4">
                                        <div>
                                            <div class="form-check form-check-primary mb-2">
                                                <input checked="" class="form-check-input" id="checkPrimary"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkPrimary">Primary</label>
                                            </div>
                                            <div class="form-check form-check-secondary mb-2">
                                                <input checked="" class="form-check-input" id="checkSecondary"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkSecondary">Secondary</label>
                                            </div>
                                            <div class="form-check form-check-success mb-2">
                                                <input checked="" class="form-check-input" id="checkSuccess"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkSuccess">Success</label>
                                            </div>
                                            <div class="form-check form-check-info mb-2">
                                                <input checked="" class="form-check-input" id="checkInfo"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkInfo">Info</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-check form-check-warning mb-2">
                                                <input checked="" class="form-check-input" id="checkWarning"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkWarning">Warning</label>
                                            </div>
                                            <div class="form-check form-check-danger mb-2">
                                                <input checked="" class="form-check-input" id="checkDanger"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkDanger">Danger</label>
                                            </div>
                                            <div class="form-check form-check-dark">
                                                <input checked="" class="form-check-input" id="checkDark"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="checkDark">Dark</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Colored Checkboxes -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Colored Switches</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex flex-wrap gap-4">
                                        <div>
                                            <div class="form-check form-check-primary form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchPrimary"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchPrimary">Primary</label>
                                            </div>
                                            <div class="form-check form-check-secondary form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchSecondary"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchSecondary">Secondary</label>
                                            </div>
                                            <div class="form-check form-check-success form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchSuccess"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchSuccess">Success</label>
                                            </div>
                                            <div class="form-check form-check-info form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchInfo"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchInfo">Info</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-check form-check-warning form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchWarning"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchWarning">Warning</label>
                                            </div>
                                            <div class="form-check form-check-danger form-switch mb-2">
                                                <input checked="" class="form-check-input" id="switchDanger"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchDanger">Danger</label>
                                            </div>
                                            <div class="form-check form-check-dark form-switch">
                                                <input checked="" class="form-check-input" id="switchDark"
                                                    type="checkbox" />
                                                <label class="form-check-label" for="switchDark">Dark</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <!-- Default Radios -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Radios</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-check mb-2">
                                        <input checked="" class="form-check-input" id="radio1" name="gridRadio"
                                            type="radio" />
                                        <label class="form-check-label" for="radio1">Option 1</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="radio2" name="gridRadio"
                                            type="radio" />
                                        <label class="form-check-label" for="radio2">Option 2</label>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check form-check-inline">
                                            <input checked="" class="form-check-input" id="inlineRadio1"
                                                name="inlineRadioOptions" type="radio" value="option1" />
                                            <label class="form-check-label" for="inlineRadio1">Inline 1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="inlineRadio2" name="inlineRadioOptions"
                                                type="radio" value="option2" />
                                            <label class="form-check-label" for="inlineRadio2">Inline 2</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input checked="" class="form-check-input" disabled="" id="inlineRadio3"
                                            name="disabledRadioOptions" type="radio" value="option3" />
                                        <label class="form-check-label" for="inlineRadio3">Disabled Checked Radio</label>
                                    </div>
                                    <h5 class="mt-3">Sizes</h5>
                                    <div class="mb-2">
                                        <div class="form-check fs-lg form-check-inline">
                                            <input checked="" class="form-check-input" id="radioCash"
                                                name="paymentMethod" type="radio" value="cash" />
                                            <label class="form-check-label fs-base" for="radioCash">Cash</label>
                                        </div>
                                        <div class="form-check fs-lg form-check-inline">
                                            <input class="form-check-input" id="radioCard" name="paymentMethod"
                                                type="radio" value="card" />
                                            <label class="form-check-label fs-base" for="radioCard">Card</label>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="form-check fs-xxl form-check-inline">
                                            <input checked="" class="form-check-input" id="radioPickup"
                                                name="deliveryOption" type="radio" value="pickup" />
                                            <label class="form-check-label fs-base" for="radioPickup">Pickup</label>
                                        </div>
                                        <div class="form-check fs-xxl form-check-inline">
                                            <input class="form-check-input" id="radioHome" name="deliveryOption"
                                                type="radio" value="home" />
                                            <label class="form-check-label fs-base" for="radioHome">Home Delivery</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Reverse -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Reverse</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="w-lg-50">
                                        <div class="form-check form-check-reverse mb-2">
                                            <input checked="" class="form-check-input" id="reverseCheck1"
                                                type="checkbox" value="" />
                                            <label class="form-check-label" for="reverseCheck1">
                                                Reverse checkbox
                                            </label>
                                        </div>
                                        <div class="form-check form-check-reverse mb-2">
                                            <input class="form-check-input" id="reverseCheck2" type="radio"
                                                value="" />
                                            <label class="form-check-label" for="reverseCheck2">
                                                Disabled reverse radio
                                            </label>
                                        </div>
                                        <div class="form-check form-switch form-check-reverse">
                                            <input checked="" class="form-check-input" id="switchCheckReverse"
                                                type="checkbox" />
                                            <label class="form-check-label" for="switchCheckReverse">Reverse switch
                                                checkbox input</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Colored Radios -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Colored Radios</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex flex-wrap gap-4">
                                        <div>
                                            <div class="form-check form-check-primary mb-2">
                                                <input checked="" class="form-check-input" id="radioPrimary"
                                                    name="radioPrimary" type="radio" />
                                                <label class="form-check-label" for="radioPrimary">Primary</label>
                                            </div>
                                            <div class="form-check form-check-secondary mb-2">
                                                <input checked="" class="form-check-input" id="radioSecondary"
                                                    name="radioSecondary" type="radio" />
                                                <label class="form-check-label" for="radioSecondary">Secondary</label>
                                            </div>
                                            <div class="form-check form-check-success mb-2">
                                                <input checked="" class="form-check-input" id="radioSuccess"
                                                    name="radioSuccess" type="radio" />
                                                <label class="form-check-label" for="radioSuccess">Success</label>
                                            </div>
                                            <div class="form-check form-check-info mb-2">
                                                <input checked="" class="form-check-input" id="radioInfo"
                                                    name="radioInfo" type="radio" />
                                                <label class="form-check-label" for="radioInfo">Info</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-check form-check-warning mb-2">
                                                <input checked="" class="form-check-input" id="radioWarning"
                                                    name="radioWarning" type="radio" />
                                                <label class="form-check-label" for="radioWarning">Warning</label>
                                            </div>
                                            <div class="form-check form-check-danger mb-2">
                                                <input checked="" class="form-check-input" id="radioDanger"
                                                    name="radioDanger" type="radio" />
                                                <label class="form-check-label" for="radioDanger">Danger</label>
                                            </div>
                                            <div class="form-check form-check-dark">
                                                <input checked="" class="form-check-input" id="radioDark"
                                                    name="radioDark" type="radio" />
                                                <label class="form-check-label" for="radioDark">Dark</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Toggle Checkboxes -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Checkbox Toggle</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="mb-2">
                                        <input class="btn-check" id="btncheck1" type="checkbox" />
                                        <label class="btn btn-outline-primary" for="btncheck1">Single Toggle</label>
                                    </div>
                                    <div aria-label="Checkbox toggle group" class="btn-group" role="group">
                                        <input class="btn-check" id="btncheck2" type="checkbox" />
                                        <label class="btn btn-outline-primary" for="btncheck2">One</label>
                                        <input class="btn-check" id="btncheck3" type="checkbox" />
                                        <label class="btn btn-outline-primary" for="btncheck3">Two</label>
                                        <input class="btn-check" id="btncheck4" type="checkbox" />
                                        <label class="btn btn-outline-primary" for="btncheck4">Three</label>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed my-3"></div>
                            <!-- Toggle Radios -->
                            <div class="row g-lg-4 g-2">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Radio Toggle</label>
                                </div>
                                <div class="col-lg-8">
                                    <div aria-label="Radio toggle group" class="btn-group" role="group">
                                        <input checked="" class="btn-check" id="btnradio1" name="btnradio"
                                            type="radio" />
                                        <label class="btn btn-outline-secondary" for="btnradio1">Left</label>
                                        <input class="btn-check" id="btnradio2" name="btnradio" type="radio" />
                                        <label class="btn btn-outline-secondary" for="btnradio2">Middle</label>
                                        <input class="btn-check" id="btnradio3" name="btnradio" type="radio" />
                                        <label class="btn btn-outline-secondary" for="btnradio3">Right</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
