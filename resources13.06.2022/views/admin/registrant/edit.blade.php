{!! Form::open(['method' => 'post', 'url' => '#', 'id' => 'add_reply_form','files' => true]) !!}
	<div class="modal-header">
	    <h4 class="modal-title">Inquiry From : {{$inquiry->username}}</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <i aria-hidden="true" class="ki ki-close"></i>
	        </button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6" >
					<span>Email</span>: {{$registrant->email}}

				</div>
				<div class="col-sm-6" >
					Company: {{$registrant->company}}
				</div>
			</div>
		</div>
		<div class="">
					<span class="">{{$registrant->subject}}</span>
				</div>
		<div class="messages">
				<div class="d-flex flex-column mb-5 align-items-start">
					<div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px user_message">{{$registrant->message}}</div>
                    <span style="font-size: 8px">{{ $registrant->created_at->format('d/m/Y h:i') }}</span>
				</div>
				@if($registrant->replies)
					@foreach($registrant->replies as $replies)
				<div class="d-flex flex-column mb-5 align-items-end new_message">
					<div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px reply_text_message" id="">{{$replies->reply}}</div>
                    <span style="font-size: 8px">{{ $replies->created_at->format('d/m/Y h:i') }}</span>
				</div>
					@endforeach
				@endif
		</div>
		{{ Form::hidden('registrant_id', $registrantId) }}

		{!! Form::textarea('reply', null, ['id' => 'reply_admin', 'class' => 'form-control border-0 p-0 text_area', 'rows' => 2, 'placeholder'=>'Please Type your reply here..']) !!}
		<p class="error_message" style="color: #F64E60;"></p>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
	    <button type="submit" id="" class="btn btn-primary font-weight-bold saveBtn">Reply</button>
	</div>
{!! Form::close() !!}
