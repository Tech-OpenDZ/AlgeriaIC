<div class="modal-header">
    <h4 class="modal-title"></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
	<input type="hidden" name class="slide_index" value="">
    @foreach( $categories as $category )
       <div class="mySlides">
        <a href="{{$category->link}}" target="_blank">
      		<img src="{{ asset('storage/uploads/banner/'.$category->banner_img)}}" alt="{{ $category->link }}" style="width:100%">
        </a>
       </div>
    @endforeach
       <div style="text-align:center">
       	 @foreach( $categories as $category )
  		  <span class="dot"></span>
  		 @endforeach   
      </div>
    <a class="banner_prev banner_slideButton" data-id="-1">&#10094;</a>
    <a class="banner_next banner_slideButton" data-id="1">&#10095;</a>
</div>