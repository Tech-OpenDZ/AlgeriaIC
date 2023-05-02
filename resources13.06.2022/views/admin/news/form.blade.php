<form class="form">
    <div class="card-body">
        {!! Form::label('news_logo', 'News Logo') !!}
        {!! Form::label('', '*',['style' => 'color:red']) !!}<br/>
        @if(isset($news->id))
            <div class="form-group">
                {!! Form::image('storage/uploads/news_logos/'.$news->news_logo,'news_logo', array('width' => 100, 'height' => 100, 'id'=>'news_logo_img'))!!}
            </div>
        @endif
        <div class="form-group">
            {!! Form::file('news_logo',['class' =>'form-control','id'=>'news_logo']) !!}
            @error('news_logo')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="name" value="{{isset($news->name) ? $news->name : ''}}">
                    {!! Form::label('name', 'Nom et Prénom',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name',isset($news->name) ? $news->name : 'Administrateur' , array('class' => 'form-control')) !!}
                    @error('name')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_name', 'Entreprise',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_name',isset($news->company_name) ? $news->company_name : 'I2B SPA' , array('class' => 'form-control')) !!}
                    @error('company_name')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('company_address', 'Adresse',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('company_address',isset($news->company_address) ? $news->company_address: '6, rue Ahmed Chérifi, Kouba, ALGER' , array('class' => 'form-control')) !!}
                    @error('company_address')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
        <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('job_title', 'Intitulé de poste',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('job_title',isset($news->job_title) ? $news->job_title: 'Commercial' , array('class' => 'form-control')) !!}
                    @error('job_title')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('mobile_number', 'Téléphone',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('mobile_number',isset($news->mobile_number) ? $news->mobile_number : '+213 770 008 496' , array('class' => 'form-control')) !!}
                    
                    @error('mobile_number')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('email',isset($news->email) ? $news->email : 'contact@algeriainvest.com' , array('class' => 'form-control')) !!}
                    @error('email')
                        <div class="bg-danger-o-50 py-2 px-4" style="color:red">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
          
        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="hidden" name="englishTitle" value="{{isset($news->news_title_in_english) ? $news->news_title_in_english : ''}}">
                    {!! Form::label('news_title_in_english', 'News Title (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_title_in_english',isset($news->news_title_in_english) ? $news->news_title_in_english : '' , array('class' => 'form-control')) !!}
                    @error('news_title_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('news_title_in_arabic', 'News Title (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_title_in_arabic',isset($news->news_title_in_arabic) ? $news->news_title_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('news_title_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('news_title_in_french', 'News Title (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_title_in_french',isset($news->news_title_in_french) ? $news->news_title_in_french: '' , array('class' => 'form-control')) !!}
                    @error('news_title_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('news_summary_in_english', 'News Summary (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_summary_in_english',isset($news->news_summary_in_english) ? $news->news_summary_in_english : '' , array('class' => 'form-control')) !!}
                    @error('news_summary_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('news_summary_in_arabic', 'News Summary (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_summary_in_arabic',isset($news->news_summary_in_arabic) ? $news->news_summary_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('news_summary_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('news_summary_in_french', 'News Summary (In french)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('news_summary_in_french',isset($news->news_summary_in_french) ? $news->news_summary_in_french: '' , array('class' => 'form-control')) !!}
                    @error('news_summary_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('editor_in_french', 'Rédacteur',['class' => 'required-class']) !!}

                    {!! Form::text('editor_in_french',isset($news->editor_in_french) ? $news->editor_in_french : '' , array('class' => 'form-control')) !!}
                    @error('editor_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('editor_in_english', 'Rédacteur (En Anglais)',['class' => 'required-class']) !!}

                    {!! Form::text('editor_in_english',isset($news->editor_in_english) ? $news->editor_in_english: '' , array('class' => 'form-control')) !!}
                    @error('editor_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="form-group">
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
        </div>
        <div class="form-group">
            {!! Form::label('description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french', isset($news->description_in_french) ? $news->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('source_id', 'Source',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::select('source_id',$source_arr,isset($news->source_id) ? $news->source_id: null , array('class' => 'form-control')) !!}
                    @error('source_id')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('source_link', 'Source Link',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('source_link',isset($news->source_link) ? $news->source_link : '' , array('class' => 'form-control')) !!}
                    @error('source_link')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
        <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('sectors[]', 'Sectors',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary  btn-sm mr-2 ml-2 mb-3" id="select_all_sectors">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_sectors">Remove all</button>
                    {!! Form::select('sectors[]',$sector_arr,$selected_sectors,['class' =>'form-control select2','multiple','id'=>'sectors']) !!}
                    @error('sectors')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('zones[]', 'Zones',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary btn-sm mr-2 ml-2 mb-3" id="select_all_zones">Select all</button>
                    <button  type="button" class="btn btn-primary btn-sm mb-3" id="remove_all_zones">Remove all</button>
                    {!! Form::select('zones[]',$zone_arr,$selected_zones,['class' =>'form-control select2','multiple','id'=>'zones']) !!}
                    @error('zones')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                   <!-- {!! Form::label('insertion_date', 'Publication Date',['class' => 'required-class mb-6']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::date('insertion_date', isset($news->insertion_date) ? date('Y-m-d', strtotime($news->insertion_date)) : date('Y-m-d'), array('class' => 'form-control')) !!}
                    @error('insertion_date')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror -->
                    {!! Form::label('insertion_date', 'Publication Date',['class' => 'required-class mb-6']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <input id="time" name="insertion_date" type="datetime-local" value="{{old('insertion_date')?? date('Y-m-d\TH:i') }}" class=" form-control @error('insertion_date') is-invalid @enderror" autocomplete="off">
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
        <div class="form-group">
            {!! Form::label('', 'News Images') !!}<br/><br/>
            <button type= "button" style="display:block;width:850px; height:40px;border:none" onclick="document.getElementById('files').click()" id="browse">Browse</button>
            {!! Form::file('news_image[]',['class' =>'form-control','multiple','id'=>'files','style'=>'display:none']) !!}
            @error('news_image')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('display_order',  isset($news->display_order) ? $news->display_order: $newsMaxId, ['class' => 'form-control']) !!}
            @error('display_order')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        {!! Form::hidden('display_order',$newsMaxId) !!}
        <div class="form-group">
            {!! Form::label('is_premium', 'Is premium') !!}<br/><br/>
            {!! Form::checkbox('is_premium',1, isset($news->is_premium) ? $news->is_premium : '') !!}
            {!! Form::label('is_premium', 'Yes/No') !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1, isset($news->status) ? $news->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive') !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-news.index') }}">Cancel</a>
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
