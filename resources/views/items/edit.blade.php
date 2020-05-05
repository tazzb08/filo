@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Edit and update the Item</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br /> @endif @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                <br /> @endif
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ action('ItemController@update',
                          $item['id']) }} " enctype="multipart/form-data">
                        @method('PATCH') @csrf
                        <div class="col-md-8">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$item->name}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Category</label>
                            <select name="category" value="{{ $item->category}}">
                                <option value="Pet">Pet</option>
                                <option value="Phone">Phone</option>
                                <option value="Jewellery">Jewellery</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Colour</label>
                            <input type="text" name="colour" value="{{$item->colour}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Date Found</label>
                            <input type="date" name="date" value="{{$item->date}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Location</label>
                            <input type="text" name="location" value="{{$item->location}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Description</label>
                            <textarea rows="4" cols="50" name="description" > {{$item->description}}
                            </textarea>
                        </div>
                        <div class="col-md-8">
                            <label>Email</label>
                            <input type="text" name="email" value="{{$item->email}}" />
                        </div>
                        <div class="col-md-8">
                            <label>Image</label>
                            <input type="file" name="image" />
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-primary" />
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
