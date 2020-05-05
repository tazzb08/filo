@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display all items</div>
                <div class="card-body">
                    <table class="table table-striped" border="1">
                        <tr>
                          <td> <b>Name </th> <td> {{$item['name']}}</td></tr>
                        <tr> <th>Item ID </th> <td>{{$item->id}}</td></tr>
                        <tr> <th>Category </th> <td>{{$item->category}}</td></tr>
                        <tr> <th>Colour </th> <td>{{$item->colour}}</td></tr>
                        <tr> <td>Date </th> <td>{{$item->date}}</td></tr>
                        <tr> <td>Location </th> <td>{{$item->location}}</td></tr>
                        <tr> <td>Description </th> <td>{{$item->description}}</td></tr>
                        <tr> <td>Contact Finder </th> <td>{{$item->email}}</td></tr>
                        <tr> <td colspan='2' ><img style="width:100%;height:100%"
src="{{ asset('storage/images/'.$item->image)}}"></td></tr>
                    </table>
                    <table><tr>
                    <td><a href="{{route('items.index')}}" class="btn btn-primary" role="button">Back to the
                      list</a></td>
                    @can('isAdmin')
                      <td><a href="{{action('ItemController@edit', $item['id'])}}" class="btn btn-warning">Edit</a></td>
                    @endcan

              </tr></table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
