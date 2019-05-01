<!DOCTYPE html>
<html>
<head>
  <title>Download</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid mt-2">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Table Number</th>
          <th>Total</th>
          <th>Order Date</th>
          <th>Kasir</th>
        </tr>
      </thead>
      <tbody>
        @php
        $nomor=1;
        @endphp
        @foreach($orders as $order)
        <tr>
          <td>{{$nomor++}}</td>
          <td>{{$order->table_number}}</td>
          <td>Rp {{ number_format($order->total, 0, " ", ".") }}</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->user->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

