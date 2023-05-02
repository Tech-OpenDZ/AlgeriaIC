<form class="form">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-lg-12">
                <!--<div class="form-group">
                    {!! Form::label('logo', 'Image',['class' => 'required-class']) !!}
                    @if(isset($press_data->id))
                        <div class="form-group">
                            <?php
                            $press_image = $press_data->press_image;
                            $press_icon =  trim($press_image, '"');
                            echo $press_icon;
                            ?>
                        </div>
                    @endif
                </div> -->
               <br>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_english', 'Name(In english)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_english',isset($press_data->name_in_english) ? $press_data->name_in_english : '' , array('class' => 'form-control')) !!}
                    @error('name_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_arabic', 'Name(In arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_arabic',isset($press_data->name_in_arabic) ? $press_data->name_in_arabic : '' , array('class' => 'form-control')) !!}
                    @error('name_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('name_in_french', 'Name(In french)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('name_in_french',isset($press_data->name_in_french) ? $press_data->name_in_french : '' , array('class' => 'form-control')) !!}
                    @error('name_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('function_in_english', 'Function (In English)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('function_in_english',isset($press_data->function_in_english) ? $press_data->function_in_english: '' , ['class' => 'form-control', 'id' => '','rows' => 3]) !!}
                    @error('function_in_english')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('function_in_arabic', 'Function (In Arabic)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('function_in_arabic',isset($press_data->function_in_arabic) ? $press_data->function_in_arabic: '' , ['class' => 'form-control', 'id' => '','rows' => 3]) !!}
                    @error('function_in_arabic')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('function_in_french', 'Function (In French)') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('function_in_french',isset($press_data->function_in_french) ? $press_data->function_in_french: '' , ['class' => 'form-control', 'id' => '','rows' => 3]) !!}
                    @error('function_in_french')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('press_link', 'Press Link') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('press_link',isset($press_data->press_link) ? $press_data->press_link: '' , ['class' => 'form-control', 'id' => '','rows' => 3]) !!}
                    @error('press_link')
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
                    {!! Form::label('publication_date', 'Publication Date',['class' => 'required-class mb-6']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    <input id="time" name="publication_date" type="date" value="{{old('publication_date')?? date('Y-m-d') }}" class=" form-control @error('publication_date') is-invalid @enderror" autocomplete="off">
                </div>
            </div>
            
        </div>


       <br>


        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('img_link', 'Image Link') !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::textarea('img_link',isset($press_data->img_link) ? $press_data->img_link: '' , ['class' => 'form-control', 'id' => '','rows' => 3]) !!}
                    @error('img_link')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <br>

        <div class="form-group row">
                <div class="col-lg-4">
                    @if(isset($press->press_image))
                    {!! Form::label('', 'Selected Press Image') !!}<br /><br />
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <a href="{{ asset('storage/uploads/press/'.$press->id.'/image/'.$press->press_image)}} " target="_blank"><img src="{{ asset('storage/uploads/press/'.$press->id.'/image/'.$press->press_image)}}"  class="imageThumb"></a><br>

                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('', 'Press Image') !!}<br /><br />
                                <button type="button" style="display:block;width:850px; height:40px;border:none" onclick="document.getElementById('press_image').click()" id="browse_image">Browse</button>
                                {!! Form::file('press_image',['class' =>'form-control','','id'=>'press_image','style'=>'display:none']) !!}
                                @error('press_image')
                                <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <br>

        

        <div class="form-group row">
            <div class="col-lg-12">
                <div class="form-group">
                    {!! Form::label('display_order', 'Display Order',['class' => 'required-class']) !!}
                    {!! Form::label('', '*',['style' => 'color:red']) !!}
                    {!! Form::text('display_order',isset($press_data->display_order) ? $press_data->display_order: $display_order , array('class' => 'form-control')) !!}
                    @error('display_order.*')
                    <div class="bg-danger-o-50 py-2 px-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}<br/><br/>
                    {!! Form::checkbox('status',1, isset($press_data->status) ? $press_data->status : '') !!}
                    {!! Form::label('status', 'Active/Inactive') !!}
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="{{ route('manage-press.index') }}">Cancel</a>
    </div>
</form>

<script src="{{asset('dist/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
<script>
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $('.datepicker').datepicker();
            $("#logo").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_logo");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });

                        // Old code here
                        /*$("<img></img>", {
                            class: "imageThumb",
                            src: e.target.result,
                            title: file.name + " | Click to remove"
                        }).insertAfter("#files").click(function(){$(this).remove();});*/

                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
            $("#press_image").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_image");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
            $("#documents").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                            "<br/> <a href=\"javascript:void(0)\" class=\"remove\"><i class=\"far fa-trash-alt\" style=\"color: #F64E60;\"></i></a>" +
                            "</span>").insertBefore("#browse_documents");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
                s
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
        $('#delete_image_hidden').val('');
        $(".removeSelected").click(function() {
            var data = $(this).data('id');
            var type = $(this).data('type');
            $('#delete_image_hidden').val(data);
            $('#delete_type_hidden').val(type);
            $('#removeImageModal').modal('show');
        });

    });

    // Code for text editor
 

 

   

    

   
    
   
   

 

    

</script>

<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('dist/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('dist/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.4')}}"></script>
<!--end::Page Scripts-->


