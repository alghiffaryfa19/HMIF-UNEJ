@foreach ($produk as $item)
<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
    <a href="{{route('produk_detail', $item->slug)}}" class="block relative h-48 rounded overflow-hidden">
      @if (cekFoto($item->id) == 0)
      <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{asset('hmif/img/no-thumbnail.jpeg')}}">
      @else
      <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('uploads/'.$item->foto[0]->photo) }}">
      @endif
    </a>
    <div class="mt-4">
      <h2 class="text-gray-900 title-font text-lg font-medium">{{$item->name}}</h2>
      <p class="mt-1">Rp. {{$item->price}}</p>
    </div>
</div>
@endforeach
