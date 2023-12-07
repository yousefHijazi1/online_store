@extends('items.layout')

@section('content')
<br>
<div class="row mt-2" >
    <div class="col-12 px-0" >
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Best quality with best prices</h4>
                </div>
                <img src="images/img2.jpg" class="d-block w-100" alt="..." height="300px" style="border-radius:10px">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h4>You can buy the newest mobiles</h4>
                </div>
                <img src="images/img1.jpg" class="d-block w-100" alt="..." height="300px" style="border-radius:10px">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h4>All electronics you need available</h4>
                </div>
                <img src="images/img3.jpg" class="d-block w-100" alt="..." height="300px" style="border-radius:10px">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

    <div class="row" >
        @foreach ($items as $item)
            <div class="card mt-3 col-lg-3 col-md-6 col-sm-6 mx-auto d-block" style="width: 18rem;height:20rem;margin:10px">

                <a href="{{ route('show', ['item' => $item]) }}" style="color: inherit; text-decoration: inherit;">

                    <img src="images/{{ $item->image }}" class="card-img-top rounded mt-2" alt="item image" height="120px" width="40px" >
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text"
                            style=" display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                            {{ $item->description }}</p>

                            @if ( $item->discount == 0)
                                <h5 class="text-primary" style="display: inline" >Price: {{ $item->price  }}$</h5>
                            @endif

                            @if ( $item->discount >0)
                                <h6 class="text-secondary" style="display: inline; text-decoration:line-through">Price: {{ $item->price }}$</h6>
                                <span class="badge bg-danger">-{{ $item->discount }}%</span> <br>
                                <h5 class="text-primary"  style="display: inline">Price: {{ $item->price - $item->price * $item->discount/100}}$</h5>
                            @endif

                            @auth
                                <a href="{{ route('items.edit', ['item' => $item]) }}" class="btn btn-warning mt-1 ml-3">Edit</a>
                            @endauth
                    </div>
                </a>
            </div>
        @endforeach
    </div>


@endsection
