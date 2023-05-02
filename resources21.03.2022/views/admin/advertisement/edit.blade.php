@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                    @if(isset($advertisement->id))
                        Edit
                    @else
                        Add
                    @endif
                     Advertisement
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-advertisement.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' =>  ['manage-advertisement.store'], 'id' => 'eit_Advertisement_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($advertisement->id))
                        {{-- @method('PUT') --}}
                        <input type="hidden" name="id" value="{{$advertisement->id}}">

                    @endif

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('title', isset($advertisement->title) ? $advertisement->title: '', ['class' => 'form-control' ,'required'=>'required']) !!}
                                @error('title')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('location', 'Location',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::select('location',  App\Models\Advertisement::location ,isset($advertisement->location) ? $advertisement->location: '', ['class' => 'form-control' ,'required'=>'required']) !!}
                                @error('location')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('publication_order', 'Publication Order',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::number('publication_order',  isset($advertisement->publication_order) ? $advertisement->publication_order: '', ['class' => 'form-control' ,'required'=>'required']) !!}
                                @error('publication_order')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('sponsorised_link', 'Sponsorised Link',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('sponsorised_link',  isset($advertisement->sponsorised_link) ? $advertisement->sponsorised_link: '', ['class' => 'form-control' ,'required'=>'required']) !!}
                                @error('sponsorised_link')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('ad', 'Ad.',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}

                                <input type="file" name="ad" id="ad" accept="image/*" class="form-control" @if(!isset($advertisement)) required @endif>
                                @error('ad')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                @isset($advertisement)
                                <img src="{{asset('storage/uploads/advertisement/'.$advertisement->ad)}}" alt="" width="100%">
                                @endisset
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div  class="form-group row" >
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('advertisement_type', 'Advertisement Type',['class' => 'required-class']) !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::select('advertisement_type',  App\Models\Advertisement::advertisement_type ,isset($advertisement->advertisement_type) ? $advertisement->advertisement_type: '', ['class' => 'form-control' ,'required'=>'required','onchange'=>'chgAdvertisementType()']) !!}

                                @error('advertisement_type')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="temporary_formula" class="col-lg-4" style="display: none">
                            <div class="form-group">
                                {!! Form::label('formula_type', 'Formula') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::select('formula_type',  App\Models\Advertisement::formula_type ,isset($advertisement->formula_type) ? $advertisement->formula_type: '', ['class' => 'form-control' ,'onchange'=>'chgAdvertisementType()']) !!}
                                @error('formula_type')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="for_keyword_formula" class="col-lg-4" style="display: none">
                            <div class="form-group">
                                {!! Form::label('for_keyword', 'For Keyword') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::select('for_keyword',  App\Models\Advertisement::for_keyword ,isset($advertisement->for_keyword) ? $advertisement->for_keyword: '', ['class' => 'form-control' ,'onchange'=>'chgAdvertisementType()']) !!}
                                @error('formula_type')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="keywords_text" class="col-lg-4" style="display: none">
                            <div class="form-group">
                                {!! Form::label('keywords', 'Keywords') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('keywords', isset($advertisement->keywords) ? $advertisement->keywords: '', ['class' => 'form-control' ]) !!}
                                @error('keywords')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="by_date" class="col-lg-4 " style="display: none">
                            {!! Form::label('date_range', 'Date Range') !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            <div class="input-daterange input-group" id="kt_datepicker_5">
                                {!! Form::text('start_date',  isset($advertisement->start_date) ? $advertisement->start_date: '', ['class' => 'form-control' ]) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-ellipsis-h"></i>
                                    </span>
                                </div>
                                {!! Form::text('end_date',  isset($advertisement->end_date) ? $advertisement->end_date: '', ['class' => 'form-control' ]) !!}
                            </div>
                            @error('start_date')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror

                        </div>

                        <div id="by_clicks" class="col-lg-4 " style="display: none">
                            {!! Form::label('number_of_clicks', 'Number of Clicks') !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::number('number_of_clicks',  isset($advertisement->number_of_clicks) ? $advertisement->number_of_clicks: '', ['class' => 'form-control' ]) !!}
                            @error('number_of_clicks')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror

                        </div>

                        <div id="by_displays" class="col-lg-4 " style="display: none">
                            {!! Form::label('number_of_display', 'Number of Displays') !!}
                            {!! Form::label('', '*',['style' => 'color:red']) !!}
                            {!! Form::number('number_of_display',  isset($advertisement->number_of_display) ? $advertisement->number_of_display: '', ['class' => 'form-control' ]) !!}
                            @error('number_of_display')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                            @enderror

                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('pages[]', 'Pages',['class' => 'required-class']) !!}
                                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                                    <button  type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_pages">Select all</button>
                                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_pages">Remove all</button>
                                    {!! Form::select('pages[]',$pages_arr,$selected_pages,['class' =>'form-control select2','multiple','id'=>'pages','required'=>'required']) !!}
                                    @error('pages')
                                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('', 'Status') !!}<br/><br/>
                                    {!! Form::checkbox('status',1, isset( $advertisement->status) ? $advertisement->status: 1) !!}
                                    {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                                </div>
                            </div>

                        </div>




                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{route('manage-advertisement.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
            <!-- </form> -->
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('sctipts')
    <script>
        // Code for text editor
        function chgAdvertisementType(){
            if($('#advertisement_type').val() == 'temporary'){
                $('#temporary_formula').show();
                chgFormulaType();

            }
            else{
                $('#temporary_formula').hide();

            }

        }
        function chgFormulaType(){

            if($('#formula_type').val() == 'date'){
                $('#by_date').show();
                $('#by_clicks').hide();
                $('#by_displays').hide();
                $('#keywords_text').hide();
                $('#for_keyword_formula').hide();

                // $('#start_date').attr('required','required');
                // $('#number_of_display').removeAttr('required');
                // $('#start_date').removeAttr('required');
                // $('#keywords').removeAttr('required');

            }
            if($('#formula_type').val() == 'keyword'){
                $('#for_keyword_formula').show();
                $('#by_date').hide();
                $('#by_clicks').hide();
                $('#keywords_text').show();
                $('#by_displays').hide();
                // $('#keywords').attr('required','required');
                // $('#start_date').removeAttr('required');
                // $('#number_of_display').removeAttr('required');
                // $('#start_date').removeAttr('required');

                forKeyword();
            }
            if($('#formula_type').val() == 'displays')
            {

                $('#by_date').hide();
                $('#by_clicks').hide();
                $('#by_displays').show();
                $('#keywords_text').hide();
                $('#for_keyword_formula').hide();

                // $('#number_of_display').attr('required','required');
                // $('#number_of_clicks').removeAttr('required');
                // $('#start_date').removeAttr('required');
                // $('#keywords').removeAttr('required');


            }
            if($('#formula_type').val() == 'clicks')
            {

                $('#by_date').hide();
                $('#by_clicks').show();
                $('#by_displays').hide();
                $('#keywords_text').hide();
                $('#for_keyword_formula').hide();

                // $('#number_of_clicks').attr('required','required');
                // $('#number_of_display').removeAttr('required');
                // $('#start_date').removeAttr('required');
                // $('#keywords').removeAttr('required');
            }
            // alert($('#formula_type').val());
            KTFormControls.init();

        }


        function forKeyword(){
            if($('#for_keyword').val() == 'displays')
            {

                $('#by_date').hide();
                $('#by_clicks').hide();
                $('#by_displays').show();
                // $('#number_of_display').attr('required','required');
                // $('#number_of_clicks').removeAttr('required');
                // $('#start_date').removeAttr('required');

            }
            if($('#for_keyword').val() == 'clicks')
            {

                $('#by_date').hide();
                $('#by_clicks').show();
                $('#by_displays').hide();
                // $('#number_of_clicks').attr('required','required');
                // $('#number_of_display').removeAttr('required');
                // $('#start_date').removeAttr('required');

            }
        }
    </script>

    <!--begin::Page Scripts(used by this page)-->


<script src="{{asset('dist/assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>

    <!--end::Page Scripts-->

    <script>

var KTFormControls = function () {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
  // Private functions
  var demo1 = function demo1() {
    $("#eit_Advertisement_form1").validate({
      // define validation rules

      //display error alert on form submit
      invalidHandler: function invalidHandler(event, validator) {
        var alert = $('#kt_form_1_msg');
        alert.removeClass('kt--hide').show();
        KTUtil.scrollTop();
      },
      submitHandler: function submitHandler(form) {
        form[0].submit(); // submit the form
      }
    });

    $('#kt_datepicker_5').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        templates: arrows,
        format:'yyyy-mm-dd'
    });
  };

  return {
    // public functions
    init: function init() {
        // alert('dfg');
      demo1();
    }
  };
}();

jQuery(document).ready(function () {
  KTFormControls.init();
  chgAdvertisementType();
});
</script>

<script>
    var pages = <?php echo json_encode(array_keys((array)$pages_arr), true); ?>;
    var KTSelect2 = function() {
        var  demos = function (){
            $('#pages').select2({
                placeholder: "Choose some pages",
            });
        };
        return {
            init: function() {
                demos();
            }
        };
    }();
    KTSelect2.init();
    // Selecting all pages.
    $('#select_all_pages').click(function(){

        $('#pages').val(pages);
        $('#pages').select2({
            placeholder: "Choose some pages",
        });
    });

    // Removing all pages.
    $('#remove_all_pages').click(function(){

        $('#pages').val([]);
        $('#pages').select2({
            placeholder: "Choose some pages",
        });
    });

</script>

@endsection

