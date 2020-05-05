@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Create an new vehicle</div>
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
                    <form class="form-horizontal" method="POST" action="{{url('request') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label>Item ID to request</label>
                            <input type="text" class="form-control"name="requestedItem" placeholder="e.g. 3" />
                        </div>
                        <div class="form-group row">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" />
                        </div>
                        <div class="form-group row">
                          <label >Reason</label>
                          <textarea rows="4" cols="50" name="reason" class="form-control" placeholder= "e.g. Any evidence to prove this item belongs to you."> </textarea>
                        </div>
                        <div class="form-group row">
                            <label>Requester</label>
                            <input type="text" class="form-control" name="requester" value="{{Auth::user()->email}}" readonly/>
                        </div>
                        <br />
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
