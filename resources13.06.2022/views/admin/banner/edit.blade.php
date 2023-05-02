@extends('admin.layouts.master')
@section('head')
<style type="text/css">
.dataTables_filter{
	display: none;
	}
 .mySlides {
  display: none;
}

.cursor {
  cursor: pointer;
}
.dot {
  height: 15px;
  width: 15px;
  margin: -14px 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
/* Next & previous buttons */
.banner_prev,
.banner_next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white!important;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.banner_next {
  right: 22px;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.banner_prev:hover,
.banner_next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.slider_banner .active {
  background-color: #717171;
}
.slider_banner .active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.slider_banner .modal-dialog{
    max-width: 938px;
}
.slider_banner .close{
    font-size:35px;
}
</style>
@endsection
@section('content')
@include('alert_messages')
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">Banners</h3>
		</div>
		<div class="card-toolbar">
            @if( \Auth::user()->can('banner-create'))
            <button id="createNewBanner" class="btn btn-primary font-weight-bolder createNewBanner" data-toggle="modal" data-target="#ajaxModel" data-id = "{{$categoryId}}">
                <span class="svg-icon svg-icon-md">
                </span>Add Record
            </button>

      &nbsp;&nbsp;
            @endif
            @if (!$banners->isEmpty())
                <button id="DisplayBanner" class="btn btn-primary font-weight-bolder DisplayBanner" data-id = "{{$categoryId}}" data-toggle="modal" data-target="#BannerModel" >
                    <span class="svg-icon svg-icon-md">
                    </span>Preview
                </button>
            @endif
		</div>
	</div>
	<div class="card-body">
		<input type="hidden" name="cat_id" id="Category_id" value="{{$categoryId}}">
		<div class="dataTables_wrapper dt-bootstrap4 no-footer">
   			<div class="row">
   				<div class="col-sm-12">
		   			<table class="table table-bordered  table-checkable" id="bannermanage_datatable">
		   				<thead class="datatable-head">
			   				<tr>
							   <th scope="col">Banner</th>
							   <th scope="col">Link</th>
							   <th scope="col">Status</th>
							   <th scope="col">Created at</th>
							   <th scope="col">Action</th>
							</tr>
		   				</thead>
		   				<tbody>
		   				</tbody>
		   			</table>
   				</div>
   			</div>
   		</div>
	</div>
</div>
<div class="modal hide fade" id="ajaxModel" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

		</div>
	</div>
</div>
<div class="modal hide fade slider_banner" id="BannerModel"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
</div>
<!-- User Delete confirmation model -->
 <div id="adminModal" class="modal fade" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>

<div class="modal fade" id="bannerModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<script type="text/javascript">
	$(function () {
	var cat_id = document.getElementById("Category_id").value;;
	var url = '{{ route("manage-banner.edit", ":id") }}';
	url = url.replace(':id', cat_id );
    var table = $('#bannermanage_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: url,
          data: function (d){
          	d.category = cat_id;
          }
        },
        columns: [
            {data: 'banner_img', name: 'banner_img'},
            {data: 'link', name: 'link'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('body').on('click', ".createNewBanner", function(e) {
        e.stopPropagation();
        var banner_id = $(this).data('id');
        $.ajax({
            url: '{{ route("manage-banner.create") }}',
            type: 'get',
            data:{ cat_id:banner_id },
            success: function(response){
              $('.modal-content').html(response);
              $('#modelHeading').html("Create Banner");
              $('#ajaxModel').modal('show');
            }
        })
    });


$('body').on('click','.submit_banner',function(e){
    e.preventDefault();
    var form = $('form')[0];
     var formData = new FormData(form);
        
         e.preventDefault();
         $.ajax({
             url: "{{ route('manage-banner.store')}}",
             data:formData,
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             type: "POST",
             beforeSend : function(){
                $('#save-banner-changes').attr("disabled","disabled");
            },
             success: function (data) {
                console.log(data);
                if(data.success){
                    location.reload();
                }
                if(data.errors){
                    console.log(data.errors['image']);
                    $(".error_message").html(data.errors[0]);
                    if(data.errors['image']){
                        $(".error_banner").css('display','block');
                        $(".error_banner").html(data.errors['image']);

                    }
                    if(data.errors['display_order']){
                        $(".error_display").css('display','block');
                        $(".error_display").html(data.errors['display_order']);

                    }
                    if(data.errors['header_in_english']){
                        $(".error_header_in_english").css('display','block');
                        $(".error_header_in_english").html(data.errors['header_in_english']);
                    }
                    if(data.errors['header_in_arabic']){
                        $(".error_header_in_arabic").css('display','block');
                        $(".error_header_in_arabic").html(data.errors['header_in_arabic']);
                    }
                    if(data.errors['header_in_french']){
                        $(".error_header_in_french").css('display','block');
                        $(".error_header_in_french").html(data.errors['header_in_french']);
                    }
                    if(data.errors['content_in_english']){
                        $(".error_content_in_english").css('display','block');
                        $(".error_content_in_english").html(data.errors['content_in_english']);
                    }
                    if(data.errors['content_in_arabic']){
                        $(".error_content_in_arabic").css('display','block');
                        $(".error_content_in_arabic").html(data.errors['content_in_arabic']);
                    }
                    if(data.errors['content_in_french']){
                        $(".error_content_in_french").css('display','block');
                        $(".error_content_in_french").html(data.errors['content_in_french']);
                    }
                }

          }
         });
    });

    $('body').on('click', ".DisplayBanner", function(e) {
        e.stopPropagation();
        var banner_id = $(this).data('id');
        var route = '{{ route("displayBanner", ":id") }}';
        route = route.replace(':id', banner_id );
        $.ajax({
            url: route,
            type: 'get',
            success: function(response){
              $('.modal-content').html(response);
              $('#BannerModel').modal('show');
              $('body').find("#BannerModel").find(".slide_index").val(1);
              var slideIndex = 1;
              showSlides(slideIndex);
              function showSlides(n) {
                  var i;
                  var slides = $('body').find("#BannerModel").find('.mySlides');
                  var dots = document.getElementsByClassName("demo");
                  var captionText = document.getElementById("caption");
                  if (n > slides.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                      slides[i].style.display = "none";
                  }
                  for (i = 0; i < dots.length; i++) {
                      dots[i].className = dots[i].className.replace("active", "");
                  }
                  slides[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += "active";
                  captionText.innerHTML = dots[slideIndex-1].alt;

                }

            }
        })
    });



    $('body').on('click', ".delete_admin_btn", function(e) {
        e.stopPropagation();
        var del_id = $(this).data('id');
        var destroy_url = $(this).data('href');
        var url = '{{ route("bannerDelete", ":id") }}';
        url = url.replace(':id', del_id );
        $.ajax({
            url: url,
            type: 'get',
            success: function(response){
              $('.modal-content').html(response);
              $('#adminModal').modal('show');
            }
        })
    });
    var slideIndex = 1;
    var timer = null;
   $(document).on('click', '.banner_slideButton', function (event) {
        clearTimeout(timer);
        var n = $(this).data('id');
        showSlides(slideIndex += n);
        function showSlides(n) {
              var i;
              var slides = $('body').find("#BannerModel").find('.mySlides');
              console.log(slideIndex);
              var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
              captionText.innerHTML = dots[slideIndex-1].alt;
        }
    });

   $(document).on('show.bs.modal', '.slider_banner', function (e) {
      var slideIndex = 0;
      showSlides();
        function showSlides() {
          var i;
          var slides = $('body').find("#BannerModel").find('.mySlides');
          var dots = $('body').find("#BannerModel").find('.dot');
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

    });
});

$('body').on('click', ".editbanner", function(e) {
        e.stopPropagation();
        var banner_id = $(this).data('id');
        console.log(banner_id);
        var url = '{{ route("edit-banner", ":id") }}';
	    url = url.replace(':id', banner_id );
        $.ajax({
            url: url,
            type: 'get',
            data:{ id:banner_id },
            success: function(response){
            	// console.log(response);
              $('#bannerModel').modal('show');
              $('.modal-content').html(response.html);
            }
        });
  });

  $('body').on('click', ".update_banner", function(e) {

    e.preventDefault();
    var form = $('form')[0];
    var formData = $('form').serialize();
    var banner_id = $("#banner_id").val();
    var url = '{{ route("update-banner", ":id") }}';
	  url = url.replace(':id', banner_id );
         e.preventDefault();
         $.ajax({
             url: url,
             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
             data:formData,
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             type: "POST",
             beforeSend : function(){
                $('#save-banner-changes').attr("disabled","disabled");
            },
             success: function (data) {
                console.log(data);
                if(data.success){
                    location.reload();
                }
                if(data.errors){
                    console.log(data.errors['image']);
                    $(".error_message").html(data.errors[0]);
                    if(data.errors['image']){
                        $(".error_banner").css('display','block');
                        $(".error_banner").html(data.errors['image']);

                    }
                    if(data.errors['display_order']){
                        $(".error_display").css('display','block');
                        $(".error_display").html(data.errors['display_order']);

                    }

                }

          }
         });
  });



  
</script>
@endsection
