<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="container-fluid">
            <div class="col-12 bg-white">
                <a href="product/tambah"><button class="btn btn-success float-right mb-3 mt-1">Add</button></a>
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
                                <a href="/product/edit/{{ $users->product_slug }}">
                                    <button class="btn btn-success center">Edit</button>
                                </a>
                                <form action="/product/delete/{{ $users->product_slug }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger center" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
