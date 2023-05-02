@extends('admin.layouts.master')
@section('content')
    <div class="card card-custom gutter-b" style="width: 100%;margin: 0 auto;">
        <div class="card-header">
            <div class="card-title" style="width: 100%;">
                <h3 class="card-label pull-left"  style="width: 100%;">
                     Advertisement Report
                </h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-advertisement.index') }}">Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->

        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        {{-- <h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1> --}}
                        <div class="d-flex flex-column col-md-5">
                            <span class="d-flex flex-column ">
                                Advertisement :
                                <span>{{ $advertisement->title }}</span>
                            </span>
                        </div>
                        <div class="d-flex flex-column align-items-md-end px-10">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5">
                                <img src="{{asset('storage/uploads/advertisement/'.$advertisement->ad)}}" alt="" width="100%">
                            </a>
                            <!--end::Logo-->

                        </div>
                    </div>
                    <div class="border-bottom w-100"></div>
                    <div class="d-flex justify-content-between pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Location</span>
                            <span class="opacity-70">{{ App\Models\Advertisement::location[$advertisement->location] }}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Adv. Type</span>
                            <span class="opacity-70">{{ App\Models\Advertisement::advertisement_type[$advertisement->advertisement_type] }}</span>
                        </div>
                       
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Formula Type</span>
                            @if($advertisement->formula_type != null)
                            <span class="opacity-70">{{ App\Models\Advertisement::formula_type[$advertisement->formula_type] }}</span>
                            @endif
                        </div>
                        
                        @if($advertisement->formula_type == 'date')
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Date</span>
                            <span class="opacity-70">{{$advertisement->start_date}} - {{$advertisement->end_date}}</span>
                        </div>
                        @endif
                        @if($advertisement->formula_type == 'clicks')

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Number of Clicks</span>
                            <span class="opacity-70">{{$advertisement->number_of_clicks ?? 0}}</span>
                        </div>
                        @endif
                        @if($advertisement->formula_type == 'displays')

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Number of Displays</span>
                            <span class="opacity-70">{{$advertisement->number_of_displays ?? 0}}</span>
                        </div>
                        @endif
                        @if($advertisement->formula_type == 'keyword')

                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">Keywords</span>
                            <span class="opacity-70">{{$advertisement->keywords}}</span>
                        </div>

                            @if($advertisement->for_keyword == 'clicks')

                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Number of Clicks</span>
                                <span class="opacity-70">{{$advertisement->number_of_clicks ?? 0}}</span>
                            </div>
                            @endif
                            @if($advertisement->for_keyword == 'displays')

                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">Number of Displays</span>
                                <span class="opacity-70">{{$advertisement->number_of_displays ?? 0}}</span>
                            </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->

            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0" style="margin-left: 10px;margin-right: 10px;">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                        <div class="d-flex flex-column mb-10 mb-md-0">
                            <div class="font-weight-bolder font-size-lg mb-3">Advertisement Campaign Audience</div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Number of Displays:</span>
                                <span class="text-right">{{ $advertisement->actual_number_of_displays }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Number of Clicks:</span>
                                <span class="text-right">{{ $advertisement->actual_number_of_clicks }}</span>
                            </div>
                            <div class="d-flex justify-content-between" >
                                @php
                                    if($advertisement->actual_number_of_displays == 0)
                                        $dctr = '0 %';
                                    else{
                                        $ctr = $advertisement->actual_number_of_clicks / $advertisement->actual_number_of_displays * 100;

                                        $dctr = round($ctr,2).' %';
                                    }
                                @endphp
                                <span class="mr-15 font-weight-bold">CTR:</span>
                                <span class="text-right">{{$dctr}}</span>
                            </div>
                        </div>
                        {{-- <div class="d-flex flex-column text-md-right">
                            <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span>
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1">$20.600.00</span>
                            <span>Taxes Included</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        {{-- <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button> --}}
                        {{-- <button type="button" class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#myModal">Send to Client</button> --}}
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!-- end: Invoice-->
        </div>
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Send Report to Client</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('manage-advertisement-report') }}" method="post">
            @csrf
        <div class="modal-body">
        <input type="hidden" name="ad_id" value="{{ $advertisement->id }}">
              <div class="form-group">
                <label>Client Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Send</button>
        </div>
        </form>

      </div>

    </div>
  </div>
@endsection


