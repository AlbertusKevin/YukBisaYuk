<?php

namespace App\Domain\Helper;

use Illuminate\Support\Facades\Auth;

class HelperService
{
    public static function makeSlugify($name)
    {
        $name = explode(" ", $name);
        $name = join("-", $name);
        $name = strtolower($name);

        return $name . "/";
    }
    // upload gambar
    public static function uploadImage($img, $folder)
    {
        $pictName = $img->getClientOriginalName();
        //ambil ekstensi file
        $pictName = explode('.', $pictName);
        //buat nama baru yang unique: 7dsf83hd.jpg
        $pictName = uniqid() . '.' . end($pictName);
        // pindahkan file dari tmp ke folder tujuan
        $img->move($folder, $pictName);

        return '/' . $folder . $pictName;   //membuat file path yang akan digunakan sebagai src html
    }

    // Untuk navbar, perbedaan untuk Admin dan Pengguna (guest, campaigner, participant)
    public static function getNavbar()
    {
        if (Auth::check()) {
            if (Auth::user()->role == ADMIN) {
                return 'layout.adminNavbar';
            }
        }

        return 'layout.app';
    }

    public static function makeNumber($number)
    {
        $number = explode(',', $number);
        $number = join("", $number);
        return (int)$number;
    }
}
