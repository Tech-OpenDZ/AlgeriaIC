<div>
	<div class="form-group row heading">
		<div class="col-lg-11"><h5 class="card-label"  style="width: 100%;padding-top: 15px;">Products & Services</h5></div>
		<div class="col-lg-1"><a href="javascript:void(0);" class="remove_product_button"><i class="far fa-trash-alt" style="color: #F64E60;margin-top: 13px;"></i>
		</a>
	</div>
	</div>
    {!! Form::label("", "Add products and services") !!} 
    <div class="form-group">
        {!! Form::select('product[]',$product_arr,1,['class' => 'form-control']) !!} 
    </div>
	<div class="form-group file-uploader">
		<input type="hidden" name='product_id[{{$id}}]' value="">
        <!-- {!! Form::file('product_images['.$id.'][]',['class' =>'form-control hide_file','multiple','id'=>"files_button_".$id]) !!} -->
        {!! Form::file('product_images['.$id.'][]',['class' =>"form-control gallery_input_$id files-prod-id",'id'=>"files-prod-id$id",'multiple','data-id'=>$id]) !!} 
        <input type="hidden" name="product_image_removed[{{$id}}]" id="removed_image{{$id}}" class="removed_image">
	</div>
	<!-- <div class="form-group row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('produc_name_in_english', 'Product Description (In english)') !!}
                {!! Form::textarea("product_name_in_english[$id]",isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , array('class' => 'form-control','rows' => 2)) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('product_name_in_arabic', 'Product Description (In arabic)') !!}
                {!! Form::textarea("product_name_in_arabic[$id]",isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , array('class' => 'form-control','rows' => 2)) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('product_name_in_french', 'Product Description (In french)') !!}
                {!! Form::textarea("product_name_in_french[$id]",isset($event->exhibitor_name_in_english) ? $event->exhibitor_name_in_english : '' , array('class' => 'form-control','rows' => 2)) !!}
                </div>
            </div>
        </div>
    </div> -->
   
</div>