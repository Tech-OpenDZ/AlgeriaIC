<div class="modal-content">
        <!-- Modal Header -->
        @foreach($testimonials as $testimonial)
           @foreach($testimonial['localeAll'] as $testimonial_translate)
          <input type="hidden" name="id" value="{{$testimonial->id}}">
            <div class="modal-header">
              <h4 class="sub-heading">{{$testimonial_translate->name}}</h4><br>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <p class="modal-innner-text mb-2">
              {{ html_entity_decode(strip_tags($testimonial_translate->description))}} 
              </p>
              <div class="authour-detail">
                <div class="authour-detail__left">

                  <img src="{{ isset($testimonial->image)? asset('storage/uploads/testimonial/'.$testimonial->image):  asset('storage/uploads/testimonial/default-image.png') }}" alt="authour" class="img-fluid">
                </div>
                <div class="authour-detail__right">
                    <strong><p class="authour-name">{{$testimonial_translate->name}}</p></strong>
                    <p class="mt-1">{{$testimonial_translate->sub_title}}</p>
                    <p class="mt-1">@lang('testimonial.company')</p>
                </div>
              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="common-button" data-dismiss="modal">@lang('testimonial.close')</button>
            </div>
          @endforeach
        @endforeach
</div> 


     

                                                  