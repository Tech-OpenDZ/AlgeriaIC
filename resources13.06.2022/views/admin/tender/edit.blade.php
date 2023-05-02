@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                @if(isset($tender->id))
                        Edit
                    @else
                        Add
                    @endif
                     Tender
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-tender.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            {!! Form::open(['method' => 'post', 'route' => isset($tender->id) ? ['manage-tender.update', $tender->id] : ['manage-tender.store'], 'id' => 'eit_tender_form','files' => true]) !!}
                <div class="card-body">
                    @csrf
                    @if(isset($tender->id))
                        @method('PUT')
                    @endif
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group"> 
			                    {!! Form::label('tender_type_in_english', 'Tender Type (In english)') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    {!! Form::text('tender_type_in_english',isset($tender->localeAll[0]->tender_type) ? $tender->localeAll[0]->tender_type : '' , array('class' => 'form-control')) !!}
			                    @error('tender_type_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tender_type_in_arabic', 'Tender Type (In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('tender_type_in_arabic', isset($tender->localeAll[1]->tender_type) ? $tender->localeAll[1]->tender_type : '', ['class' => 'form-control']) !!}
                                @error('tender_type_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tender_type_in_french', 'Tender Type (In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('tender_type_in_french', isset($tender->localeAll[2]->tender_type) ? $tender->localeAll[2]->tender_type : '', ['class' => 'form-control']) !!}
                                @error('tender_type_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group"> 
			                    {!! Form::label('tendering_sector_in_english', 'Tendering sector (In english)') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    {!! Form::text('tendering_sector_in_english',isset($tender->localeAll[0]->tendering_sector) ? $tender->localeAll[0]->tendering_sector : '' , array('class' => 'form-control')) !!}
			                    @error('tendering_sector_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tendering_sector_in_arabic', 'Tendering Sector (In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('tendering_sector_in_arabic', isset($tender->localeAll[1]->tendering_sector) ? $tender->localeAll[1]->tendering_sector : '', ['class' => 'form-control']) !!}
                                @error('tendering_sector_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tendering_sector_in_french', 'Tendering Sector (In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::text('tendering_sector_in_french', isset($tender->localeAll[2]->tendering_sector) ? $tender->localeAll[2]->tendering_sector : '', ['class' => 'form-control']) !!}
                                @error('tendering_sector_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <div class="form-group"> 
			                    {!! Form::label('tender_detail_in_english', 'Tender Detail (In english)') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    {!! Form::textarea('tender_detail_in_english',isset($tender->localeAll[0]->tender_detail) ? $tender->localeAll[0]->tender_detail : '' , array('class' => 'form-control')) !!}
			                    @error('tender_detail_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tender_detail_in_arabic', 'Tender Detail (In arabic)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('tender_detail_in_arabic', isset($tender->localeAll[1]->tender_detail) ? $tender->localeAll[1]->tender_detail : '', ['class' => 'form-control']) !!}
                                @error('tender_detail_in_arabic')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                {!! Form::label('tender_detail_in_french', 'Tender Detail (In french)') !!}
                                {!! Form::label('', '*',['style' => 'color:red']) !!}
                                {!! Form::textarea('tender_detail_in_french', isset($tender->localeAll[2]->tender_detail) ? $tender->localeAll[2]->tender_detail : '', ['class' => 'form-control']) !!}
                                @error('tender_detail_in_french')
                                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
			                    {!! Form::label('publication_date', 'Publication Date') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    <div class="input-group">
			                    {!! Form::text('publication_date', isset($tender->publication_date) ? date('m/d/Y', strtotime($tender->publication_date)): date('m/d/Y'), array('class' => 'form-control datepicker','id'=> 'publication_date')) !!}
			                    <label class="input-group-btn" for="txtDate">
			                        <span class="btn btn-default">
			                            <span class="far fa-calendar"></span>
			                        </span>
			                    </label>
			                    </div>
			                    @error('publication_date')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
			                    {!! Form::label('deadline', 'Deadline') !!}
			                    {!! Form::label('', '*',['style' => 'color:red']) !!}
			                    <div class="input-group">
			                    {!! Form::text('deadline', isset($tender->deadline) ? date('m/d/Y', strtotime($tender->deadline)): date('m/d/Y'), array('class' => 'form-control datepicker','id'=> 'deadline')) !!}
			                    <label class="input-group-btn" for="txtDate">
			                        <span class="btn btn-default">
			                            <span class="far fa-calendar"></span>
			                        </span>
			                    </label>
			                    </div>
			                    @error('deadline')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        {!! Form::label('', 'Status') !!}<br/><br/>
                        {!! Form::checkbox('status',1, isset( $tender->status) ? $tender->status: 1) !!}
                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('manage-tender.index') }}">Cancel</a>
                </div>
            <!-- </form> -->
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('sctipts')
	<script type="text/javascript">
		$('.datepicker').datepicker();
	</script>
@endsection
