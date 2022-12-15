@extends('backend.layout.app')
@section('add_to_cart-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users pe-7s-cart">
                </i>
            </div>
            <div>
                Add To Cart
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="Datatable" class="table table-striped mb-2" style="width:100%">
            <thead class="secondary-color">
                <th>Customer</th>
                <th class="denied">Product Image</th>
                <th>Product </th>
                <th>Quantity</th>
                <th>Action</th>
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
            { data: 'customer_id' , name : 'customer_id'} ,
            { data: 'product_img' , name : 'product_img'} ,
            { data: 'product_id' , name : 'product_id'} ,
            { data: 'quantity' , name : 'quantity'} ,
            { data: 'action' , name : 'action'} ,
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