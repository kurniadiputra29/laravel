<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/AdminLTE.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
  <section class="invoice">
    <div class="modal-header">
      <h4>
        <i class="fa fa-cart-plus"></i> Order Detail
      </h4>
    </div>
    <div class="modal-body">
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Toko Adi Putro</strong><br>
            jl. Kali Urang, KM 60<br>
            Barat Pom Bensin, Pokoh<br>
            Phone: (804) 123-5432<br>
            Email: info@adiputro.com
          </address>
        </div>
        <br>
        <div class="col-sm-3 invoice-col" >
          Table Number<br>
          <strong>{{$orders->table_number}}</strong>
        </div>
        <br>
        <div class="col-xs-2 invoice-col" >
          Costomers Service<br>
          <strong>{{$orders->user->name}}</strong>
        </div>
        <br>
        <div class="col-xs-3 invoice-col" >
          Created at<br>
          <strong>{{date('d-M-Y', strtotime($orders->created_at))}}</strong><br>
          <strong>{{date('H:i', strtotime($orders->created_at))}} WIB</strong>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Order</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              @php
              $nomor=1;
              @endphp
              @foreach($orders->orderDetail as $row)
              <tr>
                <td>{{$nomor++}}</td>
                <td>{{$row->order->id}}</td>
                <td>{{$row->product_name}}</td>
                <td>Rp {{ number_format($row->product_price, 0, "",".")}}</td>
                <td>{{$row->quantity}}</td>
                <td>Rp {{ number_format($row->subtotal, 0," ",".")}}</td>
                <td>{{$row->note}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Payment Methods: <b>{{$orders->payment->name}}</b></p>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>Rp {{ number_format($orders->total + $orders->diskon, 0, " ", ".")}}</td>
                </tr>
                <tr>
                  <th>Diskon:</th>
                  <td>Rp {{ number_format($orders->diskon, 0, "",".") }}</td>
                </tr>
                <tr>
                  <th>PPN:</th>
                  <td>Rp {{ number_format(0) }}</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>Rp {{ number_format($orders->total, 0, " ", ".") }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
        <p class="lead">Email: {{$orders->email}}</p>
        <p> Terimakasih Telah Memapir Di Toko Kami ! </p>
      </div>
    </div>
  </div>
</section>
</body>
</html>
