@extends('admin.layouts.master')

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Edit Business Environment</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-business-environment.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => ['manage-business-environment.update',$resource->id],'files'=>true)) !!}
    {{ method_field('PATCH') }}
         @include('admin.resources.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<!--begin::Page Scripts(used by this page)-->
<script>
    if($('#checkbox').is(':checked')) {
        $('#page-type').css('display','inline');
    }
    $("#checkbox").change(function() {
        if(this.checked) {
            $('#page-type').css('display','inline');

        }else{
            $('#page-type').css('display','none');
        }
    });
    // Code for text editor
</script>
<script>
    if($('#checkbox').is(':checked')) {
        $('#page-type').css('display','inline');
    }
    $("#checkbox").change(function() {
        if(this.checked) {
            $('#page-type').css('display','inline');

        }else{
            $('#page-type').css('display','none');
        }
    });
    // Code for text editor
</script>
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
<script>
       $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $('.datepicker').datepicker();
            $("#logo").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_logo");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });

                        // Old code here
                        /*$("<img></img>", {
                            class: "imageThumb",
                            src: e.target.result,
                            title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
            $("#image").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_image");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
            $("#documents").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_documents");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
        $('#delete_image_hidden').val('');
        $(".removeSelected").click(function() {
            var data = $(this).data('id');
            var type = $(this).data('type');
            $('#delete_image_hidden').val(data);
            $('#delete_type_hidden').val(type);
            $('#removeImageModal').modal('show');
        });

    });
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
<script src="{{asset('dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
<!--end::Page Scripts-->
@endsection
