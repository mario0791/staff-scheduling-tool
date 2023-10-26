@extends('layouts.main')
@section('page-title')
    {{ __('Settings') }}
@endsection
@php
// $logo = asset(Storage::url('uploads/logo/'));
$logo=\App\Models\Utility::get_file('/');
$company_logo = \App\Models\Utility::getValByName('company_logo');
$company_dark_logo = \App\Models\Utility::getValByName('company_dark_logo');
$company_favicon = \App\Models\Utility::getValByName('company_favicon');
// $dark_logo=Utility::getValByName('dark_logo');
// $light_logo=Utility::getValByName('light_logo');
// $company_favicon=Utility::getValByName('company_favicon');
$lang = \App\Models\Utility::getValByName('default_language');
@endphp

@section('content')

    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Settings') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Settings') }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card sticky-top" style="top:30px">
                                <div class="list-group list-group-flush" id="useradd-sidenav">
                                    <a href="#Dashbord_Setting"
                                        class="list-group-item list-group-item-action active border-0">{{ __('Dashbord Settings') }}</a>


                                    <a href="#Site_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Site Settings') }}</a>

                                    <a href="#Company_setting"
                                        class="list-group-item list-group-item-action active border-0">{{ __('Company Settings') }}</a>

                                    <a href="#Zoom_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Zoom Settings') }}</a>


                                    <a href="#Slack_Setting"
                                        class="list-group-item list-group-item-action border-0">{{ __('Slack Settings') }}</a>


                                    <a href="#Telegram_Setting"
                                        class="list-group-item list-group-item-action border-0  ">{{ __('Telegram Settings') }}</a>

                                    

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div id="Dashbord_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Dashboard Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your dashboard settings') }}</small>
                                </div>
                                <div class="card-body">
                                    {{ Form::model($profile, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information']) }}
                                    {{ Form::hidden('employee_id', $profile->user_id) }}
                                    {{ Form::hidden('form_type', 'rotas_setting') }}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h5 class=" h6 mb-1">{{ __('Rota Settings') }}</h5>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_show_rotas_price', 1, !empty($company_setting['emp_show_rotas_price']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_show_rotas_price', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_show_rotas_price', __('Show employee rotas price'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_show_avatars_on_rota', 1, !empty($company_setting['emp_show_avatars_on_rota']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_show_avatars_on_rota', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_show_avatars_on_rota', __('Show employee avatars on rota'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_hide_rotas_hour', 1, !empty($company_setting['emp_hide_rotas_hour']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_hide_rotas_hour', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_hide_rotas_hour', __('Hide employee rotas hour'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('include_unpublished_shifts', 1, !empty($company_setting['include_unpublished_shifts']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'include_unpublished_shifts', 'role' => 'switch']) !!}
                                                {{ Form::label('include_unpublished_shifts', __('Include unpublished shifts on the dashboard and report'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_only_see_own_rota', 1, !empty($company_setting['emp_only_see_own_rota']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_only_see_own_rota', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_only_see_own_rota', __('Employees only see themselves on the rota'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-check form-switch d-inline-block mx-2">
                                                {!! Form::checkbox('emp_can_see_all_locations', 1, !empty($company_setting['emp_can_see_all_locations']) ? 1 : 0, ['required' => false, 'class' => 'custom-control-input form-check-input', 'id' => 'emp_can_see_all_locations', 'role' => 'switch']) !!}
                                                {{ Form::label('emp_can_see_all_locations', __('Employees can view the rotas of locations they are not assigned to'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Week Starts'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_week_start', ['monday' => __('Monday'), 'tuesday' => __('Tuesday'), 'wednesday' => __('Wednesday'), 'thursday' => __('Thursday'), 'friday' => __('Friday'), 'saturday' => __('Saturday'), 'sunday' => __('Sunday')], !empty($company_setting['company_week_start']) ? $company_setting['company_week_start'] : null, ['required' => true, 'data-placeholder' => __('Select Day'), 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Time Format'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_time_format', ['12' => '12 ' . __('Hour'), '24' => '24 ' . __('Hour')], !empty($company_setting['company_time_format']) ? $company_setting['company_time_format'] : null, ['required' => true, 'data-placeholder' => 'Yours Time Type', 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-2">
                                                    {{ Form::label('', __('Date Format'), ['class' => 'form-label text-dark h6']) }}
                                                    {!! Form::select('company_date_format', ['Y-m-d' => date('Y-m-d'), 'm-d-Y' => date('m-d-Y'), 'd-m-Y' => date('d-m-Y'), 'M j, Y' => date('M j, Y'), 'd M Y' => date('d M Y'), 'D d F Y' => date('D d F Y')], !empty($company_setting['company_date_format']) ? $company_setting['company_date_format'] : null, ['required' => true, 'data-placeholder' => __('Select Day'), 'class' => 'form-control js-single-select']) !!}
                                                </div>
                                                <div class="col-sm-4 col-md-3">
                                                    {{ Form::label('', __('Currency Symbol'), ['class' => 'form-label text-dark h6']) }}
                                                    {{ Form::text('company_currency_symbol', !empty($company_setting['company_currency_symbol']) ? $company_setting['company_currency_symbol'] : '$', ['class' => 'form-control']) }}
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    {{ Form::label('', __('Currency Positiuon'), ['class' => 'form-label text-dark h6']) }}
                                                    <br>
                                                    <div class="custom-control custom-radio d-inline-block mx-2">
                                                        <input type="radio" name="company_currency_symbol_position"
                                                            value="pre" class="form-check-input"
                                                            id="company_currency_symbol_pre"
                                                            {{ $company_setting['company_currency_symbol_position'] == 'pre' ? 'checked' : '' }}>
                                                        <label class="custom-label text-dark"
                                                            for="company_currency_symbol_pre">{{ __('Pre') }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio d-inline-block mx-2">
                                                        <input type="radio" name="company_currency_symbol_position"
                                                            value="post" class="form-check-input"
                                                            id="company_currency_symbol_post"
                                                            {{ $company_setting['company_currency_symbol_position'] == 'post' ? 'checked' : '' }}>
                                                        <label class="custom-label text-dark"
                                                            for="company_currency_symbol_post">{{ __('Post') }}</label>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            {{ Form::label('leave_year_start', __('Leave Year Starts'), ['class' => 'form-label text-dark h6']) }}
                                            {!! Form::select('leave_start_month', ['01' => __('January'), '02' => __('February'), '03' => __('March'), '04' => __('April'), '05' => __('May'), '06' => __('June'), '07' => __('July'), '08' => __('August'), '09' => __('September'), '10' => __('October'), '11' => __('November'), '12' => __('December')], !empty($company_setting['leave_start_month']) ? $company_setting['leave_start_month'] : 1, ['required' => true, 'data-placeholder' => __('Select Month'), 'class' => 'form-control js-single-select']) !!}
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-3 ">
                                            {{ Form::label('breck_paid', __('Break'), ['class' => 'form-label text-dark h6']) }}
                                            <br>
                                            <div class="custom-control custom-radio d-inline-block mx-2">
                                                <input type="radio" name="break_paid" value="paid" class="form-check-input"
                                                    {{ $company_setting['break_paid'] == 'paid' ? 'checked' : '' }}>
                                                <label class="custom-label text-dark">{{ __('Paid') }}</label>
                                            </div>

                                            <div class="custom-control custom-radio d-inline-block mx-2">
                                                <input type="radio" name="break_paid" value="unpaid"
                                                    class="form-check-input"
                                                    {{ $company_setting['break_paid'] == 'unpaid' ? 'checked' : '' }}>
                                                <label class="custom-label text-dark">{{ __('Unpaid') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            {{ Form::label('', __('Shift Notes'), ['class' => 'form-label text-dark h6']) }}
                                            {!! Form::select('see_note', ['none' => __('Only admins and managers can see shift notes'), 'self' => __('Employees can only see notes for their own shifts and open shifts'), 'all' => __('Employees can see shift notes for everybody')], !empty($company_setting['see_note']) ? $company_setting['see_note'] : null, ['required' => false, 'class' => 'form-control ']) !!}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h5 class=" h6 mb-1">{{ __('Availability Preferences') }}</h5>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="custom-control custom-checkbox d-inline-block mx-2">
                                                {!! Form::checkbox('employees_can_set_availability', 1, !empty($company_setting['employees_can_set_availability']) ? $company_setting['employees_can_set_availability'] : 0, ['required' => false, 'class' => 'form-check-input', 'id' => 'employees_can_set_availability']) !!}
                                                {{ Form::label('employees_can_set_availability', __('Employees can set their own availability preferences'), ['class' => 'custom-label text-dark']) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-end py-0 pe-2 border-0">
                                        <input name="from" type="hidden" value="password">
                                        <input name="from" type="hidden" value="password">
                                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Site_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Site Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your site settings') }}</small>
                                </div>
                                <div class="card-body">
                                
                                    {{ Form::model($settings, ['route' => ['setting.update', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                                    {{ Form::hidden('form_type', 'site_setting') }}
                                    <div class="row">
                                     {{-- Light Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Light Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="{{ $logo . 'uploads/logo/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png') }}" target="_blank">
                                                    <img src="{{ $logo . 'uploads/logo/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png') }}"
                                                    width="170px" class="img_setting" id="blah" style="width: 50%"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="company_logo" class="form-label choose-files bg-primary "><i
                                                        class="ti ti-upload px-1"></i>{{ __('Select Image') }}</label>
                                                <input type="file" name="company_logo" id="company_logo"
                                                    class="custom-input-file d-none" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                @error('company_logo')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Dark Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Dark Logo') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <div class="logo-div">
                                                        <a href="{{ $logo . 'uploads/logo/' . (isset($company_dark_logo) && !empty($company_dark_logo) ? $company_dark_logo : 'logo-dark.png') }}" target="_blank">
                                                        <img src="{{ $logo . 'uploads/logo/' . (isset($company_dark_logo) && !empty($company_dark_logo) ? $company_dark_logo : 'logo-dark.png') }}"
                                                            width="170px" class="" id="blah1" style="width: 50%"></a>
                                                    </div>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="company_dark_logo" class="form-label choose-files bg-primary "><i
                                                        class="ti ti-upload px-1"></i>{{ __('Select Image') }}</label>
                                                <input type="file" name="company_dark_logo" id="company_dark_logo"
                                                    class="custom-input-file d-none" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                @error('company_dark_logo')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Favicon Logo --}}
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>{{ __('Favicon') }}</h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <a href="{{ $logo .'uploads/logo/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" target="_blank">
                                                    <img src="{{ $logo .'uploads/logo/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}"

                                                    width="50px" class="" id="blah2" style="width: 25%"></a>
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="company_favicon" class="form-label choose-files bg-primary "><i
                                                        class="ti ti-upload px-1"></i>{{ __('Select Image') }}</label>
                                                <input type="file" name="company_favicon" id="company_favicon"
                                                    class="custom-input-file d-none" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                @error('company_favicon')
                                                    <div class="row">
                                                        <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        <div class="form-group col-md-4">
                                            {{ Form::label('title_text', __('Title Text'), ['class' => 'form-label text-dark h6']) }}
                                            {{ Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')]) }}
                                            @error('title_text')
                                                <span class="invalid-title_text" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-label text-dark h6']) }}
                                            {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                            @error('footer_text')
                                                <span class="invalid-footer_text" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <div class="form-group col-6 col-md-3">
                                            <div class="custom-control form-switch p-0">
                                                <label class="form-label text-dark"
                                                    for="SITE_RTL">{{ __('Enable RTL') }}</label><br>
                                                <input type="checkbox" class="form-check-input" data-toggle="switchbutton"
                                                    data-onstyle="primary" name="SITE_RTL" id="SITE_RTL"
                                                     {{ $settings['SITE_RTL'] == 'on' ? 'checked' : '' }} >
                                                     {{-- @dd( Utility::getValByName('SITE_RTL')) --}}
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="small-title">{{ __('Theme Customizer') }}</h4>
                                    @php
                                        $setting = App\Models\Utility::colorset();
                                        $color = 'theme-3';
                                        if (!empty($setting['color'])) {
                                            $color = $setting['color'];
                                        }
                                    @endphp
                                    <div class="setting-card setting-logo-box p-3">
                                        <div class="row">
                                            <div class="col-4 my-auto">
                                                <h6 class="mt-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-credit-card me-2">
                                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                                    </svg>
                                                    {{ __('Primary color settings') }}
                                                </h6>
                                                <hr class="my-2">
                                                <div class="theme-color themes-color">
                                                    <a href="#!"
                                                        class="{{ !empty($color) && $color == 'theme-1' ? 'active_color' : '' }}"
                                                        data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                    <input type="radio" class="theme_color d-none" name="color"
                                                        value="theme-1"
                                                        {{ !empty($color) && $color == 'theme-1' ? 'checked' : '' }}>
                                                    <a href="#!"
                                                        class="{{ !empty($color) && $color == 'theme-2' ? 'active_color' : '' }}"
                                                        data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                    <input type="radio" class="theme_color d-none" name="color"
                                                        value="theme-2"
                                                        {{ !empty($color) && $color == 'theme-2' ? 'checked' : '' }}>
                                                    <a href="#!"
                                                        class="{{ empty($color) || $color == 'theme-3' ? 'active_color' : '' }}"
                                                        data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                    <input type="radio" class="theme_color d-none" name="color"
                                                        value="theme-3"
                                                        {{ empty($color) || $color == 'theme-3' ? 'checked' : '' }}>
                                                    <a href="#!"
                                                        class="{{ !empty($color) && $color == 'theme-4' ? 'active_color' : '' }}"
                                                        data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                    <input type="radio" class="theme_color d-none" name="color"
                                                        value="theme-4"
                                                        {{ !empty($color) && $color == 'theme-4' ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-layout me-2">
                                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="3" y1="9" x2="21" y2="9"></line>
                                                        <line x1="9" y1="21" x2="9" y2="9"></line>
                                                    </svg>
                                                    {{ __('Sidebar settings') }}
                                                </h6>
                                                <hr class="my-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="cust-theme-bg"
                                                        name="cust_theme_bg"
                                                        {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }}>
                                                    <label class="form-label text-dark f-w-600 pl-1"
                                                        for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-4 my-auto">
                                                <h6>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-sun me-2">
                                                        <circle cx="12" cy="12" r="5"></circle>
                                                        <line x1="12" y1="1" x2="12" y2="3"></line>
                                                        <line x1="12" y1="21" x2="12" y2="23"></line>
                                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                                        <line x1="1" y1="12" x2="3" y2="12"></line>
                                                        <line x1="21" y1="12" x2="23" y2="12"></line>
                                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                                    </svg>
                                                    {{ __('Layout settings') }}
                                                </h6>
                                                <hr class="my-2">
                                                <div class="form-check form-switch mt-2">
                                                    <input type="checkbox" class="form-check-input" id="cust-darklayout"
                                                        name="cust_darklayout"
                                                        {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }}>
                                                    <label class="form-label text-dark f-w-600 pl-1"
                                                        for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end border-0 p-0">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>


                            <div id="Company_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Company Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your company details') }}</small>
                                </div>
                                <div class="card-body">
                                   
                                    {{ Form::model($settings, ['route' => ['setting.CompanySettings', $profile->id], 'method' => 'PUT', 'class' => 'permission_table_information', 'enctype' => 'multipart/form-data']) }}
                                    {{ Form::hidden('form_type', 'site_setting') }}
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            {{Form::label('company_email',__('System Email *'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('company_email',null,array('class'=>'form-control'))}}
                                            @error('company_email')
                                            <span class="invalid-company_email" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{Form::label('company_email_from_name',__('Email (From Name) *'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))}}
                                            @error('company_email_from_name')
                                            <span class="invalid-company_email_from_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            {{Form::label('contract_prefix',__('Contract Prefix'),array('class' => 'form-label text-dark')) }}
                                            {{Form::text('contract_prefix',null,array('class'=>'form-control'))}}
                                            @error('contract_prefix')
                                            <span class="invalid-contract_prefix" role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                       

                                      
                                    <div class="card-footer text-end border-0 p-0">
                                        <!-- <input class="btn btn-primary save_btn_signature" type="button" value="Save Changes"> -->
                                        <!-- <button class="">fvgfgvf</button> -->
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>


                            <div id="Zoom_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Zoom Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your zoom meetings') }}</small>
                                </div>
                                <div class="card-body">
                                    
                                    {{ Form::open(['url' => route('setting.ZoomSettings', $profile->id), 'enctype' => 'multipart/form-data']) }}
                                    
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="form-label h6">{{ __('API Key') }}</label>
                                                    <input type="text" name="zoom_api_key" class="form-control"
                                                        placeholder="Enter zoom API key"
                                                        value="{{ !empty($settings['zoom_api_key']) ? $settings['zoom_api_key'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label h6">{{ __('Secret Key') }}</label>
                                                <input type="text" name="zoom_secret_key" class="form-control"
                                                    placeholder="Enter zoom secret key"
                                                    value="{{ !empty($settings['zoom_secret_key']) ? $settings['zoom_secret_key'] : '' }}">
                                            </div>
                                        </div>
                                    
                                    <div class="card-footer border-0 p-0 text-end">
                                       
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Slack_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Slack Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your Slack settings') }}</small>
                                </div>
                                <div class="card-body">
                                    
                                    {{ Form::open(['route' => 'slack.setting', 'id' => 'slack-setting', 'method' => 'post', 'class' => 'd-contents']) }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="small-title">{{ __('Slack Webhook URL') }}</h4>
                                            <div class="col-md-8">
                                                {{ Form::text('slack_webhook', isset($settings['slack_webhook']) ? $settings['slack_webhook'] : '', ['class' => 'form-control w-100', 'placeholder' => __('Enter Slack Webhook URL'), 'required' => 'required']) }}
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-2">
                                            <h4 class="small-title">{{ __('Module Settings') }}</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_notification', '1', isset($settings['rotas_notification']) && $settings['rotas_notification'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_notification']) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Cancle Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_cancle_notificaation', '1', isset($settings['rotas_cancle_notificaation']) && $settings['rotas_cancle_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_cancle_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Rotas Time Change') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('rotas_time_change_notificaation', '1', isset($settings['rotas_time_change_notificaation']) && $settings['rotas_time_change_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'rotas_time_change_notificaation']) }}
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark"> {{ __('Days Off') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('days_off_notificaation', '1', isset($settings['days_off_notificaation']) && $settings['days_off_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'days_off_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Availability') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('availability_create_notificaation', '1', isset($settings['availability_create_notificaation']) && $settings['availability_create_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'availability_create_notificaation']) }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end border-0 p-0">
                                        <input class="btn btn-primary" type="submit" value="Save Chnages">
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            <div id="Telegram_Setting" class="card text-white">
                                <div class="card-header">
                                    <h5>{{ __('Telegram Settings') }}</h5>
                                    <small class="text-muted">{{ __('Edit your Telegram settings') }}</small>
                                </div>
                                <div class="card-body">
                                   
                                    {{ Form::open(['route' => 'telegram.setting', 'id' => 'telegram-setting', 'method' => 'post', 'class' => 'd-contents']) }}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('telegrambot', __('Telegram Access Token'), ['class' => 'form-label h6']) }}
                                                {{ Form::text('telegrambot', isset($settings['telegrambot']) ? $settings['telegrambot'] : '', ['class' => 'form-control active telegrambot', 'placeholder' => '1234567890:AAbbbbccccddddxvGENZCi8Hd4B15M8xHV0']) }}
                                                <p class="text-dark">{{ __('Get Chat ID') }} :
                                                    https://api.telegram.org/bot-TOKEN-/getUpdates</p>
                                                @if ($errors->has('telegrambot'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('telegrambot') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                {{ Form::label('telegramchatid', __('Telegram Chat Id'), ['class' => 'form-label h6']) }}
                                                {{ Form::text('telegramchatid', isset($settings['telegramchatid']) ? $settings['telegramchatid'] : '', ['class' => 'form-control active telegramchatid', 'placeholder' => '123456789']) }}
                                                @if ($errors->has('telegramchatid'))
                                                    <span class="invalid-feedback d-block">
                                                        {{ $errors->first('telegramchatid') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4 mb-2">
                                            <h4 class="small-title">{{ __('Module Settings') }}</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_notification', '1', isset($settings['telegram_rotas_notification']) && $settings['telegram_rotas_notification'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_notification']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_notification"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Cancle Rotas') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_cancle_notificaation', '1', isset($settings['telegram_rotas_cancle_notificaation']) && $settings['telegram_rotas_cancle_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_cancle_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_cancle_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('Rotas Time Change') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_rotas_time_change_notificaation', '1', isset($settings['telegram_rotas_time_change_notificaation']) && $settings['telegram_rotas_time_change_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_rotas_time_change_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_rotas_time_change_notificaation"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="text-dark"> {{ __('Days Off') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_days_off_notificaation', '1', isset($settings['telegram_days_off_notificaation']) && $settings['telegram_days_off_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_days_off_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_days_off_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="text-dark">{{ __('New Availability') }}</span>
                                                    <div class="form-check form-switch float-end">
                                                        {{ Form::checkbox('telegram_availability_create_notificaation', '1', isset($settings['telegram_availability_create_notificaation']) && $settings['telegram_availability_create_notificaation'] == '1' ? 'checked' : '', ['class' => 'form-check-input input-primary', 'id' => 'telegram_availability_create_notificaation']) }}
                                                        <label class="custom-control-label"
                                                            for="telegram_availability_create_notificaation"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end border-0 p-0">
                                        <input class="btn btn-primary" type="submit" value="Save Changes">
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- [ sample-page ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('pagescript')
    <script>
        function check_theme(color_val) {
            $('input[value="' + color_val + '"]').prop('checked', true);
        }
    </script>

<script>
    
    $(".list-group-item").click(function(){
        $('.list-group-item').filter(function(){
            return this.href == id;
        }).parent().removeClass('text-primary');
    });

    function check_theme(color_val) {
        $('#theme_color').prop('checked', false);
        $('input[value="' + color_val + '"]').prop('checked', true);
    }

    $(document).on('change','[name=storage_setting]',function(){
    if($(this).val() == 's3'){
        $('.s3-setting').removeClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').addClass('d-none');
    }else if($(this).val() == 'wasabi'){
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').removeClass('d-none');
        $('.local-setting').addClass('d-none');
    }else{
        $('.s3-setting').addClass('d-none');
        $('.wasabi-setting').addClass('d-none');
        $('.local-setting').removeClass('d-none');
    }
});
</script>
@endpush
