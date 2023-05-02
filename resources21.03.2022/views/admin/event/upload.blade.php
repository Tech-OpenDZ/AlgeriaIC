@extends('admin.layouts.master')
@section('content')
@include('alert_messages')
<!--begin::Card-->
<div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
    <div class="card-header">
        <div class="card-title" style="width: 100%;">
            <h3 class="card-label pull-left"  style="width: 100%;">Upload upcoming events</h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('manage-event.index') }}">Back</a>
            </div>
        </div>
    </div>

    {!! Form::open(array('method'=>'POST','route' => 'manage-event.upload-document','files' => true)) !!}
    <div class="card-body">
        <div class="form-group">
                {!! Form::label('', 'English',['class' => 'required-class']) !!}<br>
            <div class="row">
                <div class="col-lg-7">
                    
                    {!! Form::file('document_in_english',['id' => 'document_in_english', 'class'=>"form-control"]) !!}
                    @error('document_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-5"> 
                    @php
                        $document_in_english = '';
                        if(file_exists('storage/uploads/upcoming_event/en_download.pdf')) {
                            $document_in_english = asset('storage/uploads/upcoming_event/en_download.pdf');
                        }              
                    @endphp
                    @if($document_in_english != '')
                    <span>en_download.pdf</span>
                    <a href="{{ $document_in_english}}" class="btn btn-primary" download>
                        <span class="svg-icon svg-icon-md">
                        </span>Download
                    </a>
                    <a href="javascript:void(0)" data-href="{{ route('manage-event.delete-document',['locale'=>'en'])}}" class="btn btn-danger delete">
                        <span class="svg-icon svg-icon-md">
                        </span>Delete
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('', 'Arabic',['class' => 'required-class']) !!}<br>
            <div class="row">
                <div class="col-lg-7">
                    {!! Form::file('document_in_arabic',['id' => 'document_in_arabic', 'class'=>"form-control"]) !!}
                    @error('document_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-5"> 
                     @php
                        $document_in_arabic = '';
                        if(file_exists('storage/uploads/upcoming_event/ar_download.pdf')) {
                            $document_in_arabic = asset('storage/uploads/upcoming_event/ar_download.pdf');
                        }              
                    @endphp
                    @if( $document_in_arabic != '')
                    <span>ar_download.pdf</span>
                    <a href="{{$document_in_arabic}}" class="btn btn-primary" download>
                        <span class="svg-icon svg-icon-md">
                        </span>Download
                    </a>
                    <a href="javascript:void(0)" data-href="{{route('manage-event.delete-document',['locale'=>'ar'])}}" class="btn btn-danger delete">
                        <span class="svg-icon svg-icon-md">
                        </span>Delete
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('', 'French',['class' => 'required-class']) !!}<br>
            <div class="row">
                <div class="col-lg-7">
                    {!! Form::file('document_in_french',['id' => 'document_in_french', 'class'=>"form-control"]) !!}
                    @error('document_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-5"> 
                    @php
                        $document_in_french = '';
                        if(file_exists('storage/uploads/upcoming_event/fr_download.pdf')) {
                            $document_in_french = asset('storage/uploads/upcoming_event/fr_download.pdf');
                        }              
                    @endphp
                    @if( $document_in_french != '')
                    <span>fr_download.pdf</span>
                    <a href="{{$document_in_french}}" class="btn btn-primary" download>
                        <span class="svg-icon svg-icon-md">
                        </span>Download
                    </a>
                    <a href="javascript:void(0)" data-href="{{route('manage-event.delete-document',['locale'=>'fr'])}}" class="btn btn-danger delete" >
                        <span class="svg-icon svg-icon-md">
                        </span>Delete
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="Submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-event.index') }}">Cancel</a>
    </div>
    {!! Form::close() !!}
</div>
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deleteForm' id='deleteForm'  method="GET" >
            
                <input type="hidden" name="delete" value="" id="delete_hidden">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this document?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="delete">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Card-->
<script type="text/javascript">
$(document).ready(function(){
	$('body').on('click', ".delete", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        $('#deleteForm').attr('action', $(this).data('href'));
        $('#modal').modal('show');
    });
}); 
</script>
@endsection 



