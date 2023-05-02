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
                    <a class="btn btn-primary" href="{{ url()->previous() }}"> Retour </a>
                </div>
            </div>
            <!--end::Section-->
            <!--begin::Content-->
            <div class="d-flex flex-wrap mt-7">

           
            <!--begin::Text-->
            <div class="row">
                <div class="col-xl-6">
                <p class="mb-7 mt-3"><strong>Nom et Prénom: </strong>{{$row->username}}</p>
                <p class="mb-7 mt-3"><strong>Job Title: </strong>{{$row->job_title}}</p>
                <p class="mb-7 mt-3"><strong>Entreprise: </strong>{{$row->company}}</p>
                
                    <p class="mb-7 mt-3"><strong>Username: </strong>{{$row->username}}</p>
					<p class="mb-7 mt-3"><strong>Email: </strong>{{$row->email}}</p>
                    <p class="mb-7 mt-3"><strong>Téléphone: </strong>{{$row->phone_number}}</p>
					<p class="mb-7 mt-3"><strong>Subject: </strong>{{$row->subject}}</p>

					
                  
                   
                </div>
                <div class="col-xl-6">

                    <p class="mb-7 mt-3"><strong>Crée le: </strong>{{date('d M Y',strtotime($row->created_at))}}</p>
                    <br>
                    <p class="mb-7 mt-3"><strong>Message: </strong>{{$row->message}}</p>
                    <br>
                    <p class="mb-7 mt-3"><strong>Commentaire: </strong>{{$row->note_inquiry}}</p>

                    
                </div>
            </div>
           
         

        </div>

    </div>
    <!--end::Card-->
</div>
    <style>
        html, body {
            height: 100%;
            margin: 0px;
            padding: 0px;
            font-size: 11.5px !important;
            font-weight: 400;
            font-family: Poppins, Helvetica, "sans-serif";
            -ms-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
@endsection
