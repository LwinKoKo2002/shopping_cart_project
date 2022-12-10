@extends('backend.layout.app')
@section('order-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-news-paper">
                </i>
            </div>
            <div>
                Order
            </div>
        </div>
    </div>
</div>
<div class="add-btn mb-4">
    <a class="btn secondary-color font-weight-bold" href="{{route('admin.order.create')}}">
        <i class="fa-sharp fa-solid fa-user-plus mr-1"></i>
        <span> Create Order</span>
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table id="Datatable" class="table table-bordered mb-2" style="width:100%">
            <thead class="secondary-color">
                <th class="denied"></th>
                <th>Customer</th>
                <th>Quantity</th>
                <th>Total Price (MMK)</th>
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
        ajax: '{{route("admin.add-to-cart.datatable.ssd")}}',
        columns: [
            { data: 'plus-icon', name : 'plus-icon'},     
            { data: 'product_id' , name : 'product_id'} ,
            { data: 'quantity' , name : 'quantity'} ,
            { data: 'total_price' , name : 'total_price'},
            { data : 'action' , name : 'action'},
            { data: 'updated_at', name: 'updated_at' }
        ],
        "order": [
            [ 5, 'desc' ]
        ],
        columnDefs: [
            { 
                sortable : false,
                searchable : false,
                target : "denied"
            },
            {
                visible: false,
                target : 5
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