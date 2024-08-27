<?php

if (!function_exists("url_banking_provider_images_folder")) {
    function url_banking_provider_images_folder(string $file)
    {
        return url_storage("banking-providers/" . $file);
    }
}

if (!function_exists("url_profile_images_folder")) {
    function url_profile_images_folder(string $file)
    {
        return url_storage("profile-images/" . $file);
    }
}

if (!function_exists("url_storage")) {
    function url_storage(string $path)
    {
        return "http://localhost/project/ngwe_khin_pwa/storage/app/" . $path;
    }
}
