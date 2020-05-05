@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all vehicles</div>
                <div class="card-body">
                    <table class="table table-striped" border="1">
                        <tr>
                        <td> <b>Item ID </th> <td> {{$itemrequest['requestedItem']}}</td></tr>
                        <tr> <th>Date of request </th> <td>{{$itemrequest->date}}</td></tr>
                        <tr> <th>Requester </th> <td>{{$itemrequest->requester}}</td></tr>
                        <tr> <th>Reason </th> <td>{{$itemrequest->reason}}</td></tr>
                    </table>
                    <table><tr>
                    <td><a href="{{url('request/index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
                    @can('isAdmin')
                    <td><a href="{{action('ItemRequestController@edit', $itemrequest['id'])}}" class="btn btn-warning" role="button">Make Request Decision</a></td>
                    @endcan
                  </tr></table>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endsection
