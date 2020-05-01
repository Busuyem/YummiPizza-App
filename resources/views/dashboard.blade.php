@extends('layouts.app')
@section('title', "Welcometo your profile,". auth()->user()->fname."!")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 form-group">
            @if(auth()->user()->email == "admin@gmail.com")
                <div class="card-header">Add Pizza</div>

                <div class="form-group mt-5">
                    
                <form action="{{route('addpizza')}}" method="post" enctype="multipart/form-data">

                        <div class="mt-2">
                           
                            <input id="my-input" class="form-control" type="text" name="title" placeholder="Enter title of product">
                        </div>

                        <div class="mt-2">
                           
                            <input id="my-input" class="form-control" type="text" name="description" placeholder="Enter product description">
                        </div>

                        <div class="mt-2">
                            
                            <input id="my-input" class="form-control" type="text" name="price" placeholder="Enter product price">
                        </div>

                        <div class="mt-2">
                            <input class="bg-warning" type="file" name="image">
                        </div>

                        <div class="mt-2">

                            <button type="submit" class="btn btn-primary">Add Product</button>
                            
                        </div>

                        @csrf
                    </form>
                </div>

            </div>
        @endif

        <h5>Welcome to your dashboard, {{auth()->user()->fname}}!</h5>
        <p>Kindly <a href="{{route("showpizza")}}">visit our shop</a> to get the best pizza.</p>
    </div>
</div>
@endsection
