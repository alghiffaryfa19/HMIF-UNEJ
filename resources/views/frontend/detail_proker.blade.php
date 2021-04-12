@extends('layouts.frontend')
@section('description',$detail->name)
@section('title',$detail->name)
@section('content')
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
      <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{ asset('uploads/'.$detail->thumbnail) }}">
      <div class="text-center lg:w-2/3 w-full">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$detail->name}}</h1>
        <p class="mb-1 leading-relaxed">{!!$detail->description!!}</p>
        
      </div>
    </div>
  </section>
  <!-- component -->
<div class="relative w-1/2 m-8">
    <div class="border-r-2 border-gray-500 absolute h-full top-0" style="left: 15px"></div>
    <ul class="list-none m-0 p-0">
    @foreach ($detail->timeline as $item)
    <li class="mb-2">
        <div class="flex items-center mb-1">
          <div class="bg-gray-500 rounded-full h-8 w-8"></div>
          <div class="flex-1 ml-4 font-medium">{{\Carbon\Carbon::parse($item->date)->format('d M Y')}} - {{$item->name}}</div>
        </div>
        <div class="ml-12">
          {{$item->detail}}
        </div>
    </li>
    @endforeach      
    </ul>
  </div>
@endsection