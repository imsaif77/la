@extends('backend.layout.app')

@section('title') User Management @endsection

@section('css')




@endsection

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
                                <h4 class="card-title">User Management</h4>
                                <div class="pull-right">
                                  <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive abc">
                                    <table id="example" class="display min-w850">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            
                                            <th>Telegram Id</th>

                                            <th>Confirmed</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Updated At</th>
                                            @role('Admin')
                                            <th>Login As</th>
                                            @endrole

                                            <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                      
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
            </div>
</div>





@endsection

@section('js')


<script type="text/javascript">


  $(function () {
    
    var table = $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'telegram_id', name: 'telegram_id'},
            {data: "confirmed_label", name: "confirmed_label"},
            {data: "roles_label", name: "roles_label"},
            {data: "status_label", name: "status_label"},
            {data: 'updated_at', name: 'updated_at'},
            
            @role('Admin')
            {data: 'login_as', name: 'login_as'},

            @endrole

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });


 



</script>

<script>


function deleteuser(e) {

    var url = '{{ route("user.destroy", ":id") }}';
        url = url.replace(':id', e);
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      Swal.fire({
          title             : "Are you sure to delete ?",
          icon              : "warning",
          showCancelButton  : true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor : "#d33",
          confirmButtonText : "yes, Delete!"
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  url    : url,
                  type   : "delete",
                  success: function(data) {

                    $('#example').DataTable().ajax.reload();
                    // location.reload();
                  }
              })
          }
      })
  }
</script>

<script>


function confirmed(e) {

    var url = '{{ route("user.confirm", ":id") }}';
        url = url.replace(':id', e);
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      Swal.fire({
          title             : "Are you sure to Confirm ?",
          icon              : "warning",
          showCancelButton  : true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor : "#d33",
          confirmButtonText : "yes, Confirm!"
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  url    : url,
                  type   : "get",
                  success: function(data) {

                    $('#example').DataTable().ajax.reload();
                    // location.reload();
                  }
              })
          }
      })
  }


 
</script>


<script>


    
function active(e) {

var url = '{{ route("user.active", ":id") }}';
    url = url.replace(':id', e);
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  Swal.fire({
      title             : "Are you sure to Active ?",
      icon              : "warning",
      showCancelButton  : true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor : "#d33",
      confirmButtonText : "yes, Active!"
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url    : url,
              type   : "get",
              success: function(data) {

                $('#example').DataTable().ajax.reload();
                // location.reload();
              }
          })
      }
  })
}


function Inactive(e) {

var url = '{{ route("user.inactive", ":id") }}';
    url = url.replace(':id', e);
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
  Swal.fire({
      title             : "Are you sure to Confirm ?",
      icon              : "warning",
      showCancelButton  : true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor : "#d33",
      confirmButtonText : "yes, Confirm!"
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url    : url,
              type   : "get",
              success: function(data) {

                $('#example').DataTable().ajax.reload();
                // location.reload();
              }
          })
      }
  })
}

    
</script>


@endsection