@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Portofolio')
@section('content')
<div class="flex flex-col sm:flex-row w-full">
    <div class="flex flex-col text-center w-full mt-10 mb-1">
            <h2 class="text-xs text-green-500 tracking-widest font-medium title-font mb-1">Himpunan Mahasiswa Informatika</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Portofolio</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Etalase yang menampilkan karya hebat Informatika</p>
          </div>
    
    </div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div id="produkk" class="flex flex-wrap -m-4">

            @foreach ($portofolio as $item)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="{{route('portofolio_detail', $item->slug)}}" class="block relative h-48 rounded overflow-hidden">
                @if (cekFotoPortofolio($item->id) == 0)
                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{asset('hmif/img/no-thumbnail.jpeg')}}">
                @else
                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('uploads/'.$item->foto[0]->photo) }}">
                @endif
                </a>
                <div class="mt-4">
                <h2 class="text-gray-900 title-font text-lg font-medium">{{$item->name}}</h2>
                </div>
            </div>
            @endforeach

            
          </div>
          <div style="margin-top: 20px">
            {!! $portofolio->links() !!}
          </div>
        </div>
      </section>
@endsection