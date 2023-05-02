<div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Add Economical Indicator</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(array('method'=>'POST','url' => '#','class' => 'form-horizontal' ,'id' => 'indicatorForm','files'=>true)) !!}
            <!-- <form id="quoteForm" name="quoteForm" class="form-horizontal"> -->
	            <div class="modal-body">
	                <input type="hidden" name="economic_id" id="">
	                    <div class="form-group row">
	                    	<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('indicator_name_in_english', 'Indicator Name (In english)') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    {!! Form::text('indicator_name_in_english',null , array('class' => 'form-control')) !!}
				                        <div class="" id="indicator_name_in_english-error"></div>
			                    </div> 
	                 		</div>
	                 		<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('indicator_name_in_arabic', 'Indicator Name (In arabic)') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    {!! Form::text('indicator_name_in_arabic',null , array('class' => 'form-control')) !!}
				                    <div class="" id="indicator_name_in_arabic-error"></div>
			                    </div> 
	                 		</div>
	                 		<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('indicator_name_in_french', 'Indicator Name (In french)') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    {!! Form::text('indicator_name_in_french',null , array('class' => 'form-control')) !!}
				                        <div class="" id="indicator_name_in_french-error"></div>
			                    </div> 
	                 		</div>
	                    </div>
		     			<div class="form-group row">
		     				<div class="col-lg-4">
		     					<div class="form-group"> 
				                    {!! Form::label('value', 'Value') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    {!! Form::text('value',null ,array('class' => 'form-control','id'=>'cours_vente')) !!}
				                    <div class="" id="value-error"></div>
				                </div>
		     				</div>
		     				<div class="col-lg-4">
				                <div class="form-group">
				                    {!! Form::label('date', 'Date') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    <div class="input-group">
				                    {!! Form::text('date', isset($event->start_date) ? date('m/d/Y', strtotime($event->start_date)): date('m/d/Y'), array('class' => 'form-control','id'=> 'start_date')) !!}
				                    <label class="input-group-btn" for="txtDate">
				                        <span class="btn btn-default">
				                            <span class="far fa-calendar"></span>
				                        </span>
				                    </label>
				                    </div>
				                        <div class="" id="date-error"></div>
				                </div> 
		            		</div>
		            		<div class="col-lg-4">
			                    <div class="form-group">
			                        {!! Form::label('display_order', 'Display Order',['class' => '']) !!}
			                        {!! Form::label('', '*',['style' => 'color:red']) !!}
			                        {!! Form::text('display_order',$display_order, ['class' => 'form-control']) !!}
			                        <div class="error_display" id="display_order-error"></div>
			                    </div> 
		                	</div>
		     			</div>
		                <div class="form-group row">
		                    <div class="col-lg-4">
			                    <div class="form-group">
			                        {!! Form::label('status', 'Status') !!}<br/>
			                        {!! Form::checkbox('status',1,1) !!}
			                        {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
			                    </div>
		                	</div>
		                </div>
	            </div>
	            <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary saveBtn" id="saveBtn" value="create">Submit
                    </button>
                </div>
            {!! Form::close() !!}