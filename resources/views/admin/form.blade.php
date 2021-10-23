@extends('admin.layouts.app')

@section('title', 'Form')

@section('content')
    <div class="page-header card" style="margin-top: 0px;margin-bottom: -11px;">
        <div class="row align-items-end">
            <div class="col-lg-0">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i> Dashboard</a>
                            <a href="{{route('form')}}"><i class="feather icon-doc"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Form</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Basic Form Inputs</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Basic Inputs</h4>
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Simple Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Placeholder</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       placeholder="Type your title in Placeholder">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control"
                                                       placeholder="Password input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Read only</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       placeholder="You can't change me" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Disable Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       placeholder="Disabled text" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Predefine
                                                Input</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       value="Enter yout content after me">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Box</label>
                                            <div class="col-sm-10">
                                                <select name="select" class="form-control">
                                                    <option value="opt1">Select One Value Only</option>
                                                    <option value="opt2">Type 2</option>
                                                    <option value="opt3">Type 3</option>
                                                    <option value="opt4">Type 4</option>
                                                    <option value="opt5">Type 5</option>
                                                    <option value="opt6">Type 6</option>
                                                    <option value="opt7">Type 7</option>
                                                    <option value="opt8">Type 8</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Round Input</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control form-control-round"
                                                       placeholder=".form-control-round">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Maximum
                                                Length</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       placeholder="Content must be in 6 characters"
                                                       maxlength="6">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Disable
                                                Autocomplete</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                       placeholder="Autocomplete Off"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Static Text</label>
                                            <div class="col-sm-10">
                                                <div class="form-control-static">Hello !... This is
                                                    static text
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Color</label>
                                            <div class="col-sm-10">
                                                <input type="color" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Textarea</label>
                                            <div class="col-sm-10">
                                                                                <textarea rows="5" cols="5" class="form-control"
                                                                                          placeholder="Default textarea"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="sub-title">Input Sizes</h4>
                                            <form>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text"
                                                               class="form-control form-control-lg"
                                                               placeholder=".form-control-lg">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control"
                                                               placeholder=".form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control form-control-sm"
                                                               placeholder=".form-control-sm">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 mobile-inputs">
                                            <h4 class="sub-title">Color Inputs</h4>
                                            <form>
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-primary"
                                                           placeholder=".form-control-primary">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-warning"
                                                               placeholder=".form-control-warning">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-default"
                                                               placeholder=".form-control-default">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-danger"
                                                               placeholder=".form-control-danger">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-success"
                                                               placeholder=".form-control-success">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-inverse"
                                                               placeholder=".form-control-inverse">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-control-info"
                                                               placeholder=".form-control-info">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mobile-inputs">
                                            <h4 class="sub-title">Text-color</h4>
                                            <form>
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-txt-primary"
                                                           placeholder=".form-txt-primary">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-warning"
                                                               placeholder=".form-txt-warning">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-default"
                                                               placeholder=".form-txt-default">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-danger"
                                                               placeholder=".form-txt-danger">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-success"
                                                               placeholder=".form-txt-success">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-inverse"
                                                               placeholder=".form-txt-inverse">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-txt-info"
                                                               placeholder=".form-txt-info">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-6 mobile-inputs">
                                            <h4 class="sub-title">Background-color</h4>
                                            <form>
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-bg-primary"
                                                           placeholder=".form-bg-primary">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-warning"
                                                               placeholder=".form-bg-warning">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-default"
                                                               placeholder=".form-bg-default">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-danger"
                                                               placeholder=".form-bg-danger">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-success"
                                                               placeholder=".form-bg-success">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-inverse"
                                                               placeholder=".form-bg-inverse">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                               class="form-control form-bg-info"
                                                               placeholder=".form-bg-info">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                            <!-- Switches card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Switches</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Single Switche</h4>
                                            <input type="checkbox" class="js-single" checked />
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Multiple Switches</h4>
                                            <input type="checkbox" class="js-switch" checked />
                                            <input type="checkbox" class="js-switch" checked />
                                            <input type="checkbox" class="js-switch" checked />
                                        </div>
                                        <div class="col-sm-12 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Enable Disable Switches</h4>
                                            <input type="checkbox" class="js-dynamic-state" checked />
                                            <button class="btn btn-primary js-dynamic-enable">Enable</button>
                                            <button class="btn btn-inverse js-dynamic-disable m-t-10">Disable</button>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h4 class="sub-title">Color Switches</h4>
                                            <input type="checkbox" class="js-default" checked />
                                            <input type="checkbox" class="js-primary" checked />
                                            <input type="checkbox" class="js-success" checked />
                                            <input type="checkbox" class="js-info" checked />
                                            <input type="checkbox" class="js-warning" checked />
                                            <input type="checkbox" class="js-danger" checked />
                                            <input type="checkbox" class="js-inverse" checked />
                                        </div>
                                        <div class="col-sm-4">
                                            <h4 class="sub-title">Switch Sizes</h4>
                                            <input type="checkbox" class="js-large" checked />
                                            <input type="checkbox" class="js-medium" checked />
                                            <input type="checkbox" class="js-small" checked />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Switches card end -->
                            <!-- Radio card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Radio</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Radio Fill Button</h4>
                                            <div class="form-radio">
                                                <form>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" checked="checked">
                                                            <i class="helper"></i>Radio 1
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio">
                                                            <i class="helper"></i>Radio 2
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline radio-disable">
                                                        <label>
                                                            <input type="radio" disabled="" name="radio">
                                                            <i class="helper"></i>Radio Disable
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Radio outline Button</h4>
                                            <div class="form-radio">
                                                <form>
                                                    <div class="radio radio-outline radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" checked="checked">
                                                            <i class="helper"></i>Radio 1
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-outline radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio">
                                                            <i class="helper"></i>Radio 2
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline radio-disable">
                                                        <label>
                                                            <input type="radio" disabled="" name="radio">
                                                            <i class="helper"></i>Radio Disable
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-xl-4 m-b-30">
                                            <h4 class="sub-title">Radio Button</h4>
                                            <div class="form-radio">
                                                <form>
                                                    <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio" checked="checked">
                                                            <i class="helper"></i>Radio-fill 1
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-inline">
                                                        <label>
                                                            <input type="radio" name="radio">
                                                            <i class="helper"></i>Radio-fill 2
                                                        </label>
                                                    </div>
                                                    <div class="radio radiofill radio-inline radio-disable">
                                                        <label>
                                                            <input type="radio" disabled="" name="radio">
                                                            <i class="helper"></i>Radio-fill Disable
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="sub-title">Color Radio Button</h4>
                                    <div class="form-radio m-b-30">
                                        <form>
                                            <div class="radio radiofill radio-default radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Default Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-primary radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Primary Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-success radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Success Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-info radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Info Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-warning radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Warning Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-danger radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Danger Color
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-inverse radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Inverse Color
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <h4 class="sub-title">Color Radio material Button</h4>
                                    <div class="form-radio m-b-30">
                                        <form>
                                            <div class="radio radio-matrial radio-default radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Default Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-primary radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Primary Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-success radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Success Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-info radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Info Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-warning radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Warning Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-danger radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Danger Color
                                                </label>
                                            </div>
                                            <div class="radio radio-matrial radio-inverse radio-inline">
                                                <label>
                                                    <input type="radio" name="radio" checked="checked">
                                                    <i class="helper"></i>Inverse Color
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Radio card end -->
                            <!-- Checkbox card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Checkbox</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                            <h4 class="sub-title">Border Checkbox</h4>
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-default">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox0">
                                                    <label class="border-checkbox-label" for="checkbox0">Do you like it?</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox1">
                                                    <label class="border-checkbox-label" for="checkbox1">Primary</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-success">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox2">
                                                    <label class="border-checkbox-label" for="checkbox2">Success</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-info">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox3">
                                                    <label class="border-checkbox-label" for="checkbox3">Info</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-warning">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox4">
                                                    <label class="border-checkbox-label" for="checkbox4">Warning</label>
                                                </div>
                                                <div class="border-checkbox-group border-checkbox-group-danger">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox5">
                                                    <label class="border-checkbox-label" for="checkbox5">Danger</label>
                                                </div>
                                                <div class="border-checkbox-group">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox6" disabled>
                                                    <label class="border-checkbox-label" for="checkbox6">Disabled</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                            <h4 class="sub-title">Fade-in Checkbox</h4>
                                            <div class="checkbox-fade fade-in-default">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                        </span>
                                                    <span>Default</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                        </span>
                                                    <span>Primary</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-warning">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                        </span>
                                                    <span> Warning</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-success">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                        </span>
                                                    <span>Success</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-info">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-info"></i>
                                        </span>
                                                    <span> Info</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-danger">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                        </span>
                                                    <span> Danger</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-fade fade-in-disable">
                                                <label>
                                                    <input type="checkbox" value="" disabled>
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check text-default"></i>
                                        </span>
                                                    <span>Disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                            <h4 class="sub-title">Color Checkbox</h4>
                                            <div class="checkbox-color checkbox-default">
                                                <input id="checkbox12" type="checkbox" checked="">
                                                <label for="checkbox12">
                                                    Default
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-primary">
                                                <input id="checkbox18" type="checkbox" checked="">
                                                <label for="checkbox18">
                                                    Primary
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-success">
                                                <input id="checkbox13" type="checkbox" checked="">
                                                <label for="checkbox13">
                                                    Success
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-info">
                                                <input id="checkbox14" type="checkbox" checked="">
                                                <label for="checkbox14">
                                                    Info
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-warning">
                                                <input id="checkbox15" type="checkbox" checked="">
                                                <label for="checkbox15">
                                                    Warning
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-danger">
                                                <input id="checkbox16" type="checkbox" checked="">
                                                <label for="checkbox16">
                                                    Danger
                                                </label>
                                            </div>
                                            <div class="checkbox-color checkbox-default">
                                                <input id="checkbox17" type="checkbox" disabled="">
                                                <label for="checkbox17">
                                                    Disabled
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xl-6 m-b-30">
                                            <h4 class="sub-title">zoom Checkbox</h4>
                                            <div class="checkbox-zoom zoom-default">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                        </span>
                                                    <span>Default</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-primary">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                        </span>
                                                    <span>Primary</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-warning">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-warning"></i>
                                        </span>
                                                    <span> Warning</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-success">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-success"></i>
                                        </span>
                                                    <span>Success</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-info">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-info"></i>
                                        </span>
                                                    <span> Info</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-danger">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check txt-danger"></i>
                                        </span>
                                                    <span> Danger</span>
                                                </label>
                                            </div>
                                            <div class="checkbox-zoom zoom-disable">
                                                <label>
                                                    <input type="checkbox" value="" disabled>
                                                    <span class="cr">
                                          <i class="cr-icon icofont icofont-ui-check text-default"></i>
                                        </span>
                                                    <span>Disabled</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkbox card end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
