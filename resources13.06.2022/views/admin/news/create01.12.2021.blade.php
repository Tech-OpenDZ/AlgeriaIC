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
    border:none;
    }
    .remove {
    display: block;
    background: white;
    color: black;
    text-align: center;
    cursor: pointer;
    }
</style>
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add News</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-news.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-news.store','files'=>true)) !!}
        @include('admin.news.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<!--begin::Page Scripts(used by this page)-->
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker();
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                        "</span>").insertBefore("#browse");
                    $(".remove").click(function(){
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
        });
        } else {
            alert("Your browser doesn't support to File API")
        }

        $(document).on('submit-btn', '#submit-btn', function() {
            $('#submit-btn').attr('disabled', 'disabled');
        });
    });
    
    // Code for text editor
    $('.summernote').summernote({
        height: 150
    });
    </script>
    <script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
    <script>
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
<!--end::Page Scripts-->
@endsection
