<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('plan_name_in_english', 'Plan Name (In english)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('plan_name_in_english',isset($subscription->plan_name_in_english) ? $subscription->plan_name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('plan_name_in_english')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('plan_name_in_arabic', 'Plan Name (In arabic)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('plan_name_in_arabic',isset($subscription->plan_name_in_arabic) ? $subscription->plan_name_in_arabic: '' , array('class' => 'form-control')) !!}
                    @error('plan_name_in_arabic')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('plan_name_in_french', 'Plan Name (In French)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('plan_name_in_french',isset($subscription->plan_name_in_french) ? $subscription->plan_name_in_french: '' , array('class' => 'form-control')) !!}
                    @error('plan_name_in_french')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description_in_english', 'Description (In english)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_english',isset($subscription->description_in_english) ? $subscription->description_in_english: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-1']) !!}
            @error('description_in_english')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('description_in_arabic', 'Description (In arabic)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_arabic', isset($subscription->description_in_arabic) ? $subscription->description_in_arabic: '', ['class' => 'form-control summernote', 'id' => 'kt-summernote-2']) !!}
            @error('description_in_arabic')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('description_in_french', 'Description (In french)',['class' => 'required-class']) !!}
            {!! Form::label('', '*',['style' => 'color:red']) !!}
            {!! Form::textarea('description_in_french', isset($subscription->description_in_french) ? $subscription->description_in_french: '' , ['class' => 'form-control summernote', 'id' => 'kt-summernote-3']) !!}
            @error('description_in_french')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('duration', 'Duration (In years)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::number('duration', isset($subscription->duration) ? $subscription->duration : '', array('class' => 'form-control')) !!}
                    @error('duration')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('no_of_users', 'Number of users',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::number('no_of_users', isset($subscription->no_of_users) ? $subscription->no_of_users : '', array('class' => 'form-control')) !!}
                    @error('no_of_users')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                {!! Form::label('', 'Status') !!}<br/><br/>
                {!! Form::checkbox('status',1,isset($subscription->status)?$subscription->status:1) !!}
                {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('price_dollar', 'Price (In UDS)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::number('price_dollar', isset($subscription->price_dollar) ? $subscription->price_dollar : '', array('class' => 'form-control')) !!}
                    @error('price_dollar')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('price_dzd', 'Price (In DZD)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::number('price_dzd', isset($subscription->price_dzd) ? $subscription->price_dzd : '', array('class' => 'form-control')) !!}
                    @error('price_dzd')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('price_euro', 'Price (In EURO)',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::number('price_euro', isset($subscription->price_euro) ? $subscription->price_euro : '', array('class' => 'form-control')) !!}
                    @error('price_euro')
                        <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                {!! Form::label('ordering','Ordering') !!}
                {!! Form::number('ordering', isset($subscription->ordering) ? $subscription->ordering:0, ['class'=>'form-control']) !!}
                @error('ordering')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="form-group row">
                <div class="col-lg-12">
                    {!! Form::label('permissions[]', 'Permissions',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <button  type="button" class="btn btn-primary mr-2 ml-2" id="select_all_permissions">Select all</button>
                    <button  type="button" class="btn btn-primary" id="remove_all_permissions">Remove all</button>
                </div>
            </div>
            {!! Form::select('permissions[]',$permission_arr,$selected_permissions,['class' =>'form-control select2','multiple','id'=>'kt_select2_3']) !!}
            @error('permissions')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="form-group">
            {!! Form::label('', 'Status') !!}<br/><br/>
            {!! Form::checkbox('status',1, isset($subscription->status) ? $subscription->status : 1) !!}
            {!! Form::label('status', 'Active/Inactive',['class' => 'required-class','data-parsley-required' => 'true']) !!}
            @error('status')
                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
            @enderror
        </div> --}}
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-subscription.index') }}">Cancel</a>
    </div>
</form>
