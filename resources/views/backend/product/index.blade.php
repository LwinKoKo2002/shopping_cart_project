@extends('backend.layout.app')
@section('product-active','mm-active')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon pe-7s-config"></i>
            </div>
            <div>
                Product
            </div>
        </div>
    </div>
</div>
<div class="add-btn mb-4">
    <a class="btn secondary-color font-weight-bold" href="{{route('admin.product.create')}}">
        <i class="fa-regular fa-circle-plus mr-1"></i>
        <span> Create product</span>
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table id="Datatable" class="table table-striped mb-2" style="width:100%">
            <thead class="secondary-color">
                <th>Brand Name</th>
                <th class="denied">Product Image</th>
                <th>Product Name</th>
                <th>Model</th>
                <th>Screen Size</th>
                <th>Cpu</th>
                <th>Storage</th>
                <th>Ram</th>
                <th>Back Camera</th>
                <th>Front Camera</th>
                <th>Battery</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Warranty</th>
                <th>Trend</th>
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
        ajax: '{{route("admin.product.datatable.ssd")}}',
        columns: [ 
            { data: 'brand_id', name : 'brand_id'},     
            { data: 'product_img' , name : 'product_img'},
            { data: 'product_name' , name : 'product_name'},
            { data: 'model' , name : 'model'},
            { data: 'screen_size' , name : 'screen_size'},
            { data: 'cpu' , name : 'cpu'},
            { data: 'storage' , name : 'storage'},
            { data: 'ram' , name : 'ram'},
            { data: 'back_camera' , name : 'back_camera'},
            { data: 'front_camera' , name : 'front_camera'},
            { data: 'battery' , name : 'battery'},
            { data: 'selling_price' , name : 'selling_price'},
            { data: 'quantity' , name : 'quantity'},
            { data: 'warranty' , name : 'warranty'},
            { data: 'trend' , name : 'trend'},
            { data : 'action' , name : 'action'},
            { data: 'updated_at', name: 'updated_at' }
        ],
        "order": [
            [ 16, 'desc' ]
        ],
        columnDefs: [
            { 
                sortable : false,
                searchable : false,
                target : "denied"
            },
            {
                visible: false,
                target : 16
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
                url : "/admin/product/" + id,
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