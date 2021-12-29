<!-- 
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc({{ $id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
Delete
</a>
 -->

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

 <a href="{{ route('user.destroy',$user->id) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="{{ $user->id }}">
   Delete
</a>