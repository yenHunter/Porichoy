@extends('layouts.vertical', ['title' => 'Form Validation'])

@section('css')
@endsection

@section('content')
    @include('layouts.partials/page-title', ['subtitle' => 'Forms', 'title' => 'Validation'])


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Custom styles Validation</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate="">
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom01">First Name</label>
                            <input class="form-control" id="validationCustom01" required="" type="text"
                                value="John" />
                            <div class="valid-feedback">
                                Looks great!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustom02">Last Name</label>
                            <input class="form-control" id="validationCustom02" required="" type="text"
                                value="Doe" />
                            <div class="valid-feedback">
                                Looks great!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationCustomUsername">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input aria-describedby="inputGroupPrepend" class="form-control"
                                    id="validationCustomUsername" placeholder="johndoe123" required="" type="text" />
                                <div class="invalid-feedback">
                                    Please choose a valid username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationCustom03">City</label>
                            <input class="form-control" id="validationCustom03" placeholder="San Francisco" required=""
                                type="text" />
                            <div class="invalid-feedback">
                                Please provide a valid city name.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationCustom04">State</label>
                            <select class="form-select" id="validationCustom04" required="">
                                <option disabled="" selected="" value="">Choose...</option>
                                <option>California</option>
                                <option>Texas</option>
                                <option>New York</option>
                                <option>Florida</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select your state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationCustom05">Zip Code</label>
                            <input class="form-control" id="validationCustom05" placeholder="94107" required=""
                                type="text" />
                            <div class="invalid-feedback">
                                Please enter a valid zip code.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="invalidCheck" required="" type="checkbox"
                                    value="" />
                                <label class="form-check-label" for="invalidCheck">
                                    I agree to the terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit Form</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Tooltips</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate="">
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="studentFirstName">First Name</label>
                            <input class="form-control" id="studentFirstName" required="" type="text"
                                value="Emily" />
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="studentLastName">Last Name</label>
                            <input class="form-control" id="studentLastName" required="" type="text"
                                value="Chen" />
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="studentID">Stanford ID</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="studentIDPrepend">SU</span>
                                <input aria-describedby="studentIDPrepend" class="form-control" id="studentID"
                                    placeholder="SU1234567" required="" type="text" />
                                <div class="invalid-tooltip">
                                    Please enter a valid Stanford ID.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label class="form-label" for="studentCity">City</label>
                            <input class="form-control" id="studentCity" required="" type="text"
                                value="Palo Alto" />
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="studentDepartment">Department</label>
                            <select class="form-select" id="studentDepartment" required="">
                                <option disabled="" selected="" value="">Choose...</option>
                                <option>Computer Science</option>
                                <option>Engineering</option>
                                <option>Biology</option>
                                <option>Economics</option>
                                <option>Psychology</option>
                            </select>
                            <div class="invalid-tooltip">
                                Please select your department.
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label class="form-label" for="studentZip">ZIP Code</label>
                            <input class="form-control" id="studentZip" required="" type="text" value="94305" />
                            <div class="invalid-tooltip">
                                Please provide a valid ZIP code.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="agreementCheck" required="" type="checkbox"
                                    value="" />
                                <label class="form-check-label" for="agreementCheck">
                                    I confirm my enrollment at Stanford University.
                                </label>
                                <div class="invalid-tooltip">
                                    You must confirm before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-user-plus me-1"></i> Submit Enrollment
                            </button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Server-side </h4>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="validationServer01">First name</label>
                            <input class="form-control is-valid" id="validationServer01" required="" type="text"
                                value="Mark" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationServer02">Last name</label>
                            <input class="form-control is-valid" id="validationServer02" required="" type="text"
                                value="Otto" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationServerUsername">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                <input aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback"
                                    class="form-control is-invalid" id="validationServerUsername" required=""
                                    type="text" />
                                <div class="invalid-feedback" id="validationServerUsernameFeedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationServer03">City</label>
                            <input aria-describedby="validationServer03Feedback" class="form-control is-invalid"
                                id="validationServer03" required="" type="text" />
                            <div class="invalid-feedback" id="validationServer03Feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationServer04">State</label>
                            <select aria-describedby="validationServer04Feedback" class="form-select is-invalid"
                                id="validationServer04" required="">
                                <option disabled="" selected="" value="">Choose...</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback" id="validationServer04Feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationServer05">Zip</label>
                            <input aria-describedby="validationServer05Feedback" class="form-control is-invalid"
                                id="validationServer05" required="" type="text" />
                            <div class="invalid-feedback" id="validationServer05Feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input aria-describedby="invalidCheck3Feedback" class="form-check-input is-invalid"
                                    id="invalidCheck3" required="" type="checkbox" value="" />
                                <label class="form-check-label" for="invalidCheck3">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback" id="invalidCheck3Feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Supported Elements</h4>
                </div>
                <div class="card-body">
                    <form class="was-validated">
                        <div class="mb-3">
                            <label class="form-label" for="validationTextarea">Textarea</label>
                            <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" required=""></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="validationFormCheck1" required="" type="checkbox" />
                            <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
                            <div class="invalid-feedback">Example invalid feedback text</div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="validationFormCheck2" name="radio-stacked"
                                required="" type="radio" />
                            <label class="form-check-label" for="validationFormCheck2">Toggle this radio</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" id="validationFormCheck3" name="radio-stacked"
                                required="" type="radio" />
                            <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
                            <div class="invalid-feedback">More example invalid feedback text</div>
                        </div>
                        <div class="mb-3">
                            <select aria-label="select example" class="form-select" required="">
                                <option value="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <div class="invalid-feedback">Example invalid select feedback</div>
                        </div>
                        <div class="mb-3">
                            <input aria-label="file example" class="form-control" required="" type="file" />
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                        </div>
                        <div>
                            <button class="btn btn-primary" disabled="" type="submit">Submit form</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4 class="card-title">Browser Defaults</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" for="validationDefault01">First name</label>
                            <input class="form-control" id="validationDefault01" required="" type="text"
                                value="Mark" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationDefault02">Last name</label>
                            <input class="form-control" id="validationDefault02" required="" type="text"
                                value="Otto" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="validationDefaultUsername">Username</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input aria-describedby="inputGroupPrepend2" class="form-control"
                                    id="validationDefaultUsername" required="" type="text" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="validationDefault03">City</label>
                            <input class="form-control" id="validationDefault03" required="" type="text" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationDefault04">State</label>
                            <select class="form-select" id="validationDefault04" required="">
                                <option disabled="" selected="" value="">Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="validationDefault05">Zip</label>
                            <input class="form-control" id="validationDefault05" required="" type="text" />
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="invalidCheck2" required="" type="checkbox"
                                    value="" />
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row -->
@endsection

@section('scripts')
@endsection
