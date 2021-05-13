<?php

namespace App\Domain\Helper;

use Illuminate\Support\Facades\Auth;
use App\Domain\Event\Entity\Category;
use App\Domain\Petition\Entity\ParticipatePetition;
use App\Domain\Donation\Entity\ParticipateDonation;
use App\Domain\Donation\Entity\Donation;
use App\Domain\Petition\Entity\Petition;

class HelperService
{
    // upload gambar
    public static function uploadImage($img, $folder)
    {
        $pictName = $img->getClientOriginalName();
        //ambil ekstensi file
        $pictName = explode('.', $pictName);
        //buat nama baru yang unique
        $pictName = uniqid() . '.' . end($pictName); //7dsf83hd.jpg
        //upload file ke folder yang disediakan
        $targetUploadDesc = "images/" . $folder . "/";

        $img->move($targetUploadDesc, $pictName);

        return $targetUploadDesc . "" . $pictName;   //membuat file path yang akan digunakan sebagai src html
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
}