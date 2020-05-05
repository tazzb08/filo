@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all Items</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID  </th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Colour</th>
                                <th>Date</th>
                                <th>Location</th>


                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['category']}}</td>
                                <td>{{$item['colour']}}</td>
                                <td>{{$item['date']}}</td>
                                <td>{{$item['location']}}</td>
                                <td><a href="{{action('ItemController@show', $item['id'])}}" class="btn
btn-primary" role="button">Details</a></td>
                                @can('isAdmin')
                                <td>
                                    <form action="{{action('ItemController@destroy', $item['id'])}}" method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"> Delete </button>
                                    </form>
                                </td>
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
