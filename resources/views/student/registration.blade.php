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
                    <th scope="col" >Kelas</th>
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
                      @foreach($list->study as $study)
                      <ul>
                        <li>{{$study->study}} - {{$study->group->group}}</li>
                      </ul>
                      @endforeach
                    </td>
                    <td>
            
                      
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
              <form action="registration" method="post">
                @csrf
                <div class="modal-body">

                  <select name="student_id" class="form-control my-2" required>
                    <option value="" selected>Pilih Siswa</option>
                    @foreach($data['student'] as $option)
                    <option value="{{$option->id}}">{{$option->name}}</option>
                    @endforeach
                  </select>
                  
                  <select name="study_id" class="form-control my-2" required>
                  <option value="" selected>Pilih Kelas</option>
                    @foreach($data['study'] as $option)
                    <option value="{{$option->id}}">{{$option->study}} - {{$option->group->group}}</option>
                    @endforeach
                  </select>

                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      </div>

@endsection