@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="{{ url('/product') }}">
                    <button class="btn btn-success float-left mr-2">Back</button>
                </a>
                <h2>Tambah</h2>
            </div>
            <div class="card-body">

                <form action="/product/simpan" method="POST">
                    @csrf
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" value="" name="product_title">
                        @if(Session::has('code'))                        
                            <code>{{Session::get('code')}}</code>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product price</label>
                        <input type="text" class="form-control" value="" name="product_price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Image</label>
                        <input type="text" class="form-control" value="" name="product_image">
                    </div>
                      <input class="btn btn-primary float-right" type="submit" value="Tambah Data">

                    
                </form>
            </div>
        </div>
    </div>

       
</div>    
@endsection


