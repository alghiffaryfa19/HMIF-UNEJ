@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Blog')
@section('content')
<div class="flex flex-col sm:flex-row w-full">
    <div class="flex flex-col text-center w-full mt-10 mb-1">
            <h2 class="text-xs text-green-500 tracking-widest font-medium title-font mb-1">Himpunan Mahasiswa Informatika</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Produk</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Mari singgah ke usaha kami, siapa tau suka dan mau beli</p>
          </div>
    
    </div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div id="produkk" class="flex flex-wrap -m-4">

            @include('frontend.presult')

            
          </div>
          <div style="margin-top: 20px">
            {!! $produk->links() !!}
          </div>
        </div>
      </section>
@endsection