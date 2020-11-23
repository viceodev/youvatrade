@extends('layouts.adminapp')


@section('content')

<style>
    .btn-success{
        background-color: #218838!important;
        border-color: #218838!important;
    }

    /* .text-wrap{
        white-space: normal;
    } */

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
    <h3 class="text-primary text-capitalize">{{$user['name']}}</h3> </div>
    <div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="javascript:void(0)">User Management</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
    <li class="breadcrumb-item active">{{$user['name']}}</li>
    </ol>
    </div>
    </div>

    <div class="container mx-auto card">
        <form action="{{route('users.update', $user['id'])}}" method="POST">
            @csrf 
            @method('PUT')
            <div class="row">
                <div class="col-lg-5 mx-auto card">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user['name']}}">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{$user['dob']}}">
                    </div>

                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state" class="form-control" value="{{$user['state']}}">
                    </div>


                    <div class="form-group">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="active" @if($user['status'] == 'active') selected @endif>Active</option>
                            <option value="verified" @if($user['status'] == 'verified') selected @endif>Verified</option>
                            <option value="unverified" @if($user['status'] == 'unverified') selected @endif>Not Verified</option>
                        </select>
                    </div>
                </div>


                <div class="col-lg-5 mx-auto card">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{$user['email']}}">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{$user['nationality']}}" >
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="type in new password">
                    </div>

                    <div class="form-group">
                        <label for="balance">User Balance</label>
                        <input type="number" name="balance" id="balance" class="form-control" value="{{$user['balance']}}">
                    </div>
                </div>
            </div>            

            <div class="text-right">
                <button type="submit" class="btn btn-dark">UPDATE ACCOUNT</button>
            </div>
        </form>

    </div>
</div>

@endsection