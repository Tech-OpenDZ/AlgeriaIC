@extends('admin.layouts.master')
@section('head')
	<style type="text/css">
	.dataTables_filter{
		display: none;
		}
	</style>
@endsection
@section('content')
@include('alert_messages')
<div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Section-->
            <div class="d-flex align-items-center">

                <!--begin::Info-->
                <div class="d-flex flex-column mr-auto">
                    <!--begin: Title-->
                    <!--<a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{$user->name}}</a>
                    <span class="text-muted font-weight-bold">{{$user->job_title}} at {{$user->company_name}}</span> -->
                    <!--end::Title-->
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url()->previous() }}">Retour</a>
                </div>
            </div>
            <!--end::Section-->
            <!--begin::Content-->
            <div class="d-flex flex-wrap mt-7">

                <!--<div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Subscription</span>
                    <span>{{$subscription->localeAll[0]->name}}</span>
                </div>
                @if ($is_parent && $parent_data->payment_status == 'completed' && $parent_data->subscription_id >1)
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Start Date</span>
                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{date('d M Y',strtotime($plan_data->start_date))}}</span>
                </div>
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Expiry Date</span>
                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{date('d M Y',strtotime($plan_data->end_date))}}</span>
                </div>
                @else
                <div class="mr-12 d-flex flex-column mb-7">
                    <span class="d-block font-weight-bold mb-4">Payment Status</span>
                    @if ($parent_data->subscription_id == 1)
                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                    @else
                        @if ($parent_data->payment_status == 'completed')
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                        @else
                        <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{$parent_data->payment_status}}</span>
                        @endif
                    @endif
                </div>
                @endif
            </div> -->
            <!--begin::Text-->
                    <div class="row">
                        <div class="col-xl-6">
                            <p class="mb-7 mt-3"><strong>Nom et Prénom: </strong>{{$user->name}}</p>
                            <p class="mb-7 mt-3"><strong>Job Title: </strong>{{$user->job_title}}</p>
                            <p class="mb-7 mt-3"><strong>Entreprise: </strong>{{$user->company_name}}</p>

                            <p class="mb-7 mt-3"><strong>Username: </strong>{{$user->username}}</p>
                            <p class="mb-7 mt-3"><strong>Téléphone: </strong>{{$user->mobile_number}}</p>
                            <p class="mb-7 mt-3"><strong>Company Address: </strong>{{$user->company_address}}</p>
                            <p class="mb-7 mt-3"><strong>Pays: </strong>{{$user->pays}}</p>
                            <p class="mb-7 mt-3"><strong>Wilaya: </strong>{{$user->wilaya}}</p>
                        </div>
                        <div class="col-xl-6">

                            @if (!$is_parent)
                                <p class="mb-7 mt-3"><strong>Main User Username: </strong>{{$parent_data->username}}</p>
                            @endif
                            <p class="mb-7 mt-3"><strong>Email: </strong>{{$user->email}}</p>
                            <p class="mb-7 mt-3"><strong>Provenance: </strong>{{$user->provenance}}</p>
                            <p class="mb-7 mt-3"><strong>Autre Provenance: </strong>{{$user->other_provenance}}</p>
                            <p class="mb-7 mt-3"><strong>Crée le: </strong>{{date('d M Y',strtotime($user->created_at))}}</p>
                            <p class="mb-7 mt-3"><strong>Commentaire: </strong>{{$user->note}}</p>


                        </div>
                    </div>
           
           <!-- @if ($is_parent && $parent_data->subscription_id > 1)
            <p class="mb-7 mt-3"><strong>Account Users ( {{count($child_data)}}/{{$parent_data->subscription->no_of_users}})</strong></p>
                @if(!$child_data->isEmpty())
                    @foreach ($child_data as $customer)
                    <p class="mt-2">{{$customer->email}}</p>
                    @endforeach
                @else
                <p class="mt-2">No sub user added.</p>
                @endif
            @endif -->

        </div>

    </div>
    <!--end::Card-->
</div>
@endsection
