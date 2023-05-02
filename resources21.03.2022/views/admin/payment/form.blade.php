<form class="form">
    <div class="card-body">

        <div class="form-group">
            {!! Form::label('transaction_id', 'Transaction Id') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('transaction_id',isset($payment->transaction_id) ? $payment->transaction_id : '' , array('class' => 'form-control','readonly' => 'readonly')) !!}
            @error('transaction_id')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('module_type', 'Module Type') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('module_type',isset($payment->module_type) ? $payment->module_type: '' , array('class' => 'form-control','readonly' => 'readonly')) !!}
            @error('module_type')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::number('price',isset($payment->price) ? $payment->price: '' , array('class' => 'form-control','' => '')) !!}
            @error('plan_name_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('currency', 'Currency') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('currency',isset($currency) ? $currency: '' , array('class' => 'form-control','readonly' => 'readonly')) !!}
            @error('currency')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('payment_mode', 'Payment Mode') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('payment_mode',isset($payment_mode) ? $payment_mode: '' , array('class' => 'form-control','readonly' => 'readonly')) !!}
            @error('payment_mode')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('payment_type', 'Payment Type') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::text('payment_type',isset($payment_type) ? $payment_type: '' , array('class' => 'form-control','readonly' => 'readonly')) !!}
            @error('payment_type')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!!Form::select('status',App\Models\PaymentTransaction::status, isset($payment->status) ? $payment->status: null, ['class' => 'form-control','id'=>'page-type'])!!}

            @error('payment_type')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('note', 'Note',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('note', isset($payment->note) ? $payment->note: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('note')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-payment.index') }}">Cancel</a>
    </div>
</form>
