@extends('layouts.admin')

@section('breadcrumbs')
<div class="row mb-2 mt-4">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Roles</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Roles</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">Roles List</h3>
                <a href="{{ route('role.create') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i class="fas fa-plus"></i>&nbsp;Create Role</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered text-center mb-3">
                  <thead>
                    <tr>
                      <th width="5%">SL</th>
                      <th width="20%">Name</th>
                      <th width="55%">Permission</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $loop->index+1 }}</td>
                        <td class="text-center">{{ $role->name }}</td>
                        <td class="text-center">
                            @foreach ($role->permissions as $item)
                                <span class="badge badge-primary">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('role.edit', $role->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $roles->links() }}
              </div>
            </div>
          </div>
    </div>
</div>
@endsection