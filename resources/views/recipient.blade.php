@extends('template')
@section('content')
    <center><h1>New Recipient</h1></center>
    <br>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {!! $error !!}
        </div>
    @endforeach
    @if(session()->has('success'))
        <div class="alert alert-success">
            {!! session()->get('success') !!}
        </div>
    @endif
    <form method="post" action="{!! route('save.recipient') !!}">
        @csrf
        <div class="row">
            <div class="col-xs-12 form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-xs-12 form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
