@extends('admin.layouts.master')
@section('head')
<style>
    input[type="file"] {
        display: block;
    }

    .imageThumb {
        min-height: 100px;
        max-height: 100px;
        max-width: 100px;
        padding: 5px;
        cursor: pointer;

    }

    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
        border: none;
    }

    .remove {
        display: block;
        background: white;
        color: black;
        text-align: center;
        cursor: pointer;
        border: none;
    }

    .removeSelected {
        text-align: center;
        padding-left: 40px;
    }
</style>
@endsection
@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left" style="width: 100%;">Edit Business Opportunity</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-business-opportunity.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(array('method'=>'POST','route' => ['manage-business-opportunity.update',$business_opportunity->id],'files'=>true)) !!}
        {{ method_field('PATCH') }}
        @include('admin.businessopportunity.form')
        {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
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

    var sectors = <?php echo json_encode(array_keys((array)$sector_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#sectors').select2({
                placeholder: "Choose some sectors",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();
    KTSelect2.init();
    // Selecting all sectors.
    $('#select_all_sectors').click(function(){

        $('#sectors').val(sectors);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    // Removing all sectors.
    $('#remove_all_sectors').click(function(){

        $('#sectors').val([]);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    var zones = <?php echo json_encode(array_keys((array)$zone_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#zones').select2({
                placeholder: "Choose some zones",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();

    // Selecting all zones.
    $('#select_all_zones').click(function(){

        $('#zones').val(zones);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });

    // Removing all zones.
    $('#remove_all_zones').click(function(){

        $('#zones').val([]);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });
</script>
@endsection
