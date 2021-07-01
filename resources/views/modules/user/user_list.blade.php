@extends('layouts.app')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </div>
    @if(Session::has('success'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>Sl.No</th>
                                <th>User Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>@php $i = 1; 
                               @endphp
                           
                            @if(count($users) > 0)
                                @foreach($users as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value['name'] }}</td>
                                            @if(!empty($sentrequestlist))
                                                
                                                    @if(in_array($value['id'],$sentrequestlist))
                                                        <td>
                                                            <button class="btn btn-primary addfriend" data-val="{{$value['id']}}"> Send Request</button>
                                                        </td>
                                                    @endif
                                            @endif    
                                            @if(!empty($getrequestlist))
                                                
                                                    @if(in_array($value['id'],$getrequestlist))
                                                        <td>
                                                            <button class="btn btn-primary acceptfriend" data-val="{{$value['id']}}">Accept</button>
                                                        </td>
                                                    @endif
                                            @endif   
                                            @if(!empty($myfriends))
                                                
                                                    @if(in_array($value['id'],$myfriends))
                                                        <td>Friends</td>
                                                    @endif
                                            @endif   
                                            @if((!in_array($value['id'],$myfriends))&& (!in_array($value['id'],$getrequestlist)) && (!in_array($value['id'],$sentrequestlist)))
                                                <td>
                                                    <button class="btn btn-primary addfriend" data-val="{{$value['id']}}">Add Friend</button>
                                                </td>
                                            @endif
                                            
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="8" class="text-bold text-danger text-center">
                                    No Data Found
                                </td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
