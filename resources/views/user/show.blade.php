@extends('layouts/master')

@section('content')
    
<div class="content-wrapper container">
    <div class="page-heading">
        <h5>{{$data['halaman']}}</h5>
        
    </div>
    <div class="page-content">
        <section> 
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">
                        Profile {{Auth::user()->name}}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{$data['user']->name}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Usernmae</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{$data['user']->username}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{$data['user']->email}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled value="{{$data['user']->address}}">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{$data['user']->id}}" title="edit"><i class="bi bi-pencil"></i></button>
                <!-- Vertically Centered modal Modal -->
                <div class="modal fade" id="modalEdit{{$data['user']->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit</h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{url('user/'.$data['user']->id)}}" method="post">
                                @csrf @method('patch')
                                <div class="modal-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="{{$data['user']->name}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="username" value="{{$data['user']->username}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="{{$data['user']->email}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" value="{{$data['user']->address}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" placeholder="**********">
                                            <input type="hidden" class="form-control" name="role" value="{{$data['user']->role}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

@endsection