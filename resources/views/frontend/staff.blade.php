@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Staff')
@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">STAFF HMIF</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Closer to Us</p>
      </div>
      <div class="flex flex-wrap -m-4">
          @foreach ($staff as $item)
          <div class="p-4 lg:w-1/2">
            <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
              <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('uploads/'.$item->photo) }}">
              <div class="flex-grow sm:pl-8">
                <h2 class="title-font font-medium text-lg text-gray-900">{{$item->name}}</h2>
                <h3 class="text-gray-500 mb-3">{{$item->divisi->name}}</h3>
                <p class="mb-4">{{$item->occupation}}</p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </section>
@endsection