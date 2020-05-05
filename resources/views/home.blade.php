@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <a href="{{ url('request/index') }}" class="btn btn-secondary" role="button"> Display Requests </a>
                    <br >
                    <br >
                    <a href="{{ url('request/create') }}" class="btn btn-secondary" role="button"> Create an Item Request </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
