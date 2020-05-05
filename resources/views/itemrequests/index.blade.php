@extends('layouts.app')@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> Requested Item ID</th>
                                <th> Date Requested</th>
                                <th> Status </th>
                                <th> Requester </th>
                                @can('isAdmin')
                                <th colspan="3">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itemrequests as $itemrequest)
                            <tr>
                                <td> {{$itemrequest->requestedItem}} </td>
                                <td> {{$itemrequest->date}} </td>
                                <td> {{$itemrequest->status}} </td>
                                <td>{{$itemrequest->requester}}  </td>
                                  @can('isAdmin')
                                <td><a href="{{action('ItemRequestController@show', $itemrequest['id'])}}" class="btn
                                          btn-primary" role="button">Details</a></td>

                                <td><form action="{{action('ItemRequestController@destroy', $itemrequest['id'])}}"
                                      method="POST"> @csrf
                                      <input name="_method" type="hidden" value="DELETE">
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                </form></td>
                                  @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
