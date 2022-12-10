@extends('backend.layout.app')
@section('customer-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users ">
                </i>
            </div>
            <div>
                Customer
            </div>
        </div>
    </div>
</div>
<div class="add-btn mb-4">
    <a class="btn secondary-color font-weight-bold" href="{{route('admin.customer.create')}}">
        <i class="fa-regular fa-circle-plus mr-1"></i>
        <span> Create Customer</span>
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table id="Datatable" class="table table-striped mb-2" style="width:100%">
            <thead class="secondary-color">
                <th class="">Name</th>
                <th class="">Email</th>
                <th class="">Phone</th>
                <th class="">City</th>
                <th class="">Address</th>
                <th class="denied">Ip</th>
                <th class="denied">User Agent</th>
                <th class="denied">Login Time</th>
                <th class="denied">Action</th>
                <th class="denied">updated_at</th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
    const dataTable = $('#Datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{route("admin.customer.datatable.ssd")}}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'city_id', name: 'city_id' },
            { data: 'address', name: 'address' },
            { data: 'ip', name: 'ip' },
            { data: 'user_agent', name: 'user_agent' },
            { data: 'login_time', name: 'login_time' },
            { data : 'action' , name : 'action'},
            { data: 'updated_at', name: 'updated_at' }
        ],
        "order": [
            [ 9, 'desc' ]
        ],
        columnDefs: [
            { 
                sortable : false,
                searchable : false,
                target : "denied"
            },
            {
                visible: false,
                target : 9
            }
        ],
        language: {
            paginate: {
                previous: '<i class="fa-solid fa-circle-left"></i>',
                next: '<i class="fa-solid fa-circle-right"></i>'
            }
  }
    });
    $(document).on('click','.delete_btn',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        Swal.fire({
        title: 'Are you sure , you want to delete?',
        showCancelButton: true,
        reverseButtons : true,
        focusConfirm : false,
        focusCancel : false,
        confirmButtonText: 'Yes,sure',
        cancelButtonText : 'No,keep it'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : "/admin/customer/" + id,
                type : "DELETE",
                success : function(){
                    dataTable.ajax.reload();
                }
            })
        }
        })
    })
});
</script>
@endsection