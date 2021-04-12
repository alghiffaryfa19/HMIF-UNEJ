@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Beranda')
@section('content')
<div class="w-full">
    <div class="flex bg-white" style="height:600px;">
        <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">One Step Closer to <br> <span class="text-green-500">HMIF UNEJ</span></h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a class="px-4 py-3 bg-green-500 text-white text-xs font-semibold rounded hover:bg-green-300" href="#">Lebih Dekat</a>
                </div>
            </div>
        </div>
        <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
            <div class="h-full object-cover" style="background-image: url(https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80)">
                <div class="h-full bg-black opacity-25"></div>
            </div>
        </div>
    </div>
</div>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h2 class="text-xs text-green-500 tracking-widest font-medium title-font mb-1">Himpunan Mahasiswa Informatika</h2>
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Layanan Utama</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Selamat Datang, Semoga Betah Berlama-Lama</p>
      </div>
      <div class="flex flex-wrap">
        <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
          <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Artikel</h2>
          <p class="leading-relaxed text-base mb-4">Temukan artikel menarik dan bermanfaat dari kami</p>
          <a href="{{route('blog')}}" class="text-green-500 inline-flex items-center">Lebih Dalam
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
          <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Produk</h2>
          <p class="leading-relaxed text-base mb-4">Mari singgah ke usaha kami, siapa tau suka dan mau beli</p>
          <a href="{{route('prod')}}" class="text-green-500 inline-flex items-center">Lebih Dalam
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
          <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Portofolio</h2>
          <p class="leading-relaxed text-base mb-4">Etalase yang menampilkan karya hebat Informatika</p>
          <a class="text-green-500 inline-flex items-center">Lebih Dalam
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
          <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">E-Certificate</h2>
          <p class="leading-relaxed text-base mb-4">Cari dan unduh sertifikatmu berkegiatan bersama kami</p>
          <a class="text-green-500 inline-flex items-center">Lebih Dalam
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
      
    </div>
  </section>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-green-500 tracking-widest font-medium title-font mb-1">Himpunan Mahasiswa Informatika</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Artikel Hangat</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Nikmati Artikel Terbaru Kami. This is Special for You!</p>
          </div>
      <div class="flex flex-wrap -m-4">
          @foreach ($post as $item)
          @php
            $body = Str::limit(str_replace("&nbsp;", ' ', strip_tags($item->body)), 50, ' ....');
            @endphp
          <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('uploads/'.$item->thumbnail) }}" alt="{{$item->title}}">
              <div class="p-6">
                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{$item->category->name}}</h2>
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$item->title}}</h1>
                <p class="leading-relaxed mb-3">{{$body}}</p>
                <small>by {{$item->user->name}} - {{\Carbon\Carbon::parse($item->updated_at)->format('d M Y')}}</small>
                <div class="flex items-center flex-wrap ">
                  <a href="{{route('detail_post', $item->slug)}}" class="text-green-500 inline-flex items-center md:mb-2 lg:mb-0">Read More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12h14"></path>
                      <path d="M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
  </section>
  <div class="bg-green-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
      <span class="block">Hey,</span>
      <span class="block text-green-500">Ada masukan untuk kami ?</span>
    </h2>
    <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="{{route('register')}}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-500 hover:bg-green-300">
          Kesini ya
        </a>
      </div>
    </div>
    </div>
    </div>
@endsection