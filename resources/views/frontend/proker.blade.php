@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Program Kerja')
@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col">
        <div class="h-1 bg-gray-200 rounded overflow-hidden">
          <div class="w-24 h-full bg-green-500"></div>
        </div>
        <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
          <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Program Kerja HMIF</h1>
          <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 pl-0">Ketahui lebih dalam tentang Program Kerja HMIF</p>
          <a class="px-4 py-3 bg-green-500 text-white text-xs font-semibold rounded hover:bg-green-300" href="{{route('kalender')}}">Kalender Proker</a>
        </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
          @foreach ($proker as $item)
          @php
              $body = Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->description)), 50, ' ....');
            @endphp
          <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
            <div class="rounded-lg h-64 overflow-hidden">
              <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('uploads/'.$item->thumbnail) }}">
            </div>
            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mt-5 mb-1">{{$item->divisi->name}}</h2>
            <h2 class="text-xl font-medium title-font text-gray-900">{{$item->name}}</h2>
            <p class="text-base leading-relaxed mt-2">{{$body}}</p>
            <a href="{{route('detail_proker', $item->slug)}}" class="text-green-500 inline-flex items-center mt-3">Detail
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
          @endforeach
      </div>
      <div class="flex mx-auto items-center justify-center">
        <div class="mx-auto mt-16 items-center justify-center px-5 py-3">
          {!! $proker->links() !!}
        </div>
    </div>
    </div>
  </section>
@endsection