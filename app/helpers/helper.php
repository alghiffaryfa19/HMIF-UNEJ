<?php

use App\Models\GalleryProduct;
use App\Models\GalleryPortofolio;

function cekFoto($id)
{
	return GalleryProduct::where('product_id',$id)->count();
}

function cekFotoPortofolio($id)
{
	return GalleryPortofolio::where('portofolio_id',$id)->count();
}