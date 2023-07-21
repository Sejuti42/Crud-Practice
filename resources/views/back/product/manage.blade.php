@extends('back.master')

@section('title', 'Manage Product')

@section('body')
    <section class="py-5" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="text-center text-light">Manage Product</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->brand_name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt="" style="height: 80px">
                                            </td>
                                            <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success">edit</a>
                                                <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure for delete?')">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
