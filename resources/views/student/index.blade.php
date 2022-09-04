@extends('layouts/master')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">{{$data['page']}}</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="study">{{$data['page']}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tables</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
                <button type="button" class="btn btn-block btn-success mb-3" data-toggle="modal" data-target="#modal-default">+ Add</button>
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Table Student</h3>
            </div>
            
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >No</th>
                    <th scope="col" >Nama</th>
                    <th scope="col" >NISN</th>
                    <th scope="col" >Alamat</th>
                    <th scope="col" colspan="2"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($data['student'] as $list)
                  <tr>
                    <th scope="row">
                      {{$loop->iteration}}
                    </th>
                    <td class="budget">
                      {{$list->name}}
                    </td>
                    <td>
                      {{$list->nisn}}
                    </td>
                    <td>
                      {{$list->address}}
                    </td>
                    <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit{{$list->id}}">Edit</button>
                      <div class="modal fade" id="modal-edit{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                          <div class="modal-content">
                            
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-default">Form Input Student</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <form action="{{url('student/'.$list->id)}}" method="post">
                                @csrf @method('patch')
                                <div class="modal-body">
                                  <input type="text" class="form-control my-2" name="name" placeholder="Name" value="{{$list->name}}">
                                  <input type="text" class="form-control my-2" name="nisn" placeholder="Nisn" value="{{$list->nisn}}">
                                  <input type="text" class="form-control my-2" name="address" placeholder="Address" value="{{$list->address}}">
                                  <select name="kelamin" class="form-control my-2" required>
                                    <option selected value="{{$list->kelamin}}">{{$list->kelamin}}</option>
                                    <option value="perempuan">perempuan</option>
                                    <option value="laki-laki">laki-laki</option>
                                  </select>
                                  <input type="text" class="form-control my-2" name="t_lahir" placeholder="Tempat lahir" value="{{$list->t_lahir}}">
                                  <input type="date" class="form-control my-2" name="tgl_lahir" placeholder="Tanggal lahir" value="{{$list->tgl_lahir}}">
                              </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                          </div>
                      </div>
                      <td>
                        <form action="{{url('group/'.$list->id)}}" method="post" class="d-inline">
                          @csrf @method('delete')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            
              <div class="modal-header">
                  <h6 class="modal-title" id="modal-title-default">Form Input Group</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <form action="student" method="post">
                @csrf
                <div class="modal-body">
                  <input type="text" class="form-control my-2" name="name" placeholder="Name" required>
                  <input type="number" class="form-control my-2" name="nisn" placeholder="NISN" required>
                  <input type="text" class="form-control my-2" name="address" placeholder="Address" required>
                  <select name="kelamin" class="form-control my-2" required>
                    <option value="perempuan">perempuan</option>
                    <option value="laki-laki">laki-laki</option>
                  </select>
                  <input type="text" class="form-control my-2" name="t_lahir" placeholder="Tempat lahir" required>
                  <input type="date" class="form-control my-2" name="tgl_lahir" placeholder="Tanggal lahir" required>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      </div>

@endsection