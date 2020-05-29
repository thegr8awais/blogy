@extends('layouts.supportPortal.master')

@section('body')


<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                      @include('common.messagesSupport')

                        <!-- [ Main Content ] start -->
                        <div class="row">
                          <div class="col-12 text-right  p-3">
                              <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add Post</a>
                          </div>
                            <div class="col-12">

                                <div class="bg-white mg-t-20 mg-sm-t-30">

                                    <div class="table-responsive">
                                        <table class="table mg-b-0 tx-13">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($posts as $post)
                                                <tr>

                                                    <td>
                                                      {{ $post->title }}
                                                    </td>



                                                    <td>


                                                        <form class="d-none" id="{{$post->id}}" action="{{ route('posts.destroy',$post->id) }}" method="post">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a title="Delete" href="javascript:void(0)" formId="{{$post->id}}" class="fa-2x ml-1 text-danger confirmDelete"><i class="fa fa-trash"></i></a>


                                                    </td>



                                                </tr>
                                                @endforeach

                                                @if ($posts->count() < 1) <tr>
                                                    <td colspan="6" class="text-center">
                                                        <h1>No Records</h1>
                                                    </td>
                                                    </tr>
                                                    @endif



                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($posts->total() > $posts->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $posts->links() !!}

                                        </div>
                                    </div>
                                    @endif


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

@section('head')
<script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('js')

@endsection
