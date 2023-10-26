@extends('layouts.main')
@php
$dir = asset(Storage::url('uploads/plan'));
$dir_payment = asset(Storage::url('uploads/payments'));
@endphp

@section('page-title')
    {{ __('Order Summary') }}
@endsection
@section('content')
    <div class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Order Summary') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Order Summary') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card sticky-top" style="top:30px">
                                <div class="list-group list-group-flush" id="useradd-sidenav">
                                    @if ($admin_payment_setting['is_stripe_enabled'] == 'on' && !empty($admin_payment_setting['stripe_key']) && !empty($admin_payment_setting['stripe_secret']))
                                        <a href="#useradd-1" class="list-group-item list-group-item-action active border-0">
                                            {{ __('Stripe') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if ($admin_payment_setting['is_paypal_enabled'] == 'on' && !empty($admin_payment_setting['paypal_client_id']) && !empty($admin_payment_setting['paypal_secret_key']))
                                        <a href="#useradd-2" class="list-group-item list-group-item-action border-0">
                                            {{ __('Paypal') }} <div class="float-end"><i class="ti ti-chevron-right"></i>
                                            </div>
                                        </a>
                                    @endif
                                    @if ( !empty($admin_payment_setting['paystack_public_key']) && !empty($admin_payment_setting['paystack_secret_key']))
                                        <a href="#useradd-3" class="list-group-item list-group-item-action border-0">
                                            {{ __('Paystack') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                                        <a href="#useradd-4" class="list-group-item list-group-item-action border-0">
                                            {{ __('Flutterwave') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                                        <a href="#useradd-5" class="list-group-item list-group-item-action border-0">
                                            {{ __('Razorpay') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                                        <a href="#useradd-6" class="list-group-item list-group-item-action border-0">
                                            {{ __('Mercado Pago') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                                        <a href="#useradd-7" class="list-group-item list-group-item-action border-0">
                                            {{ __('Paytm') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                                        <a href="#useradd-8" class="list-group-item list-group-item-action border-0">
                                            {{ __('Mollie') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                                        <a href="#useradd-9" class="list-group-item list-group-item-action border-0">
                                            {{ __('Skrill') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                    @if (isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                                            <a href="#useradd-10" class="list-group-item list-group-item-action border-0">
                                                {{ __('Coingate') }}
                                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                            </a>
                                        @endif
                                    @if (isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on')
                                        <a href="#useradd-11" class="list-group-item list-group-item-action border-0">
                                            {{ __('PaymentWall') }}
                                            <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9">
                            <div id="useradd-1" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Credit / Debit Card') }}</h5>
                                    <small
                                        class="text-muted">{{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.') }}</small>
                                </div>
                                <div class="card-body">
                                    @if ($admin_payment_setting['is_stripe_enabled'] == 'on' && !empty($admin_payment_setting['stripe_key']) && !empty($admin_payment_setting['stripe_secret']))
                                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                                            class="require-validation" id="payment-form">
                                            @csrf
                                            <div class="border p-3 mb-3 rounded stripe-payment-div">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="card-name-on"
                                                                class="form-label">{{ __('Name on card') }}</label>
                                                            <input type="text" name="name" id="card-name-on"
                                                                class="form-control required"
                                                                placeholder="{{ \Auth::user()->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div id="card-element"></div>
                                                        <div id="card-errors" role="alert"></div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="form-label" for="stripe_coupon"
                                                                class="form-label">{{ __('Coupon') }}</label>
                                                            <input type="text" id="stripe_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-stripe-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary coupon-apply-btn apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="error" style="display: none;">
                                                            <div class='alert-danger alert'>
                                                                {{ __('Please correct the errors and try again.') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-footer text-end py-0 pe-2 border-0">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button type="submit"
                                                            class="btn btn-primary">{{ __('Pay Now') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-2" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Paypal') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if ($admin_payment_setting['is_paypal_enabled'] == 'on' && !empty($admin_payment_setting['paypal_client_id']) && !empty($admin_payment_setting['paypal_secret_key']))
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                    id="payment-form" action="{{ route('plan.pay.with.paypal') }}">
                                    @csrf
                                    <input type="hidden" name="plan_id"
                                   
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <button class="btn btn-primary " type="submit">{{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-3" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Paystack') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if ( !empty($admin_payment_setting['paystack_public_key']) && !empty($admin_payment_setting['paystack_secret_key']))
                                        <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                            id="paystack-payment-form" action="{{ route('plan.pay.with.paystack') }}">
                                            @csrf
                                            <input type="hidden" name="plan_id"
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input type="button" id="pay_with_paystack" value="{{ __('Pay Now') }}"
                                                    class=" btn btn-primary">

                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-4" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Flutterwave') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                                        <form role="form" action="{{ route('plan.pay.with.flaterwave') }}" method="post"
                                            class="require-validation" id="flaterwave-payment-form">
                                            @csrf
                                            <input type="hidden" name="plan_id"
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input type="button" id="pay_with_flaterwave" value="{{ __('Pay Now') }}"
                                                    class="btn btn-primary">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-5" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Razorpay') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                                        <form role="form" action="{{ route('plan.pay.with.razorpay') }}" method="post"
                                            class="require-validation" id="razorpay-payment-form">
                                            @csrf
                                            <input type="hidden" name="plan_id"
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input type="button" id="pay_with_razorpay" value="{{ __('Pay Now') }}"
                                                    class="btn btn-primary">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-6" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Mercado Pago') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                                        <form role="form" action="{{ route('plan.pay.with.mercado') }}" method="post"
                                            class="require-validation" id="mercado-payment-form">
                                            @csrf
                                            <input type="hidden" name="plan_id"
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paypal_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}"
                                                    class="btn btn-primary">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-7" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Paytm') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                                        <form role="form" action="{{ route('plan.pay.with.paytm') }}" method="post"
                                            class="require-validation" id="paytm-payment-form">
                                            @csrf
                                            <input type="hidden" name="plan_id"
                                                value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                            <div class="border p-3 mb-3 rounded payment-box">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" class="form-control-label"
                                                                for="paytm_coupon">{{ __('Coupon') }}</label>
                                                            <input type="text" id="paytm_coupon" name="coupon"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Coupon Code') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 coupon-apply-btn">
                                                        <div class="form-group apply-paypal-btn-coupon">
                                                            <a href="#"
                                                                class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="form-label" class="form-control-label"
                                                                for="paytm_m_no">{{ __('Mobile Number') }}</label>
                                                            <input type="text" id="mobile" name="mobile"
                                                                class="form-control coupon"
                                                                placeholder="{{ __('Enter Mobile Number') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-end py-0 pe-2 border-0">
                                                <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}"
                                                    class="btn btn-primary">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-8" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Mollie') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                                    <form role="form" action="{{ route('plan.pay.with.mollie') }}" method="post" class="require-validation" id="mollie-payment-form">
                                        @csrf
                                        <input type="hidden" name="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                        <input type="text" id="paypal_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 coupon-apply-btn">
                                                    <div class="form-group apply-paypal-btn-coupon">
                                                        <a href="#"
                                                            class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}" class="btn btn-primary">
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-9" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using skrill') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                                    <form role="form" action="{{ route('plan.pay.with.skrill') }}" method="post" class="require-validation" id="skrill-payment-form">
                                        @csrf
                                        <input type="hidden" name="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                        <input type="text" id="paypal_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 coupon-apply-btn">
                                                    <div class="form-group apply-paypal-btn-coupon">
                                                        <a href="#"
                                                            class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}" class="btn btn-primary">
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-10" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using Coingate') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                                    <form role="form" action="{{ route('plan.pay.with.coingate') }}" method="post" class="require-validation" id="coingate-payment-form">
                                        @csrf
                                        <input type="hidden" name="plan_id"
                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                        <div class="border p-3 mb-3 rounded payment-box">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                        <input type="text" id="paypal_coupon" name="coupon"
                                                            class="form-control coupon"
                                                            placeholder="{{ __('Enter Coupon Code') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 coupon-apply-btn">
                                                    <div class="form-group apply-paypal-btn-coupon">
                                                        <a href="#"
                                                            class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end py-0 pe-2 border-0">
                                            <input type="submit" id="pay_with_mercado" value="{{ __('Pay Now') }}" class="btn btn-primary">
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>

                            <div id="useradd-11" class="card">
                                <div class="card-header">
                                    <h5>{{ __('Pay Using PaymentWall') }}</h5>
                                </div>
                                <div class="card-body">
                                    @if ($admin_payment_setting['is_paymentwall_enabled'] == 'on' && !empty($admin_payment_setting['paymentwall_public_key']) && !empty($admin_payment_setting['paymentwall_secret_key']))
                                    <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                    id="paymentwall-payment-form" action="{{ route('plan.paymentwallpayment') }}">
                                    @csrf
                                    <input type="hidden" name="plan_id"
                                        value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">

                                    <div class="border p-3 mb-3 rounded payment-box">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label class="form-label" for="paypal_coupon">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paypal_coupon" name="coupon" class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 coupon-apply-btn">
                                                <div class="form-group apply-paypal-btn-coupon">
                                                    <a href="#" class="btn btn-primary apply-coupon btn-sm">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end py-0 pe-2 border-0">
                                        <input type="submit" id="pay_with_paymentwall" value="{{ __('Pay Now') }}" class="btn btn-primary">
                                    </div>
                                </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- [ sample-page ] end -->
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
@endsection


@push('pagescript')

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>


    <script type="text/javascript">
        @if ($plan->price > 0.0 && $admin_payment_setting['is_stripe_enabled'] == 'on' && !empty($admin_payment_setting['stripe_key']) && !empty($admin_payment_setting['stripe_secret']))
            var stripe = Stripe('{{ $admin_payment_setting['stripe_key'] }}');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
            base: {
            // Add your base input styles here. For example:
            fontSize: '14px',
            color: '#32325d',
            },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Create a token or display an error when the form is submitted.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function (event) {
                event.preventDefault();
                   
                stripe.createToken(card).then(function (result) {
                if (result.error) {
                $("#card-errors").html(result.error.message);
                toastrs('Error', result.error.message, 'error');
                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
                });
                });
               
                function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
                }

        @endif

        $(document).ready(function() {
            $(document).on('click', '.apply-coupon', function() {

                var ele = $(this);

                var coupon = ele.closest('.row').find('.coupon').val();

                $.ajax({
                    url: '{{ route('apply.coupon') }}',
                    datType: 'json',
                    data: {
                        plan_id: '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}',
                        coupon: coupon
                    },
                    success: function(data) {

                        if (data != '') {
                            $('.final-price').text(data.final_price);
                            $('#stripe_coupon, #paypal_coupon').val(coupon);

                            if (data.is_success) {
                                show_toastr('Success', data.message, 'success');
                            } else {
                                show_toastr('Error', data.message, 'error');
                            }
                        } else {
                            show_toastr('Error', "{{ __('Coupon code required.') }}",
                                'error');
                        }
                    }
                })
            });
        });

        $(document).on("click", "#pay_with_paystack", function() {
            $('#paystack-payment-form').ajaxForm(function(res) {
                if (res.flag == 1) {
                    var paystack_callback = "{{ url('/plan/paystack') }}";
                    var order_id = '{{ time() }}';
                    var coupon_id = res.coupon;
                    var handler = PaystackPop.setup({
                        key: '{{ $admin_payment_setting['paystack_public_key'] }}',
                        email: res.email,
                        amount: res.total_price * 100,
                        currency: res.currency,
                        ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                            1
                        ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                        metadata: {
                            custom_fields: [{
                                display_name: "Email",
                                variable_name: "email",
                                value: res.email,
                            }]
                        },

                        callback: function(response) {
                            console.log(response.reference, order_id);
                            window.location.href = paystack_callback + '/' + response
                                .reference + '/' + '{{ encrypt($plan->id) }}' +
                                '?coupon_id=' +
                                coupon_id
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                } else if (res.flag == 2) {

                } else {
                    show_toastr('Error', data.message, 'msg');
                }

            }).submit();
        });

        // //    Flaterwave Payment
        $(document).on("click", "#pay_with_flaterwave", function() {
            $('#flaterwave-payment-form').ajaxForm(function(res) {
                if (res.flag == 1) {
                    var coupon_id = res.coupon;
                    var API_publicKey = '{{ $admin_payment_setting['flutterwave_public_key'] }}';
                    var nowTim = "{{ date('d-m-Y-h-i-a') }}";
                    var flutter_callback = "{{ url('/plan/flaterwave') }}";
                    var x = getpaidSetup({
                        PBFPubKey: API_publicKey,
                        customer_email: '{{ Auth::user()->email }}',
                        amount: res.total_price,
                        currency: '{{ env('CURRENCY') }}',
                        txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) +
                            'fluttpay_online-' + {{ date('Y-m-d') }},
                        meta: [{
                            metaname: "payment_id",
                            metavalue: "id"
                        }],
                        onclose: function() {},
                        callback: function(response) {
                            var txref = response.tx.txRef;
                            if (
                                response.tx.chargeResponseCode == "00" ||
                                response.tx.chargeResponseCode == "0"
                            ) {
                                window.location.href = flutter_callback + '/' + txref + '/' +
                                    '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                    coupon_id;
                            } else {
                                // redirect to a failure page.
                            }
                            x.close(); // use this to close the modal immediately after payment.
                        }
                    });
                } else if (res.flag == 2) {

                } else {
                    show_toastr('Error', data.message, 'msg');
                }

            }).submit();
        });

        // // Razorpay Payment
        $(document).on("click", "#pay_with_razorpay", function() {
            $('#razorpay-payment-form').ajaxForm(function(res) {
                if (res.flag == 1) {

                    var razorPay_callback = '{{ url('/plan/razorpay') }}';
                    var totalAmount = res.total_price * 100;
                    var coupon_id = res.coupon;
                    var options = {
                        "key": "{{ $admin_payment_setting['razorpay_public_key'] }}", // your Razorpay Key Id
                        "amount": totalAmount,
                        "name": 'Plan',
                        "currency": '{{ env('CURRENCY') }}',
                        "description": "",
                        "handler": function(response) {
                            window.location.href = razorPay_callback + '/' + response
                                .razorpay_payment_id + '/' +
                                '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                coupon_id;
                        },
                        "theme": {
                            "color": "#528FF0"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                } else if (res.flag == 2) {

                } else {
                    show_toastr('Error', data.message, 'msg');
                }

            }).submit();
        });

    </script>


    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        @if ($plan->price > 0.0 && env('ENABLE_STRIPE') == 'on' && !empty(env('STRIPE_KEY')) && !empty(env('STRIPE_SECRET')))
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
            base: {
            // Add your base input styles here. For example:
            fontSize: '14px',
            color: '#32325d',
            },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
                card.mount('#card-element');

                // Create a token or display an error when the form is submitted.
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function (event) {
                event.preventDefault();

                stripe.createToken(card).then(function (result) {
                if (result.error) {
                $("#card-errors").html(result.error.message);
                toastrs('Error', result.error.message, 'error');
                } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
                }
                });
                });

                function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
                }

        @endif

        $(document).ready(function() {
            $(document).on('click', '.apply-coupon', function() {

                var ele = $(this);
                var coupon = ele.closest('.row').find('.coupon').val();
                $.ajax({
                    url: '{{ route('apply.coupon') }}',
                    datType: 'json',
                    data: {
                        plan_id: '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}',
                        coupon: coupon
                    },
                    success: function(data) {
                        $('.final-price').text(data.final_price);
                        $('#stripe_coupon, #paypal_coupon').val(coupon);
                        if (data.is_success) {
                            show_toastr('Success', data.message, 'success');
                        } else {
                            show_toastr('Error', 'Coupon code is required', 'error');
                        }
                    }
                })
            });
        });

    </script>
@endpush
