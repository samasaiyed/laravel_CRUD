@extends('layout.app')
@section('main')

    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2"> New product </a>
        </div>
    <table class="table table-light table-hover mt-2">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Name</th>
        <th>image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <td>{{ $loop->index+1  }}</td>
        <td>{{ $product->name }}</td>
        <td> <img src = "images/{{$product->image}}" class="rounded-circle" width="30" height="30"></td>
        <td> <a href="products/{{$product->id}}/edit" class="btn btn-dark"> Edit </a>
             <a href="products/{{$product->id}}/delete" class="btn btn-danger"> Delete </a>
        </td>
      </tr>
     @endforeach
      
    </tbody>
    </table>

    </div>
@endsection