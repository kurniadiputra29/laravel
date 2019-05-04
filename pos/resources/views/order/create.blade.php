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
<div class="box box-info" id="app">
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
			<div class="form-group">
				<label class="col-sm-2 control-label">Payment</label>
				<div class="col-sm-10">
					<select class="form-control select2" name="payment_id" required>
						<option class="col-sm-10" value="">~~Pilih Payment~~</option>
						@foreach($payments as $payment)
						<option class="col-sm-10" value="{{$payment->id}}">{{$payment->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div v-for="(order, index) in orders" :key="index">
				<div class="form-group row"  >
					<label class="col-sm-2 control-label">Product @{{ index + 1 }}</label>
					<div class="col-sm-4">
						<select class="form-control select2" name="product_id[]" v-model="order.product_id" required>
							<option class="col-sm-10" value="0">~~Pilih Product~~</option>
							@foreach($products as $product)
							<option class="col-sm-10" value="{{$product->id}}">{{$product->name}}</option>
							@endforeach
						</select>
					</div>
					<label for="quantity" class="col-sm-1 control-label" >Quantity</label>
					<div class="col-sm-5">
						<input type="number" name="quantity[]" class="form-control" id="quantity" placeholder="Masukkan quantity pesanan" v-model="order.quantity">
					</div>
					<label for="note" class="col-sm-2 control-label">Note</label>
					<div class="col-sm-10" style="margin-top: 10px;">
						<textarea name="note[]" class="form-control" rows="3" placeholder="Enter ..." id="note">{{ old('note') }}</textarea>
					</div>
					<label for="subtotal" class="col-sm-2 control-label" >Subtotal</label>
					<div class="col-sm-4" style="margin-top: 10px;">
						<input type="number" name="subtotal[]" class="form-control" id="subtotal" :value="subtotal(order.product_id, order.quantity, index)" readonly>
					</div>
					<div class="col-sm-4" style="margin-top: 10px; ">
						<button type="button" class="btn btn-danger" id="del1" style="margin-left: 10px;" @click="delDetail(index)"><i class="fa fa-trash-o"></i></button><label style="margin-left: 10px;" @click="delDetail(index)"> Hapus Product Baru</label>
					</div>
				</div>
				<div class="form-group">
					<hr>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-10">
					<button type="button" class="btn btn-success" @click="addDetail()"><i class="fa fa-plus"></i></button> <label style="margin-left: 10px;"  @click="addDetail()">Tambah Product Baru</label>
				</div>
			</div>
			<div class="form-group">
				<label for="diskon" class="col-sm-2 control-label">Diskon</label>
				<div class="col-sm-10">
					<input type="number" name="diskon" class="form-control" id="diskon" v-model="diskons">
				</div>
			</div>
			{{-- <div class="form-group">
				<label for="diskon" class="col-sm-2 control-label">Diskon</label>
				<div class="col-sm-10">
					<input type="number" name="diskon" class="form-control" id="diskon" :value="diskon">
				</div>
			</div> --}}
			<div class="form-group">
				<label for="total" class="col-sm-2 control-label">Total</label>
				<div class="col-sm-10">
					<input type="text" name="total" class="form-control" id="total" :value="totals" readonly>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script type="text/javascript">
	new Vue({
		el: '#app',
		data: {
			orders: [
			{product_id:0, quantity:1, subtotal:0},
			],
			diskons: [
			{diskons:0, total:0}
			]
		},
		methods: {
			addDetail(){
				var order = {product_id:0, quantity:1, subtotal:0};
				this.orders.push(order)
			},
			delDetail(index){
				if (index > 0 ) {
					this.orders.splice(index, 1);
				}
			},
			subtotal(product_id, qty, index){
				var subtotal =  this.products[product_id]*qty;
				this.orders[index].subtotal = subtotal;
				return subtotal;
			},
		},
		computed: {
				products(){
					var products = [];

					products[0]=0

					@foreach($products as $product)
					products[{{$product->id}}] = {{$product->price}}
					@endforeach

					return products;
				},
				total() {
					return this.orders
					.map( order => order.subtotal)
					.reduce( (prev, next) => prev + next );
				},
				totals() {
					if (this.total == '') {
						var dis =  0;
						this.diskons = this.total;
						return dis;
					} else
						var dis = this.total - this.diskons;
						return dis;
				}
			},
	});
</script>
@endsection