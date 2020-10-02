@extends('template')
@section('content')
    <center><h1>Verify Voucher</h1></center>
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
    <form method="post" action="{!! route('validate') !!}">
        @csrf
        <div class="row">
            <div class="col-xs-12 form-group">
                <label for="exampleInputEmail1">Voucher</label>
                <input type="text" class="form-control" name="voucher" value="{!! old('voucher') !!}">
            </div>
            <div class="col-xs-12 form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" value="{!! old('email') !!}">
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Verify</button>
    </form>
    <br><br>
    @if(session()->has('codes'))
        <h2>All Valid Codes</h2>
        @foreach(session()->get('codes') as $codes)
            <div class="alert alert-success">
                Special Offer : <b>{!! $codes->specialoffer->name !!}</b>
                <br>
                Discount : <b>{!! $codes->specialoffer->discount !!}</b>
                <br>
                Code : <b>{!! $codes->code !!}</b>
                <br>
                Expiry : <b>{!! $codes->expiry !!}</b>
            </div>
        @endforeach
    @endif

@endsection
