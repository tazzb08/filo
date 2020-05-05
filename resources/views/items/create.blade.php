<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Add a new item</div>
                <!-- display the errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
                <br /> @endif
                <!-- display the success status -->
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                <br /> @endif
                <!-- define the form -->
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{url('items')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label>Name</label>
                            <input type="text" name="name" class= "form-control" placeholder="Name of item" />
                        </div>
                        <div class="form-group row">
                            <label>Category</label>
                            <select name="category" class = "form-control">
                                <option value="Pet">Pet</option>
                                <option value="Phone">Phone</option>
                                <option value="Jewellery">Jewellery</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Colour</label>
                            <input type="text" class="form-control" name="colour" placeholder="e.g. Brown" />
                        </div>
                        <div class="form-group row">
                          <label>Date Found</label>
                          <input type="date" class="form-control" name="date"  />
                        </div>
                        <div class="form-group row">
                            <label>Location</label>
                            <input type="text" class= "form-control" name="location" placeholder="e.g. New Street" />
                        </div>
                        <div class="form-group row">
                          <label >Description</label>
                          <textarea rows="4" cols="50" name="description" class="form-control" placeholder= "e.g. The condition of the item, where it was found, and any other details."> </textarea>
                        </div>
                        <div class="form-group row">
                            <label>Your Contact Email</label>
                            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" />
                        </div>
                        <div class="form-group row">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Image file" />
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
