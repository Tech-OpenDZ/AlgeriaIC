<form class="form">

    @csrf
    <div id="alert_enregist" style="display:none" class="alert alert-danger">
        <p>Erreur:</p>
        <span></span>
    </div>
    @if( Session::has( 'success' ))
        <div class="success-alert-msg">
            {{ Session::get( 'success' ) }}

        </div><br>

        <style>
            .success-alert-msg {
                color: #35A85E !important;
                font-weight: 700;
                font-size: 1.2rem !important;
                padding-top: 0px;
                position: inherit;
                center: center;
                padding-left: 10px!important;
                background-color: rgba(250,250,250,0.8);
                text-align: -webkit-center;
            }

        </style>

        <script>
            alert(.success-alert-msg);

        </script>


    @elseif( Session::has( 'error' ))
        <div class="danger-alert-msg col-md-12">
            {{ Session::get( 'error' ) }}
        </div><br>
    @endif
    <div class="card-body"  id="link_form">
    <!-- {!! Form::label('news_logo', 'News Logo') !!} -->
        <label for="name"> @lang('news.contribution_logo') </label>
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        @if(isset($news->id))
            <div class="form-group">
                {!! Form::image('storage/uploads/news_logos/'.$news->news_logo,'news_logo', array('width' => 100, 'height' => 100, 'id'=>'news_logo_img'))!!}
            </div>
        @endif
        <div class="form-group">
            {!! Form::file('news_logo',['class' =>'form-control','id'=>'news_logo']) !!}
            <p class="upload-text-content mt-3">@lang('business_opportunity.upload_text_content') </p>
            @error('news_logo')
            <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="name" value="{{isset($news->name) ? $news->name : ''}}">
                <!-- {!! Form::label('name', 'Nom et Prénom',['class' => 'required-class']) !!} -->
                    <label for="name"> @lang('news.contact_person') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name',isset($news->name) ? $news->name : '' , array('class' => 'form-control')) !!}
                    @error('name')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('company_name', 'Entreprise',['class' => 'required-class']) !!} -->
                    <label for="company_name"> @lang('news.company_name') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name',isset($news->company_name) ? $news->company_name : '' , array('class' => 'form-control')) !!}
                    @error('company_name')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('company_address', 'Adresse',['class' => 'required-class']) !!} -->
                    <label for="company_address"> @lang('news.company_address') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_address',isset($news->company_address) ? $news->company_address: '' , array('class' => 'form-control')) !!}
                    @error('company_address')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('job_title', 'Intitulé de poste',['class' => 'required-class']) !!} -->
                    <label for="job_title"> @lang('news.job_title') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('job_title',isset($news->job_title) ? $news->job_title: '' , array('class' => 'form-control')) !!}
                    @error('job_title')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('mobile_number', 'Téléphone',['class' => 'required-class']) !!} -->
                    <label for="mobile_number"> @lang('news.company_contact') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('mobile_number',isset($news->mobile_number) ? $news->mobile_number : '' , array('class' => 'form-control')) !!}
                    @error('mobile_number')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('email', 'Email',['class' => 'required-class']) !!} -->
                    <label for="email"> @lang('news.company_email') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('email',isset($news->email) ? $news->email : '' , array('class' => 'form-control')) !!}
                    @error('email')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('news_title_in_french', 'Titre de contribution',['class' => 'required-class']) !!} -->
                    <label for="news_title_in_french"> @lang('news.news_title') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_title_in_french',isset($news->news_title_in_french) ? $news->news_title_in_french: '' , array('class' => 'form-control')) !!}
                    @error('news_title_in_french')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('news_summary_in_french', 'Résumé de contribution',['class' => 'required-class']) !!} -->
                    <label for="news_summary_in_french"> @lang('news.news_summary') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_summary_in_french',isset($news->news_summary_in_french) ? $news->news_summary_in_french : '' , array('class' => 'form-control')) !!}
                    @error('news_summary_in_french')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>
        <div class="form-group">
        <!-- {!! Form::label('description_in_french', 'Description de contribution',['class' => 'required-class']) !!} -->
            <label for="description_in_french"> @lang('news.news_description') </label>
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french', isset($news->description_in_french) ? $news->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('description_in_french')
            <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
            @enderror
        </div>
    <!--<div class="form-group">
            {!! Form::label('description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}
        {!! Form::textarea('description_in_english',isset($news->description_in_english) ? $news->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
            @error('description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}
        {!! Form::textarea('description_in_arabic', isset($news->description_in_arabic) ? $news->description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> -->

        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                <!--  {!! Form::label('source_id', 'Source',['class' => 'required-class']) !!} -->
                    <label for="source_id"> @lang('news.news_source') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::select('source_id',$source_arr,isset($news->source_id) ? $news->source_id: null , array('class' => 'form-control')) !!}
                    @error('source_id')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                <!-- {!! Form::label('source_link', 'Source Link',['class' => 'required-class']) !!} -->
                    <label for="source_link"> @lang('news.link_source') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('source_link',isset($news->source_link) ? $news->source_link : '' , array('class' => 'form-control')) !!}
                    @error('source_link')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                <!-- {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!} -->
                    <label for="sectors[]"> @lang('news.sectors') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,['class' =>'form-control select2','id'=>'sectors']) !!}
                    @error('sectors')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-lg-6">

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <!-- {!! Form::label('zones[]', 'Zones',['class' => 'required-class']) !!} -->
                    <label for="zones[]"> @lang('news.zones') </label>
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::select('zones[]',$zone_arr,$selected_zones,['class' =>'form-control select2','id'=>'zones']) !!}
                    @error('zones')
                    <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        @if(isset($news->id))
            {!! Form::label('', 'Selected News Images') !!}<br/><br/>
            <div class="form-group row">
                @foreach($news->newsImages as $newsImage)
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::image('storage/uploads/news_images/'.$newsImage->image,'news_imge', array('width' => 100, 'height' => 100))!!} <br>
                            <a href="javascript:void(0)" data-id="{{$newsImage->id}}" class="removeSelected"><i class="far fa-trash-alt" style="color: #F64E60;"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- {!! Form::label('', 'News Images') !!}<br/><br/> -->

            <label for="contribution_images"> @lang('news.contribution_images') </label> <br/><br/>
            <button type= "button" style="display:block;width:100%; height:40px;border:none;background-color: #8ba1b2;" onclick="document.getElementById('files').click()" id="browse"> @lang('news.browse')</button>
            {!! Form::file('news_image[]',['class' =>'form-control','multiple','id'=>'files','style'=>'display:none']) !!}
            <p class="upload-text-content mt-3">@lang('business_opportunity.upload_text_content') </p>
            @error('news_image')
            <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
            @enderror
        </div>


    </div>
    <div class="">
        <!--  <center> <button type="submit" class="btn btn-primary mr-2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Valider </button> </center> -->
        <center> <button type="submit" class="common-button mb-4" style="background-color: #f9b634; border-color: #f9b634" onclick="myFunction()">@lang('news.add_your_contribution') </button> </center>
    <!--  <center> <button type="submit" value="subscribe" class="genric-btn success radius" id="btn-validate" style="border: 1px solid white;border-radius: 3px;" onclick="myFunction()"><h4> @lang('news.add_contribution') </h4></button>  </center> -->
    <!--   <a class="btn btn-secondary" href="{{ route('manage-news.index') }}">Cancel</a> -->
    </div>
</form>
<div id="removeImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='removeImageForm' id='removeImageForm'  method="POST" action="{{route('destroy-news-image')}}">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="delete" value="" id="delete_image_hidden">
                <input type="hidden" name="news_id" value="{{isset($news->id)?$news->id:''}}" id="">
                <div class="modal-header">
                    <h4 class="modal-title">Remove</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to remove this news image?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>


</style>