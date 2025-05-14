<?php

namespace App\Enums;

enum ImageCollectionEnum: string
{
    case BANNER = 'banner';
    case COVER = 'cover';
    case GALLERY = 'gallery';
    case MAIN_PAGE_ABOUT = 'main_page_about';
    case MAIN_PAGE_FINAL = 'main_page_final';
}
