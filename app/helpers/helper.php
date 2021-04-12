<?php

use App\Models\GalleryProduct;

function cekFoto($id)
{
	return GalleryProduct::where('product_id',$id)->count();
}