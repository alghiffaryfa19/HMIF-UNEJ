@extends('layouts.frontend')
@section('description',$detail->name)
@section('title',$detail->name)
@section('content')
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        {{-- <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/400x400"> --}}
        <div class="swiper-container lg:w-1/2 w-full lg:h-auto h-64">
            <div class="swiper-wrapper">
                @forelse ($detail->foto as $item)
                    <div class="swiper-slide"><img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('uploads/'.$item->photo) }}"></div>
                @empty
                    <span>Tidak ada foto</span>
                @endforelse
              
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">IF Portofolio</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$detail->name}}</h1>
          <p class="leading-relaxed">{{$detail->description}}</p>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
<script>
    var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
@endsection