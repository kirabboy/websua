@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" title="Create a product" href="{{route('products.create')}}">Create a product</a><i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <!-- <th>Date Created</th> -->
            <th>Actions</th>
        </tr>
        @foreach ($products as $product) 
            <tr>
                <td>{{++$i}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->brand}}</td>
                <td><img src="{{url('/public/image')}}/{{$product->image}}" width="100px"></td>
                <!-- <td><img src="{{asset('/public/image/2572dd3a018ccdd2949d.jpg')}}" width="100px"></td> -->
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <!-- <td></td> -->
                <td>
                    <form action="{{route('products.destroy', $product->id)}}" method="POST">

                        <a href="{{route('products.show', $product->id)}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>Show
                        </a>

                        <a href="{{route('products.edit', $product->id)}}">
                            <i class="fas fa-edit  fa-lg"></i>Edit
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
