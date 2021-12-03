@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  <h2>Product Gallery</h2>
  <p>List of products</p>
  <div class="row">
  @foreach($products as $product)
    <div class="col-md-4">
      <div class="thumbnail">
          <h2>{{$product->name}}</h2>
        <a href="/w3images/lights.jpg" target="_blank">
          <img src='{{$product->image}}' alt="Lights" style="width:100%">
            <p>{{$product->description}}</p>
        </a>
      </div>
      <form action="{{route('add-to-cart')}}" method="post">
          @csrf
          <input type='hidden' name="product_id" value="{{$product->id}}"/>
      <button type="submit" class = "btn btn-primary">Add To Cart</button>
      </form>
      <a href="" class = "btn btn-primary">View</a>
    </div>
    @endforeach

  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- <script type="text/javascript">

//     var table = $('.data-table').DataTable({

//         processing: true,
//         serverSide:true,

//         ajax : "{{route('products-list')}}",
//         columns: [
             
//               {data: 'name' , name: 'name'},
//               {data: 'description', name: 'description'},
//               {data: 'sku' , name: 'sku'},
//               {data: 'price' , name: 'price'},
//               {data: 'vendor_id' , name: 'vendor_id'},
//               {data: 'instock', name: 'instock'},
//               {data: 'action', name: 'action', orderable: false, searchable: false},
//         ]
//     });

// </script> -->
