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
                
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('manage-prospect.index') }}"> Retour </a>
                </div>
            </div>
            <!--end::Section-->
            <!--begin::Content-->
            <div class="d-flex flex-wrap mt-7">

               
            <div class="row">
                <div class="col-xl-6">
                <p class="mb-7 mt-3"><strong>Nom et Prénom: </strong>{{$prospect->name}}</p>
                <p class="mb-7 mt-3"><strong>Job Title: </strong>{{$prospect->job_title}}</p>
                <p class="mb-7 mt-3"><strong>Entreprise: </strong>{{$prospect->company_name}}</p>
                
                    <!-- <p class="mb-7 mt-3"><strong>Username: </strong>{{$prospect->username}}</p> -->
                    <p class="mb-7 mt-3"><strong>Téléphone: </strong>{{$prospect->mobile_number}}</p>
                    <p class="mb-7 mt-3"><strong>Company Address: </strong>{{$prospect->company_address}}</p>
                    <p class="mb-7 mt-3"><strong>Pays: </strong>{{$prospect->pays}}</p>
                    <p class="mb-7 mt-3"><strong>Wilaya: </strong>{{$prospect->wilaya}}</p>
                </div>
                <div class="col-xl-6">

                   
                    <p class="mb-7 mt-3"><strong>Email: </strong>{{$prospect->email}}</p>
                    <p class="mb-7 mt-3"><strong>Provenance: </strong>{{$prospect->provenance}}</p>
                    <p class="mb-7 mt-3"><strong>Autre Provenance: </strong>{{$prospect->other_provenance}}</p>
                    <p class="mb-7 mt-3"><strong>Crée le: </strong>{{date('d M Y',strtotime($prospect->created_at))}}</p>
                    <p class="mb-7 mt-3"><strong>Commentaire: </strong>{{$prospect->note}}</p>

                    
                </div>
            </div>
          

        </div>

    </div>
    <!--end::Card-->
</div>
@endsection
