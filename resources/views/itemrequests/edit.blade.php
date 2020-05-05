@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Edit the status</div>
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
                    <form class="form-horizontal" method="POST" action="{{ action('ItemRequestController@update', $itemrequest['id']) }} " >
                        @method('PATCH') @csrf
                        <div class="col-md-8">
                            <div class="custom-control custom-radio">
                            <input type="radio" id="r1"  name="status" value="APPROVED" class="custom-control-input">
                            <label class="custom-control-label" for="r1">Approve Request</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="r2" name="status" value="DENIED" class="custom-control-input">
                            <label class="custom-control-label" for="r2">Deny Request</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="r3" name="status" value="PENDING" class="custom-control-input">
                            <label class="custom-control-label" for="r3">Pend Request</label>
                          </div>

                        </div>
                        @can('isAdmin')
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            </a>
                        </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
