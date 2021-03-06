@extends('layouts.supportPortal.master')

@section('body')
@php
  $user = Auth::user();
@endphp
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                      <form id="payment-form" action="{{ route('orderConfirmationStore', $order->id) }}" method="post">
                        @csrf

                        <div class="col-12 pl-0 mb-3">
                          {{-- <h4 class="headingColor">Order Form</h4> --}}
                        </div>




                          <div class="col-12 headingOrder justify-content-around bg-white p-3">

                            <div class="row pb-2 pt-2 border-bottom">
                              <div class="col-12 blackColorOrderForm">
                                <div class="float-left">
                                  Order
                                  {{ $dummyOrder->title }}
                                </div>

                                <div class="float-right">
                                  ${{ $dummyOrder->price }}
                                </div>

                              </div>
                            </div>

                            <div class="row pt-3">


                              <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                <div class="mb-3 text-center w-100" >
                                  <img class="img-fluid" src="{{ asset($dummyOrder->img) }}" alt="">
                                </div>

                              </div>
                              <div class="col-xl-10 col-lg-9 col-md-9 col-12">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="float-left headingOrder mb-1">
                                      {{ $dummyOrder->title }}
                                    </div>

                                  </div>
                                </div>
                                <p>
                                  {{ $dummyOrder->description }}
                                </p>


                              </div>


                            </div>


                          </div>
                          <div class="mt-3 col-12 headingOrder justify-content-around bg-white p-3">

                              <div class="row pb-2 pt-2">
                      {{-- @if(!isset($paymentIntent)) --}}
                                <div class="col-12 blackColorOrderForm pb-3">

                                  <div class="float-left">
                                    Select Card
                                  </div>
                                  <div class="float-right">
                                    <a class="fontSize14px" href="{{ route('orderConfirmation',[$order->id, 'new'=> true]) }}">Add New Card</a>
                                  </div>

                                </div>
                                @php
                                $paymentMethod = $user->paymentMethods()->first();
                                @endphp
                                @php
                                  $card = $paymentMethod->card;
                                @endphp
                                @if ($user->card_last_four != null)
                                  <div class="col-12">
                                      <select class="form-control" name="cards" id="cards">


                                            <option value="{{ $paymentMethod->id }}" data-image="{{ asset('payment/'. $card->brand . ".png") }}" data-brand="{{ $card->brand }}">*** *** *** {{ $card->last4 }} ({{ $card->exp_month }}/{{ $card->exp_year }})</option>

                                      </select>
                                  </div>
                                @endif
                        {{-- @endif --}}
                                @if(isset($paymentIntent) && request()->new != null)
                                  <div class="col-12 blackColorOrderForm">
                                    <label for="card-element" class="text-dark">
                                       {{-- Please enter your billing information --}}
                                    </label>

                                  </div>


                                  <div class="col-12 col-md-12 mb-5">

                                        <label for="card-element" class="grayColor">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element" class="form-control">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                @endif





                              </div>


                          </div>

                          @if ($order->type == 4)

                            <div class="mt-3 col-12 headingOrder justify-content-around bg-white p-3">

                                <div class="row pb-2 pt-2">
                                  <div class="col-12 blackColorOrderForm">
                                    <div class="float-left">
                                      Choose Plan

                                    </div>

                                    <div class="float-right">
                                    </div>
                                  </div>
                                </div>


                            </div>
                            <div class="col-12">
                              @include('supportPortal.orders.plan')
                            </div>
                          @endif


                        <div class="mt-3 col-12 headingOrder justify-content-around bg-white p-3">

                            <div class="row pb-2 pt-2">
                              @if(isset($intent))
                                <div class="col-12 blackColorOrderForm">
                                  <label for="card-element" class="text-dark">
                                     Please updated your billing information
                                  </label>

                                </div>


                                <div class="col-12 col-md-12 mb-5">

                                      <label for="card-element" class="grayColor">
                                          Credit or debit card
                                      </label>
                                      <div id="card-element" class="form-control">
                                          <!-- A Stripe Element will be inserted here. -->
                                      </div>

                                      <!-- Used to display form errors. -->
                                      <div id="card-errors" role="alert"></div>
                                  </div>

                              @endif

                              <div class="col-12 blackColorOrderForm">
                                <div class="float-left">
                                  Summary
                                </div>

                                <div class="float-right">
                                  Total Due: <span id="totalDuePrice" class="totalDuePrice">${{ $order->price }}</span>
                                </div>
                              </div>
                            </div>

                            <div class="row pb-2 pt-2 mt-3 justify-content-center">
                              <div class="col-12">
                                <button  id="card-button"

                                @if(isset($intent))
                                  data-secret="{{ $intent->client_secret }}"
                                @endif
                                @if(isset($paymentIntent))
                                  data-secret="{{ $paymentIntent->client_secret }}"
                                @endif

                                class="btn btn-primary btn-block" type="submit" name="button">Pay Now</button>
                              </div>
                              <div class="col-12 text-center mt-3 fontSize14px">
                                By placing this order,
                                you agree to our <a href="{{ route('termsOfService') }}">terms and conditions</a> and <a href="{{ route('privacyPolicya') }}">privacy policy.</a>

                              </div>

                            </div>

                          </div>

                        </form>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
  @if (isset($intent) || isset($paymentIntent) && request()->new != null)
    @include('common.stripe')
  @endif
  <script type="text/javascript">
  function formatState (optionValue) {
      var target = optionValue.element;
      if (!optionValue.id) {
        return optionValue.text;
      }

      var baseUrl = "/payment";
      var option = $(
        '<span><img class="img-card imgLogoCard" /> <div class="d-inline-flex optionTextHai">' + optionValue.text + '</div></span>'
      );

      // Use .text() instead of HTML string concatenation to avoid script injection issues

      option.find("img").attr("src", $(target).attr('data-image'));

      return option;
    };

    $("#cards").select2({
      templateSelection: formatState,
      templateResult: formatState
    })
  </script>
@endsection

@section('head')
  @if (isset($intent) || isset($paymentIntent))
    <script src="https://js.stripe.com/v3/"></script>
  @endif
  <style media="screen">
    .img-card{
      width: 50px;
      margin-top: -5px;
    }
    @media (max-width: 420px) {
      .imgLogoCard{
        width: 40px;
      }
      .optionTextHai{
        font-size: 11px;
      }
    }
  </style>
@endsection
