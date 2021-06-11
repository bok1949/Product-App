@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Product</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header my-0">
                    <h4>{{$product->product_name}}</h4>
                </div>
                <div class="card-body">
                <h5 class="card-title">
                    <span class="font-weight-bold">Price is &#8369;</span> <span class="border-bottom border-secondary">{{$product->price}}</span>
                    <span class="font-weight-bold ml-4">Available Stock</span> <span class="border-bottom border-secondary">{{$product->in_stock}}</span>
                </h5>
                <p class="card-text">Stock Keeping Unit (SKU) <span class="border-bottom border-secondary">{{$product->sku}}</span></p>
                <p class="card-text">Description</p>
                <p class="card-text">{{$product->description}}</p>
                <a href="{{route('dashboard.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
