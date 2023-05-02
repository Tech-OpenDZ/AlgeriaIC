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

    .heading {
        width: 850;
        background-color: #E5EAEE;
        height: 50px;
        padding-left: 15px;
    }
</style>
@endsection
@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left" style="width: 100%;">Edit Company</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-company.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(array('method'=>'POST','route' => ['manage-company.update',$company->id],'data-parsley-validate','files'=>true,'id'=>'company-form')) !!}
        {{ method_field('PATCH') }}
        @include('admin.company.form')
        {!! Form::close() !!}
    </div>
</div>
<!--end::Card-->
@endsection
@section('sctipts')
<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div class=""></div>',
        errorTemplate: '<div class="bg-danger-o-50 py-2 px-4  parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>
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
        $('body').on('click', '.remove_contact_button', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove();
            //Remove field html
            x--; //Decrement field counter
        });

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

        $(".delete_product_button").click(function() {
            var data = $(this).data('id');
            console.log(data);
            $('#delete_product_hidden').val(data);
            $('#removeProductModal').modal('show');
        });

        $(".delete_contact_button").click(function() {
            var data = $(this).data('id');
            console.log(data);
            $('#delete_contact_hidden').val(data);
            $('#removeContactModal').modal('show');
        });

        $(".removeProductImage").click(function() {
            var data = $(this).data('id');
            console.log(data);
            $('#delete_image_hidden').val(data);
            $('#removeImageModal').modal('show');
        });
    });
</script>
<!-- code by prathamesh -->
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
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
    // console.log('hi');
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
@endsection