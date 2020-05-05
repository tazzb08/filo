@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all Items</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Colour</th>
                                <th>Date</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['category']}}</td>
                                <td>{{$item['colour']}}</td>
                                <td>{{$item['date']}}</td>
                                <td><a href="{{action('ItemController@show', $item['id'])}}" class="btn
btn- primary">Details</a></td>
                                <td><a href="{{action('ItemController@edit', $item['id'])}}" class="btn
btn- warning">Edit</a></td>
                                <td>
                                    <form action="{{action('ItemController@destroy', $item['id'])}}" method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"> Delete </button>
                                    </form>
                                </td>
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
