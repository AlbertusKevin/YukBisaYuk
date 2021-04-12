<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Admin\Service\AdminService;

class AdminController extends Controller
{
    private $admin_service;

    public function __construct()
    {
        $this->admin_service = new AdminService();
    }

    public function getAll()
    {
        $users = $this->admin_service->getAllUser();
        $eventCount = $this->admin_service->countEventParticipate($users);
        $changeDateFormat = $this->admin_service->changeDateFormat();
        return view('/admin/listUser', compact('users', 'eventCount', 'changeDateFormat'));
    }

    public function listUserByRole(Request $request)
    {
        $users = $this->admin_service->listUserByRole($request);
        $eventCount = $this->admin_service->countEventParticipate($users);
        $combine = [];
        $combine[] = $users;
        $combine[] = $eventCount;

        return json_encode($combine);
    }

    public function countEventParticipate(Request $request)
    {
        return $this->admin_service->countEventParticipate($request);
    }

    public function home()
    {
        $users = $this->admin_service->countUser();
        $participant =  $this->admin_service->countParticipant();
        $campaigner  = $this->admin_service->countCampaigner();
        $campaign_valid  = $this->admin_service->countWaitingCampaigner();
        $donasi_valid = $this->admin_service->countWaitingDonation();
        $petisi_valid = $this->admin_service->countWaitingPetition();
        $donations = $this->admin_service->getDonationLimit();
        $petitions = $this->admin_service->getPetitionLimit();
        $date = $this->admin_service->getDate();

        return view('admin.home', [
            'users' => $users,
            'participant' => $participant,
            'campaigner' => $campaigner,
            'waiting_campaigner' => $campaign_valid,
            'waiting_donation' => $donasi_valid,
            'waiting_petition' => $petisi_valid,
            'donations' => $donations,
            'petitions' => $petitions,
            'date' => $date,
        ]);
    }

    public function sortListUser(Request $request)
    {
        $users =  $this->admin_service->sortListUser($request);
        $eventCount = $this->admin_service->countEventParticipate($users);
        $combine = [];
        $sortCountEvent = 
        $combine[] = $users;
        $combine[] = $eventCount;

        return json_encode($combine);
    }

    public function searchUser(Request $request)
    {
        return $this->admin_service->searchUser($request);
    }

    public function userInfo(Request $request)
    {
        return view('/admin/userAdmin');
    }
}
