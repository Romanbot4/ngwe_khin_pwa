<?php

namespace App\Traits;

trait AppStorageTrait
{
    function public_url(string $path) {
        return "http://localhost/project/ngwe_khin_pwa/storage/app/".$path;
    }
}
