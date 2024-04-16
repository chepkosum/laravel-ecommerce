@extends('layouts.app')

@section('title', 'Biwott E-commerce')



@section('content')
<div id="carouselExampleDark" class="carousel carousel-dark slide">


    <div class="carousel-inner h-25 ">

        @foreach ($sliders as $key=>$sliderItem)

      <div class="carousel-item {{$key =='0' ? 'active':''}}" data-bs-interval="10000">
        @if ($sliderItem->image)
        <img src="{{asset("$sliderItem->image")}}" class="d-block  w-100" alt="Slider">
       @endif
        {{-- <div class="carousel-caption d-none d-md-block">
          <h5>{{$sliderItem->title}}</h5>
          <p>{{$sliderItem->description}}</p>
        </div> --}}
        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>
                    {!!$sliderItem->title!!}
                </h1>
                <p>
                    {{$sliderItem->description}}
                </p>
                <div>
                    <a href="" class="btn btn-slider">
                        Get Now
                    </a>
                </div>
            </div>
        </div>
      </div>
       @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection
