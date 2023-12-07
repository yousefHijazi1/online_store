{{-- @dd($item) --}}
@extends('items.layout')

@section('content')
    <br><br><br>

    <div class="row">
        {{-- <div class="card col-6 mt-3">
            <img src="/images/{{ $item->image }}" class="card-img-top" alt="item image" height="300em" style="width: 350px">
            <div class="card-body">
                <h2 class="card-title">{{ $item->name }}</h2>
                <h5 class="text-primary">{{ $item->price }}$ @if ($item->discount > 0)
                        <span class="badge bg-danger">discount: {{ $item->discount }}%</span>
                    @endif
                </h5>
                <p class="card-text">{{ $item->description }}</p>
            </div>
        </div> --}}

        <div class="card ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/images/{{ $item->image }}" class="card-img mt-3" alt="Image" >
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">{{ $item->description }}</p>
                        <hr>
                        {{-- <p>Price: {{ $item->price }}$</p> --}}
                        @if ($item->discount > 0)
                            <h3 class="text-primary" style="display: inline" >Price: {{ $item->price - $item->price * $item->discount/100}}$</h3>
                            <h5 class="text-secondary" style="display:inline; text-decoration:line-through">Price: {{ $item->price }}$</h5>
                            <span class="badge bg-danger">{{ $item->discount }}% off</span>
                            <hr>
                            @endif
                        @if ($item->discount < 1)
                            <h5 class="text-primary" style="display:inline;">Price: {{ $item->price }}$</h5>
                            <hr>
                        @endif

                    <form action="">
                        <h3 style="display: inline">Choose Quantity</h3>
                        <select name="quantity" id="" style="width:70px" class="form-select" aria-label="Default select example" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>
                        <button class="btn btn-danger">Buy now</button>
                        <button class="btn btn-primary">Add to cart</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
