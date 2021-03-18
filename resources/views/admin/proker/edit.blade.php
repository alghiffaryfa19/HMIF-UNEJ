@extends('layouts.admin')
@section('content')
@section('header')
<span class="font-semibold text-xl text-gray-800 leading-tight">
    Edit Proker {{$proker->name}}
</span>
@endsection
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form enctype="multipart/form-data" action="{{route('proker.update', $proker->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Nama Proker
                        </label>
                
                        <div class="relative">
                
                            <input id="name"
                                name="name"
                                type="text"
                                value="{{$proker->name}}"
                                placeholder="Nama Proker"
                                class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Divisi
                        </label>
                
                        <div class="relative">
                
                            

                            <select name="divisi_id" class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-12">
                                @foreach ($divisi as $item)
                                    @if($item->id==$proker->divisi_id)
                                    <option value={{$item->id}} selected='selected' >{{$item->name}}</option>
                                    @else
                                    <option value={{$item->id}}>{{$item->name}}</option>
                                @endif
                                @endforeach
                            </select>
                
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Deskripsi
                        </label>
                
                        <div class="relative">
                            <textarea name="description" class="summernote text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">{!!$proker->description!!}</textarea>
                
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Thumbnail
                        </label>
                
                        <div class="relative">
                
                            <input id="name"
                                name="thumbnail"
                                type="file"
                                placeholder="Nama"
                                class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                
                        </div>
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Tanggal Mulai
                        </label>
                
                        <div class="relative">
                
                            <input id="name"
                                name="start"
                                type="date"
                                placeholder="Nama"
                                value="{{$proker->start}}"
                                class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                
                        </div>
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="name"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">
                            Tanggal Selesai
                        </label>
                
                        <div class="relative">
                
                            <input id="name"
                                name="end"
                                type="date"
                                value="{{$proker->end}}"
                                placeholder="Nama"
                                class="text-sm sm:text-base relative w-full border rounded placeholder-gray-400 focus:border-indigo-400 focus:outline-none py-2 pr-2 pl-6">
                
                        </div>
                    </div>
                    
                    <div class="flex justify-center pt-2">
                        <button type="submit"
                            class="focus:outline-none px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-indigo-400">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection