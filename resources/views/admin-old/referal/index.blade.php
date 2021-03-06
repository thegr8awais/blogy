@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                        <div class="col-12">
                          <h4 class="headingColor">Invite Friends and Receive a Free Month of Service</h4>


                        </div>

                        <div class="col-12">
                          <div class="row mt-4">

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card ">
                                  <div class="card-header p-0 border-0 text-center">
                                    <img class="img-fluid noselect" src="{{ asset('mawaisnow\sp\referal\Group 414.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">Spread the world</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      Invite a friend by sending them a referral link directly via email, social media or via text.
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card">
                                  <div class="card-header p-0 border-0 text-center">
                                    <img class="img-fluid noselect" src="{{ asset('mawaisnow\sp\referal\Group 415.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">A Friend Signs Up</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      When your friend completes the short form, we will be immediately notified and will contact them.
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card">
                                  <div class="card-header p-0 border-0 text-center">
                                    <img class="img-fluid noselect" src="{{ asset('mawaisnow\sp\referal\Group 416.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">Receive a FREE month of service</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      
                                       When your friend completes an order for one of our website plans and keeps the account activate for 60 days, we will credit your account.
                                        The more people you refer, the more free months you will receive!


                                    </div>
                                  </div>
                              </div>
                            </div>



                          </div>
                        </div>



                        <div class="col-12 mt-4"></div>



                        <div class="col-12">
                          <div class="row">
                            <div class="col-12  col-sm-5  col-md-6 col-lg-7">
                              <div class="row">
                                <div class="col-12">
                                  <h5>Your Invite Link</h5>
                                </div>
                                <div class="col-12 mt-3">
                                  <div class="input-group mb-3">
                                      <input type="text" class="form-control bg-white" readonly disabled value="{{ route('invite', Auth::id() ) }}" >
                                      <div class="input-group-append">
                                          <button class="btn btn-primary" type="button" onclick="copyData('{{ route('invite', Auth::id() ) }}')">Copy</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-sm-7 col-md-6 col-lg-4">
                              <div class="row">
                                <div class="col-12">
                                  <h5>Share via Social</h5>
                                </div>

                                <div class="col-3 mt-1">
                                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('invite', Auth::id() ) }}">
                                    <div class="col-auto rounded-circle bg-white socialIconForReferral text-center">
                                        <i class="fab fa-facebook-f text-primary"></i>
                                    </div>
                                  </a>

                                </div>
                                <div class="col-3 mt-1">
                                  <a target="_blank" href="https://twitter.com/intent/tweet?text={{ route('invite', Auth::id() ) }}">
                                    <div class="col-auto rounded-circle bg-white socialIconForReferral text-center">
                                        <i class="fab fa-twitter text-c-blue "></i>
                                    </div>
                                  </a>
                                </div>

                              </div>
                            </div>


                            </div>


                        </div>











                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style media="screen">
  @media (max-width: 720px) and (min-width: 320px) {
    .mt-3{
        margin-top: 0px !important;
    }
    .minHeight1 {
      padding-top: 0px !important;
      min-height: 176px;
    }
  }
</style>
@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
  <script type="text/javascript">
    $("#marketingService").select2({
      minimumResultsForSearch: -1,
      placeholder: "Which Service are you interested in?"
  }).val(null).change();
  </script>
@endsection
