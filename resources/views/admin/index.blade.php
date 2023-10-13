@extends('mainpage.layouts.main')

@section('container')

<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Senarai Pengguna</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="/admin">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive-lg col-md-10">
    @if(count($users) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Peranan</th>
                <th scope="col">Tindakan</th>
                <th scope="col">Status</th>
                <th scope="col">Terakhir Log Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                    <tr>
                    <td>{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->choose_user->pilih_pengguna }}</td>
                    <td>
                        <a href="/admin/{{ $user->id }}" class="badge bg-success link-light">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                        </a>
                        <a href="/admin/{{ $user->id }}/edit" class="badge bg-info link-light">
                            <span data-feather="edit" class="align-text-bottom"></span>
                        </a>
                        <a href="/admin/tukar-password/{{ $user->id }}" class="badge bg-dark link-light">
                            <span data-feather="edit-3" class="align-text-bottom"></span>
                        </a>
                        <button class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                            <span data-feather="trash" class="align-text-bottom"></span>
                        </button>
                            <!-- Delete User Modal -->
                            <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">Mengesahkan Padam</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Adakah anda pasti untuk memadam pengguna ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="/admin/{{ $user->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Padam</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </td>
                    <td>
                        @if ($user->isApproved == 0)
                            Belum disahkan
                        @else
                            Telah disahkan
                        @endif
                    </td>
                    <td>{{ $user->last_login }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Bil.</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Peranan</th>
                <th scope="col">Tindakan</th>
                <th scope="col">Status</th>
                <th scope="col">Terakhir Log Masuk</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" class="text-center">Tiada Maklumat.</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>


@endsection
