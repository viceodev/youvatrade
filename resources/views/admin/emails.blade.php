@extends('layouts.adminapp')


@section('content')

<style>
    .btn-success{
        background-color: #218838!important;
        border-color: #218838!important;
    }

    .fa{
        font-weight: 400!important;
        font-size: 12px!important;
    }

    @media screen and (max-width: 768px){
        .custom{
            margin: 0!important;
            padding: 0!important;
        }
    }
</style>

<div class="page-wrapper">

    <div class="row page-titles">
    <div class="col-md-5 align-self-center">
    <h3 class="text-primary text-capitalize">Bulk Email</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Emails</a></li>
    <li class="breadcrumb-item active">Bulk Emails</li>
    </ol>
    </div>
    </div>

    <div class="container mx-auto card">
        <form action="{{route('admin.bulk.emails')}}" method="POST">
            @csrf 

            <div class="card-header mb-3">
                SEND BULK EMAILS
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Type in your subject here" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea type="text" name="message" id="message" class="form-control" style="height:400px;" placeholder="Type in your message here" required></textarea>
            </div>
 
            <div class="text-right">
                <button type="submit" class="btn btn-dark">SEND EMAILS</button>
            </div>
        </form>

    </div>
</div>

@endsection