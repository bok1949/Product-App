@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"> Create Product</h4>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>    
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{route('dashboard.store')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-right">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" autofocus>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-right">Description</label>
                            <div class="col-sm-10">
                                <textarea name="product_description" class="form-control @error('product_description') is-invalid @enderror" rows="3" autofocus>{{ old('product_description') }}</textarea>
                                @error('product_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-right">Price &#8369;</label>
                            <div class="col-sm-4">
                                <input type="number" name="price" min="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label text-right">Stock</label>
                            <div class="col-sm-4">
                                <input type="number" name="instock" min="1" class="form-control @error('instock') is-invalid @enderror" value="{{ old('instock') }}" autofocus >
                                @error('instock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button type="submit" class="btn btn-primary col-sm-3">Create</button>
                        </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
