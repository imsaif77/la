

@extends('backend.layout.app')

@section('title') Role Management @endsection

@section('content')





<div class="row">

<div class="col-12">


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif



                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Role Management</h4>
                                <div class="pull-right">
                                  <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Roles</th>
                                            <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        @foreach ($roles as $key => $role)
                                          <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ ucfirst($role->name) }}</td>

                                            

                                            <td> 
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                            @can('role-edit')
                                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endcan

                                            </td>

                                        
                                          </tr>
                                        @endforeach
                                            
                                          
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
            </div>

</div>
</div>

@endsection


@section('js')

<script>
$('#example').DataTable({
      

});

</script>

@endsection




