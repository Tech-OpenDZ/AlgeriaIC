@extends('admin.layouts.master')
  
@section('content')

<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Discover Algeria Subcontent</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-algeria-subcontent.index',['id'=>request()->get('id')]) }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-algeria-subcontent.store','files'=>true)) !!}
         @include('admin.discover_algeria_subcontent.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection  
@section('sctipts')

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
<script>
    // Code for text editor
    var summernoteToolbar = [
        ['font', ['fontname','fontsize','fontsizeunit','color']],
        ['style',['bold','italic','underline','strikethrough','superscript','subscript','clear']],
        ['para', ['ul', 'ol', 'paragraph','style','height']],
        ['insert', ['link', 'picture', 'video','table','hr']],
        ['view', ['fullscreen', 'codeview','undo','redo', 'help']],
    ];
    $('.summernote').summernote({
        height: 150,
        toolbar:summernoteToolbar
    });
</script>
<!--end::Page Scripts-->
@endsection