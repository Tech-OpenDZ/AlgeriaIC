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
    }

    .heading {
        width: 850;
        background-color: #E5EAEE;
        height: 50px;
        padding-left: 15px;
    }
</style>
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left" style="width: 100%;">Add Company</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-company.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(array('method'=>'POST','route' => 'manage-company.store','data-parsley-validate','files'=>true,'id'=>'company-form')) !!}
            @include('admin.company.form')
        {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<!-- code by prathamesh -->
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
  <!-- ----Parsley Js for validation added by pooja----- -->
<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class=""></div>',
        errorTemplate: '<div class="bg-danger-o-50 py-2 px-4  parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<!-- ---------End Parsley js here----------------------------- -->
<script>
    // SECTORS
    var sectors = <?php echo json_encode(array_keys((array)$sector_arr), true); ?>;
    var KTSelect2 = function() {
        var demos = function() {
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
    $('#select_all_sectors').click(function() {

        $('#sectors').val(sectors);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    // Removing all sectors.
    $('#remove_all_sectors').click(function() {

        $('#sectors').val([]);
        $('#sectors').select2({
            placeholder: "Choose some sectors",
        });
    });

    // ZONES
    var zones = <?php echo json_encode(array_keys((array)$zone_arr), true); ?>;
    var KTSelect2 = function() {
        var demos = function() {
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
    KTSelect2.init();

    // Selecting all zones.
    $('#select_all_zones').click(function() {

        $('#zones').val(zones);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });

    // Removing all zones.
    $('#remove_all_zones').click(function() {

        $('#zones').val([]);
        $('#zones').select2({
            placeholder: "Choose some zones",
        });
    });

    // ACTIVITY CODES
    var activity_codes = <?php echo json_encode(array_keys((array)$activity_codes_arr), true); ?>;
    var KTSelect2 = function() {
        var demos = function() {
            $('#activity_codes').select2({
                placeholder: "Choose some activity codes",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();
    KTSelect2.init();
    // Selecting all activity codes.
    $('#select_all_activity_codes').click(function() {

        $('#activity_codes').val(activity_codes);
        $('#activity_codes').select2({
            placeholder: "Choose some activity codes",
        });
    });

    // Removing all activity codes.
    $('#remove_all_activity_codes').click(function() {

        $('#activity_codes').val([]);
        $('#activity_codes').select2({
            placeholder: "Choose some activity codes",
        });
    });
</script>
<!-- code ends -->
<script type="text/javascript">
$(document).ready(function() {
    var storedFiles = [];
    var removed_file = [];
    function PreviewImage(e){
        console.log(e);
        // return true;
        var input = e.target;
        var targetID = e.target.id;
        // console.log(e.target.value);
        var preview_image = $("#"+targetID).parent().parent();
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesLength = files.length;
        var parentId = $("#"+targetID).data('id');
        console.log(parentId,"parent ID")
        filesArr.forEach(function(f) {
            var fileReader = new FileReader();
            storedFiles.push(f);
            fileReader.onload = function(e) {
                $("<span class=\"pip\">" +"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" + "<br/><span class=\"removeImage\" data-file='"+f.name+"' data-id='"+parentId+"'><i class=\"far fa-trash-alt\" style=\"color: #F64E60;margin-top: 13px;margin-left:40px;\"></i></span>" +"</span>").insertBefore('.gallery_input_'+parentId);
            }
            fileReader.readAsDataURL(f);
        });
    }
    $('#company-form').on('change', '.files-prod-id', PreviewImage);
    // $('#company-form').on('change', '.files-prod-id', function(e){
    //     console.log('hi');
    //     PreviewImage(e);
    //     return true;
    // });
    $('#company-form').on('click', '.removeImage', function() {
        var file = $(this).data("file");
        var ID = $(this).data('id');
        var removed_image_list=[];
        for (var i = 0; i < storedFiles.length; i++) {
            if (storedFiles[i].name === file) {
            // storedFiles.splice(i, 1);
                if(removed_file.hasOwnProperty(ID)){
                removed_image_list = removed_file[ID];
                }
                removed_image_list.push(storedFiles[i].name);
                removed_file[ID] = removed_image_list;
                console.log(removed_file[ID]);
                break;
            }
        }
        $(this).parent(".pip").remove();
        // console.log(storedFiles);
        // handleFile(ID);
        $("#removed_image"+ID).val(removed_file[ID]);
        console.log($("#removed_image"+ID).val());
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var addButton = $('.add_contacts'); //Add button selector
        var wrapper = $('.contact_wrapper'); //Input field wrapper
        var data = `{!! $contact_view !!}`;
        var x = 1;

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(data); //Add field html

        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_contact_button', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
            //Remove field html
            x--; //Decrement field counter
        });

        // ----------Product Add more--------------
        var productButton = $('.add_button'); //Add button selector
        var product_wrapper = $('.field_wrapper'); //Input field wrapper
        var id = 1;
        $('body').on('click', ".add_button", function(e) {
            e.stopPropagation();
            $.ajax({
                url: '{{ route("product-addmore") }}',
                type: 'get',
                data: {
                    'id': id++
                },
                success: function(response) {
                    console.log(response);
                    $(product_wrapper).append(response.html);
                }
            });
        });

        $(product_wrapper).on('click', '.remove_product_button', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
            //Remove field html
            id--; //Decrement field counter
        });
        //-End Product Add more--------
        $(document).on('click', '.files_button', function(e) {
            console.log("randomNumber");
            // $("#files_button_1").click();
            // $("#files_button_1")[0].click();
            var button = $(this).attr('id');
            //    $("#files_button_1").off('click').on('click', function(event){ // Preserve other event handlers if any.

            // });
            // console.log();
            // var sourceElement = $(this).find("files_"+button).get(0);
            // console.log(sourceElement);
            var image = document.getElementById("files_" + button);
            image.click();
            if (window.File && window.FileList && window.FileReader) {
                $("#files_" + button).on("change", function(e) {
                    var files = e.target.files;
                    filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                                "</span>").insertBefore("#" + button);
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
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
            // console.log(image);

        });

    });


    if($('#is_sponsored').is(':checked')) {
        $('#sponsored-rating').css('display','inline');
    }
    $("#is_sponsored").change(function() {
        if(this.checked) {
            $('#sponsored-rating').css('display','inline');
        }else{
            $('#sponsored-rating').css('display','none');
        }
    });
</script>
@endsection