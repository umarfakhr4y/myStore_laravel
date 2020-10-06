@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="col-12 bg-white">
            <a class="btn btn-success float-right mb-3 mt-1" href={{url('product/tambah')}}>Add</a>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Slug</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $users)
                    <tr>
                        <td class="text-center">{{ $users->id }}</td>
                        <td>{{ $users->product_title }}</td>
                        <td>{{ $users->product_slug }}</td>
                        <td>{{ $users->product_image }}</td>
                        <td class="">
                            <a href="{{ url('/product', $users->product_slug) }}">
                                <button class="btn btn-primary center">Show</button>
                            </a>
                            <a href="/product/edit/{{ $users->id }}">
                                <button class="btn btn-success center">Edit</button>
                            </a>
                            
                            <button class="btn btn-danger center">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              {{$data->links()}}
        </div>
    </div>
</div>    
@endsection


