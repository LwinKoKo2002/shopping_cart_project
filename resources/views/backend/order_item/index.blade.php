@extends('backend.layout.app')
@section('order_item-active','mm-active')
@section('content')
<div class="app-page-title">
        <div class="page-title-wrapper">
                <div class="page-title-heading">
                        <div class="page-title-icon">
                                <i class="pe-7s-drop">
                                </i>
                        </div>
                        <div>
                                Order Item
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
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Selling Price (MMK)</th>
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
        ajax: '{{route("admin.order_item.datatable.ssd")}}',
        columns: [   
            { data: 'customer' , name : 'customer'} ,
            { data: 'product_img' , name : 'product_img'} ,
            { data: 'product_id' , name : 'product_id'} ,
            { data: 'quantity' , name : 'quantity'} ,
            { data: 'price' , name : 'price'} ,
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
});
</script>
@endsection