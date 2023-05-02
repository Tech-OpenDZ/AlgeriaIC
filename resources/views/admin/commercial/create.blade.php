 <div class="modal-header">
    <h4 class="modal-title" id="modelHeading">Add Commercial Quote</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
 </div>
 {!! Form::open(array('method'=>'POST','url' => '#','class' => 'form-horizontal' ,'id' => 'quoteForm','files'=>true)) !!}
            <!-- <form id="quoteForm" name="quoteForm" class="form-horizontal"> -->
	            <div class="modal-body">
	                <input type="hidden" name="quote_id" id="quote_id">
	                    <div class="form-group row">
	                    	<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('base', 'Base') !!}
			                        {!! Form::label('', '*',['style' => 'color:red']) !!}
			                        {!! Form::text('base',null ,array('class' => 'form-control','id'=>'base')) !!}
			                        <div class=""  id="base-error"></div>
			                    </div> 
	                 		</div>
	                 		<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('devis', 'Devis') !!}
			                        {!! Form::label('', '*',['style' => 'color:red']) !!}
			                        {!! Form::text('devis',null ,array('class' => 'form-control','id'=>'devis')) !!}
			                        <div class=""  id="devis-error"></div>
			                    </div> 
	                 		</div>
	                 		<div class="col-lg-4">
			                    <div class="form-group"> 
			                        {!! Form::label('cours_achat', 'Cours Achat') !!}
			                        {!! Form::label('', '*',['style' => 'color:red']) !!}
			                        {!! Form::text('cours_achat',null ,array('class' => 'form-control','id'=>'cours_achat')) !!}
			                        <div class=""  id="cours_achat-error"></div>
			                    </div> 
	                 		</div>
	                    </div>
		     			<div class="form-group row">
		     				<div class="col-lg-4">
		     					<div class="form-group"> 
				                    {!! Form::label('cours_vente', 'Cours Vente') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    {!! Form::text('cours_vente',null ,array('class' => 'form-control','id'=>'cours_vente')) !!}
				                    <div class=""  id="cours_vente-error"></div>
				                </div>
		     				</div>
		     				<div class="col-lg-4">
				                <div class="form-group">
				                    {!! Form::label('start_date', 'Start Date') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    <div class="input-group">
				                    {!! Form::text('start_date', isset($event->start_date) ? date('m/d/Y', strtotime($event->start_date)): date('m/d/Y'), array('class' => 'form-control','id'=> 'start_date')) !!}
				                    <label class="input-group-btn" for="txtDate">
				                        <span class="btn btn-default">
				                            <span class="far fa-calendar"></span>
				                        </span>
				                    </label>
				                    </div>
				                     <div class="" id="start_date-error"></div>
				      
				                </div> 
		            		</div>
		            		<div class="col-lg-4">
				                <div class="form-group">
				                    {!! Form::label('end_date', 'End Date') !!}
				                    {!! Form::label('', '*',['style' => 'color:red']) !!}
				                    <div class="input-group">
				                    {!! Form::text('end_date', isset($event->start_date) ? date('m/d/Y', strtotime($event->start_date)): date('m/d/Y'), array('class' => 'form-control','id'=> 'end_date')) !!}
				                    <label class="input-group-btn" for="txtDate">
				                        <span class="btn btn-default">
				                            <span class="far fa-calendar"></span>
				                        </span>
				                    </label>
				                    </div>
				                    <div class=""  id="end_date-error"></div>  
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
		                	<div class="col-lg-4">
			                    <div class="form-group">
			                        {!! Form::label('display_order', 'Display Order',['class' => '']) !!}
			                        {!! Form::label('', '*',['style' => 'color:red']) !!}
			                        {!! Form::text('display_order',$display_order, ['class' => 'form-control']) !!}
			                        <div class=""  id="display_order-error"></div>
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