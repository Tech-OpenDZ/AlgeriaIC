<!-- add new tender detail modal -->
<div id="addTenderModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name='deletetenderForm' id='deletetenderForm'  method="POST">
                {{ csrf_field() }}
                <div class="modal-header"> 
                    <h4 class="modal-title">Add Tender</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- <p>Are you sure want to delete this Tender?</p> -->
                    <div class="form-group row">
			            <div class="col-lg-4">
			                <div class="form-group">
			                    {!! Form::label('title_in_english', ' Title (In english)',['class' => 'required-class']) !!}
			                    <!-- {!! Form::label('', '*',['style' => 'color:red']) !!} -->
			                    {!! Form::text('title_in_english',isset($resource->title_in_english) ? $resource->title_in_english : '' , array('class' => 'form-control')) !!}
			                    @error('title_in_english')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
			            </div>
			            <div class="col-lg-4">
			                <div class="form-group">
			                    {!! Form::label('title_in_arabic', 'Title (In arabic)',['class' => 'required-class']) !!}
			                    <!-- {!! Form::label('', '*',['style' => 'color:red']) !!} -->
			                    {!! Form::text('title_in_arabic',isset($resource->title_in_arabic) ? $resource->title_in_arabic: '' , array('class' => 'form-control')) !!}
			                    @error('title_in_arabic')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
			            </div>
			            <div class="col-lg-4">
			                <div class="form-group">
			                    {!! Form::label('title_in_french', 'Title (In French)',['class' => 'required-class']) !!}
			                    <!-- {!! Form::label('', '*',['style' => 'color:red']) !!} -->
			                    {!! Form::text('title_in_french',isset($resource->title_in_french) ? $resource->title_in_french: '' , array('class' => 'form-control')) !!}
			                    @error('title_in_french')
			                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
			                    @enderror
			                </div>
			            </div>
			        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>