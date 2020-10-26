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
                <h2>Create</h2>
            </div>
            <div class="card-body">
                <form action="tugas/upload/data" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload File</label>
                        <input type="file" class="form-control" name="file">
                      </div>
                      <input class="btn btn-primary float-right" type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>

       
</div>  
@endsection