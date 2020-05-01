@extends('layouts.app')

@section('content')


    <h1>It works!</h1>

    
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
         soluta aut architecto itaque atque ducimus magnam quo, ullam unde, officiis iure. Illo, 
         voluptatum accusamus. Sunt quasi veniam amet fugit doloremque voluptatibus, atque dicta nihil 
         reiciendis laboriosam magnam.consectetur tempora qui enim magni repudiandae possimus.
          Quasi quis minus cum provident corporis.</p>

          @foreach ($pizzas->chunk(3) as $pizzaChunk)

          <div class="row mb-2">

            @foreach ($pizzaChunk as $pizza)
                <div class="col-md-4 col-sm-6">
        
                    <div class="card">
                        <div class="">
                            <img src="{{asset('storage/'.$pizza->image)}}" alt="No Image" class="w-100 h-50 img-responsive">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$pizza->title}}</h5>
                            
                            <p class="card-text"><h6><strong>Details:</strong></h6>{{$pizza->description}}</p>
                        </div>
        
                        <div>
                        <div class="float-left m-2"><h3>${{$pizza->price}}</h3></div>

                        <a href="{{route('getAddToCart', $pizza->id)}}" class="btn  btn-success float-right m-2">Add to cart</a>
                        </div>
        
                    </div>
    
            </div>
            @endforeach
           
        </div>
              
          @endforeach
   
    
@endsection
    


