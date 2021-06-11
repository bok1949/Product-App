@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center my-0">Product List</h2>
            <a href="{{route('dashboard.create')}}" class="btn btn-primary mb-4" >Add Product</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block my-4">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($products->isNotEmpty())
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">
                                    {{ ($products->currentPage()-1) * $products->perPage() + $loop->index + 1 }}
                                </th>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->in_stock}}</td>
                                <td>
                                    <a href="{{route('dashboard.show', $product->id)}}" class="btn btn-info">View</a> 
                                    <a href="{{route('dashboard.edit', $product->id)}}" class="btn btn-primary">Edit</a> 
                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{$products->render()}}
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center mt-2">
                    No available Product yet.
                </div>
            @endif
        </div>
    </div>
</div>
@include('user-pages.confirm-destroy')
@endsection
