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
                
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Daftar Siswa Kelas: {{$data['study']->study}} - {{$data['study']->group->group}}</h3>
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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>

@endsection