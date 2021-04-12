@extends('layouts.frontend')
@section('description','Himpunan Mahasiswa Informatika')
@section('title','Kalender')
@section('content')
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
    </div>
</section>

@endsection