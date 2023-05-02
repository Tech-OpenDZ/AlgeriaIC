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
    .heading{
        width:850;
        background-color: #E5EAEE;
        height: 50px;
        padding-left:15px;
    }

</style> 
<link href="{{asset('dist/parsley.min.css')}}" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.4/parsley.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Add Event</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-event.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
    {!! Form::open(array('method'=>'POST','route' => 'manage-event.store','files'=>true,'data-parsley-validate')) !!}
        @include('admin.event.form')
    {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>

<!--end::Page Scripts-->
<script>
    

    $(document).ready(function() {

        var removedEventImages = [];
        var storedFiles = [];
        $('.date').datepicker("setDate", new Date());
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                var filesArr = Array.prototype.slice.call(files);
                filesArr.forEach(function(f) {
                // for (var i = 0; i < filesLength; i++) {
                //     var f = files[i]
                    var fileReader = new FileReader();
                    storedFiles.push(f);
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                            "<br/><a href=\"javascript:void(0)\" class=\"remove removeEventImage\" data-file='"+f.name+"'><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse");
                        // $(".remove").click(function(){
                        //     $(this).parent(".pip").remove();
                        // });

                        // Old code here
                        /*$("<img></img>", {
                            class: "imageThumb",
                            src: e.target.result,
                            title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                });
            }); 
        

            $(document).on('click', '.removeEventImage', function() {
                $(this).parent(".pip").remove();
                var file = $(this).data("file");
                var removed_image_list=[];
                for (var i = 0; i < storedFiles.length; i++) {

                    if (storedFiles[i].name === file) {
                        removedEventImages.push(storedFiles[i].name);
                        break;
                    }
                }
                $(this).parent(".pip").remove();
                console.log(removedEventImages);
                $("#event_image_removed").val(removedEventImages);
            });

            $("#files_references").on("change", function(e) {
                var files = e.target.files,
                filesLength = files.length;
                var filesArr = Array.prototype.slice.call(files);
                filesArr.forEach(function(f) {
                // for (var i = 0; i < filesLength; i++) {
                //     var f = files[i]
                    var fileReader = new FileReader();
                    storedFiles.push(f);
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                            "<br/><a href=\"javascript:void(0)\" class=\"remove removeReferenceImage\" data-file='"+f.name+"'><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_references");
                        // $(".remove").click(function(){
                        //     $(this).parent(".pip").remove();
                        // });

                        // Old code here
                        /*$("<img></img>", {
                            class: "imageThumb",
                            src: e.target.result,
                            title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                });

                $(document).on('click', '.removeReferenceImage', function() {
                    $(this).parent(".pip").remove();
                    var file = $(this).data("file");
                        var removed_image_list=[];
                        for (var i = 0; i < storedFiles.length; i++) {

                            if (storedFiles[i].name === file) {
                                removedEventImages.push(storedFiles[i].name);
                                break;
                            }
                        }
                        $(this).parent(".pip").remove();
                        console.log(removedEventImages);
                        $("#reference_image_removed").val(removedEventImages);
                });

            });

        } else {
            alert("Your browser doesn't support to File API")
        }
    });

    // Code for text editor
    // Code for text editor
    $('.summernote').summernote({
        height: 150
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // var maxField = 100; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var data = `{!! $exhibitor !!}`;
        var display_order = `{{ $display_order}}`;
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){

            display_order++;
            //Check maximum number of input fields
            // if(x < maxField){
                 x++; //Increment field counter
                $(wrapper).append(data); //Add field html
                $('.exhibitor').last().find('.display-order').val(display_order);
                // setDisplayOrder();

            //  }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
             //Remove field html
            x--; //Decrement field counter
        });

        $(document).on('blur','#start_date',function(e){
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            if(new Date(end_date) < new Date(start_date)) {
                $('#end_date').val($('#start_date').val());
            }
        })
    });

    var start = new Date();
    // set end date to max one year period:
    var end = new Date(new Date().setYear(start.getFullYear()+1));
    $('#start_date').val();
    $('#start_date').datepicker({
        // startDate : start,
        // endDate   : end
    // update "toDate" defaults whenever "fromDate" changes
    }).on('changeDate', function(){
        // set the "toDate" start to not be later than "fromDate" ends:
        $('#end_date').datepicker('setStartDate', new Date($(this).val()));
    });
    $('#end_date').datepicker({
        // format: 'yy/mm/dd',
        // startDate : start,
        // endDate   : end
    // update "fromDate" defaults whenever "toDate" changes
    }).on('changeDate', function(){
        // set the "fromDate" end to not be later than "toDate" starts:

        $('#start_date').datepicker('setEndDate', new Date($(this).val()));
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
