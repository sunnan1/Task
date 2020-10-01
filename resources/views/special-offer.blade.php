@extends('template')
@section('content')
    <center><h1>Special Offer</h1></center>
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
    <form method="post" action="{!! route('save.offer') !!}">
        @csrf
        <div class="row">
            <div class="col-xs-12 form-group">
                <label for="exampleInputEmail1">Offer Name</label>
                <input type="text" class="form-control" name="offer">
            </div>
            <div class="col-xs-12 form-group">
                <label for="exampleInputPassword1">Discount</label>
                <input type="number" class="form-control" name="discount">
            </div>
            <div class="col-xs-12 form-group">
                <label for="exampleInputPassword1">Expiration</label>
                <input type="date" class="form-control" name="expiry">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
