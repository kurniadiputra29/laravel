@extends('layouts.app')

@section('title', 'Create Order')
@section('header')
<h1>
  ORDER
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Order</a></li>
  <li><a href="{{route('category.index')}}">Index Order</a></li>
  <li class="active" >Create Order</li>
</ol>
@endsection

@section('content')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">CREATE ORDER</h3>
  </div>
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="form-horizontal" action="{{route('order.store')}}" method="post">
    @csrf
    <div class="box-body">
      <div class="form-group">
        <label for="table_number" class="col-sm-2 control-label">Table Number</label>
        <div class="col-sm-10">
          <input type="text" name="table_number" class="form-control" id="table_number" placeholder="Table Number/Nomor Meja" value="{{ old('table_number') }}" required>
        </div>
      </div>
      
      <div class="form-group row" id="products1">
        <label class="col-sm-2 control-label">Product 1</label>
        <div class="col-sm-4">
          <select class="form-control select2" name="product_id[]" required>
            <option class="col-sm-10" value="">~~Pilih Product~~</option>
            @foreach($product as $pro)
            <option class="col-sm-10" value="{{$pro->id}}">{{$pro->name}}</option>
            @endforeach
          </select>
        </div>
        <label for="quantity" class="col-sm-1 control-label">Quantity</label>
        <div class="col-sm-5">
          <input type="number" name="quantity[]" class="form-control" id="quantity" placeholder="Masukkan quantity pesanan" value="{{ old('quantity') }}" required>
        </div>
      </div>
      <div id="product">
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
          <button type="button" class="btn btn-success" id="addproduct2"><i class="fa fa-plus"></i></button> <label style="margin-left: 10px;">Tambah Product Baru</label>
          <button type="button" class="btn btn-danger" id="del1" style="margin-left: 10px;"><i class="fa fa-trash-o"></i></button><label style="margin-left: 10px;">Hapus Product Baru</label>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Payment</label>
        <div class="col-sm-10">
          <select class="form-control select2" name="payment_id" required>
            <option class="col-sm-10" value="">~~Pilih Payment~~</option>
            @foreach($payment as $pay)
            <option class="col-sm-10" value="{{$pay->id}}">{{$pay->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="note" class="col-sm-2 control-label">Note</label>
        <div class="col-sm-10">
          <textarea name="note" class="form-control" rows="3" placeholder="Enter ..." id="note">{{ old('note') }}</textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">User</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
        </div>
      </div>
      <div class="box-footer">
        <a href="{{route('order.index')}}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Submit</button>
      </div>
    </div>
  </form>
</div>


@endsection

@section('script')
<script>
  $(function () {
    $('.select2').select2()
  })
</script>

<script>
  $(document).ready(function(){

    var no    = 1;
    var del   = 1;
    var name  = 2;
    var box   = '#product-box'+ no++;
    var btn   = '#del'+ del++;

    $("#addproduct, #addproduct2").click(function(){
      $("#product").append("<div class='form-group' id='products1'><label class='col-sm-2 control-label'>Product "+ no++ +"</label><div class='col-sm-4'><select class='form-control select2' name='product_id[]' required><option class='col-sm-10' value=''>~~Pilih Product~~</option>@foreach($product as $pro)<option class='col-sm-10' value='{{$pro->id}}'>{{$pro->name}}</option>@endforeach</select></div><label for='quantity' class='col-sm-1 control-label'>Quantity</label><div class='col-sm-5'><input type='number' name='quantity[]' class='form-control' id='quantity' placeholder='Masukkan quantity pesanan' value='{{ old('quantity') }}' required></div><div class='col-sm-1'></div></div>");
    });

    $('#del1').click(function() {
      $('#product').empty();
    });    
  });
</script>
@endsection