@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content p-2">
            <div class="pcoded-inner-content">

                <div class="main-body">
                  @include('common.messagesSupport')

                    <div class="page-wrapper m-0 p-0">

                        <div class="container fontSizeGeneralControl pl-0 pl-sm-1 pl-md-2 pr-0 pr-sm-1 pr-md-2">
                            <div class="row nleftrightm">

                                <div class="col-12 headingBlack">
                                    <a href="{{ route('posts.create') }}">Posts</a>
                                </div>

                            </div>




                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
