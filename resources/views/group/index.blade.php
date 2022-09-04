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
              <h3 class="mb-0">Table Group</h3>
            </div>
            
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" >No</th>
                    <th scope="col" >Group</th>
                    <th scope="col" >Study</th>
                    <th scope="col" >Kuota</th>
                    <th scope="col" colspan="2"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($data['group'] as $list)
                  <tr>
                    <th scope="row">
                      {{$loop->iteration}}
                    </th>
                    <td class="budget">
                      {{$list->group}}
                    </td>
                    <td>
                      {{$list->study->study}}
                    </td>
                    <td>
                      {{$list->kuota}}
                    </td>
                    <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit{{$list->id}}">Edit</button>
                      <div class="modal fade" id="modal-edit{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                          <div class="modal-content">
                            
                              <div class="modal-header">
                                  <h6 class="modal-title" id="modal-title-default">Form Input Study</h6>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                  </button>
                              </div>
                              <form action="{{url('group/'.$list->id)}}" method="post">
                                @csrf @method('patch')
                                <div class="modal-body">
                                  <input type="text" class="form-control my-2" name="group" placeholder="Input group here" value="{{$list->group}}">
                                  <select name="study_id" class="form-control my-2">
                                    @foreach($data['study'] as $option)
                                      @if($option->id == $list->study_id)
                                      <option selected value="{{$list->study_id}}">{{$list->study->study}}</option>
                                      @endif
                                      <option value="{{$option->id}}">{{$option->study}}</option>
                                    @endforeach
                                  </select>
                                  <input type="number" class="form-control my-2" name="kuota" placeholder="50" value="{{$list->kuota}}">
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
              <form action="group" method="post">
                @csrf
                <div class="modal-body">
                  <input type="text" class="form-control my-2" name="group" placeholder="Input group here" required>
                  <select name="study_id" class="form-control my-2">
                    @foreach($data['study'] as $option)
                      <option value="{{$option->id}}">{{$option->study}}</option>
                    @endforeach
                  </select>
                  <input type="number" class="form-control my-2" name="kuota" placeholder="50" required>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      </div>

@endsection