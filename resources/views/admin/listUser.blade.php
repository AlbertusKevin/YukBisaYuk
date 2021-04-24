@extends('layout.adminNavbar')

@section('title')
    Admin - List User
@endsection

@section('content')

<div class="container">
    <div class="form-inline my-2 my-lg-0 justify-content-center">
        <input class="form-control mr-sm-2 w-50 mt-5" id="search-user" type="search" placeholder="Cari User"
            aria-label="Cari Donasi">
        <input type="hidden" id="sort-by" value="None">
        <input type="hidden" id="category-choosen" value="None">
        <div class="dropdown mt-5 mr-2">
            <button class="btn btn-primary dropdown-toggle" type="button" id="sort-by" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Sort By
            </button>
            <div class="dropdown-menu" aria-labelledby="sort-by">
                <a class="dropdown-item sort-list-user font-weight-bold btn-sort">None</a>
                <a class="dropdown-item sort-list-user">Tanggal dibuat</a>
                <a class="dropdown-item sort-list-user">Nama</a>
                <a class="dropdown-item sort-list-user">Email</a>
                <a class="dropdown-item sort-list-user">Jumlah Partisipasi</a>
                <a class="dropdown-item sort-list-user">Role</a>
            </div>
        </div>
        
    <div class="text-center my-5">
        <button href="/listUser" type="button" class="btn btn-primary role-type rounded-pill btn-role">Semua</button>
        <button href="/listUser" type="button" class="btn btn-light role-type rounded-pill ml-3">Participant</button>
        <button href="/listUser" type="button" class="btn btn-light role-type rounded-pill ml-3">Campaigner</button>
        <button href="/listUser" type="button" class="btn btn-light role-type rounded-pill ml-3">Pengajuan</button>
    </div>
    <table class="table table-borderless">
        <thead style="background-color:#E2E2E2">
          <tr class="text-left font-weight-normal">
            <th scope="col">Tanggal Dibuat</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Partisipasi Event</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody id="user-list-role">
            @if (count($users) == 0)
                <tr>
                    <td colspan="5" class="text-center">There is no Data</td>
                </tr>
            @endif
            @for ($i = 0; $i < sizeof($users); $i++)
                @if ($users[$i]->role != 'admin')
                    <tr>
                        <td class="text-center">
                        {{ $changeDateFormat[$i] }}
                        </td>
                        <td>
                            <a href = "/admin/user/{{ $users[$i]->id}}" class="link-user"> {{ $users[$i]->name}}</a>
                        </td>
                        <td>
                        {{ $users[$i]->email }}
                        </td>
                        @if ($eventCount[$i][0] == $users[$i]->id)
                            <td>
                            {{ $eventCount[$i][1] }}
                            </td> @endif
                            <td class="text-left">
                                @if ($users[$i]->role == 'guest')
                                    <span class="badge badge-dark p-2">{{ $users[$i]->role }}</span>
                                @elseif ($users[$i]->role == 'participant' && $users[$i]->status != 3)
                                    <span class="badge badge-primary p-2">{{ $users[$i]->role }}</span>
                                @elseif ($users[$i]->role == 'campaigner')
                                    <span class="badge badge-success p-2">{{ $users[$i]->role }}</span>
                                @elseif ($users[$i]->role == 'participant' && $users[$i]->status == 3)
                                    <span class="badge badge-warning p-2">{{ $users[$i]->role }}</span>
                                @endif
                            </td>
                            </tr>
                        @endif
                    @endfor
                </tbody>
            </table>

        </div>
    @endsection
