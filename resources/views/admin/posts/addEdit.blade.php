@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">
                            <div class="col-12 card bg-white p-3">


                                @include('common.messages')

                                <form @isset($post)
                                action="{{ route('posts.update',$post->id) }}"
                                @else
                                action="{{ route('posts.store') }}"
                                @endisset
                                method="post" id="payment-form"
                                enctype="multipart/form-data"
                                >
                                @csrf
                                <input type="hidden" id="description" name="description" value="">
                                <input type="hidden" id="descriptionText" name="descriptionText" value="">


                                @isset($post)

                                {{ method_field('PUT') }}
                                @endisset

                                <div class="section-wrapper">

                                    <div class="form-layout">

                                        <div class="row mb-4">


                                          <div class="col-lg-12 mb-4">
                                            <label class="form-control-label w-100" for="fileInput">Feature Image: <span class="tx-danger">*</span> </label>

                                            <input type="text" onclick="$('#fileInput').click()" class="form-control" placeholder="choose a file"  id="filechoosed" value="">
                                            <input onchange="showthefilename(this, 'filechoosed','choose a file')" accept="image/*" type="file" class="d-none" id="fileInput" name="image" value="">
                                          </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="title">Title: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="title" name="title" @isset($post)
                                                    value="{{$post->title }}"
                                                    @else
                                                    value="{{ old('title') }}"
                                                    @endisset
                                                    required>
                                                </div>
                                            </div>




                                            <div class="col-12 p-4">
                                              <div class="row">
                                                <div class="col-12" id="summerNote">

                                                </div>

                                              </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="tags">Tags: </label>
                                                    <select class="form-control" id="tags" name="tags[]">

                                                    </select>
                                                </div>
                                            </div>




                                        </div>







                                        <div class="form-layout-footer submitSection">

                                            <button type="submit" id="submitButton" class="btn btn-primary " name="button">Submit</button>


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
    </div>
</div>

@endsection

@section('head')

  <link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{!! asset('mawaisnow/summernote/summernote-bs4.min.css') !!}">
  <script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('mawaisnow/summernote/summernote-bs4.min.js') }}"></script>
  <style media="screen">
  .note-editor.note-airframe, .note-editor.note-frame {
      border: 1px solid #a9a9a9;
      width: 100%;
    }
  </style>
@endsection


@include('common.loadJS', ['flatpicker'=> true])


@section('js')
  <script>
       var summerNote = $('#summerNote').summernote({
         placeholder: '',
         tabsize: 2,
         height: 600,
         minHeight: 400,             // set minimum height of editor

         toolbar: [
           ['style', ['style']],
           ['font', ['bold', 'underline', 'clear','fontname','fontsize','fontsizeunit',
           'backcolor','forecolor','strikethrough','superscript', 'underline', 'subscript']],
           ['color', ['color']],
           ['para', ['ul', 'ol', 'paragraph']],
           ['table', ['table']],
           ['insert', ['link', 'picture', 'video','hr']],
           ['view', ['fullscreen', 'codeview', 'help']]
         ]
       });

       $("#payment-form").submit(function (e) {
        e.preventDefault();
        var markupStr = $(summerNote).summernote('code');
        $("#description").val(markupStr);
        var str = $(markupStr).text();
        $("#descriptionText").val(str);

        $("#payment-form").unbind('submit').submit();

       });

     </script>

  <script type="text/javascript">
    $("#tags").select2({
      tags: true,
   tokenSeparators: [','],
   multiple: true
    });




  </script>


@endsection
