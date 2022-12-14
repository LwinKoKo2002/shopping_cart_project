@extends('backend.layout.app')
@section('order-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-edit">
                </i>
            </div>
            <div>
                Order
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="Datatable" class="table table-bordered mb-2" style="width:100%">
            <thead class="secondary-color">
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th class="denied">Order Items</th>
                <th>Total Price (MMK)</th>
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
        ajax: '{{route("admin.order.datatable.ssd")}}',
        columns: [
            { data: 'customer', name : 'customer'},     
            { data: 'email' , name : 'email'} ,
            { data: 'phone' , name : 'phone'} ,
            { data: 'address' , name : 'address'} ,
            { data: 'city_id' , name : 'city_id'} ,
            { data: 'order_item' , name : 'order_item'} ,
            { data: 'total' , name : 'total'},
            { data: 'updated_at', name: 'updated_at' }
        ],
        "order": [
            [ 7, 'desc' ]
        ],
        columnDefs: [
            { 
                sortable : false,
                searchable : false,
                target : "denied"
            },
            {
                visible: false,
                target : 7
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
                url : "/admin/add-to-cart/" + id,
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