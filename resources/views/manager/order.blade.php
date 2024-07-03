<!DOCTYPE html>
<html lang="en">

<head>
	@include('manager.css')
</head>

<body>
	<div class="wrapper">
		@include('manager.sidebar')

		<div class="main">
			@include('manager.navbar')

			<main class="content">
				<div class="container-fluid p-0">
               <div class="container-fluid py-4"> 
                  <div class="container">
                    <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                      <div class="container-fluid">
                        <div class="card-body">
                        <div class="container">
                          <div class="py-3">
                            <h3 class="m-0 font-weight-bold pl-2" style="padding-bottom: 6px;">Data <span class="text-primary"> Pesanan</span></h3>
                          </div>
                            <a style="border-radius:10px; padding:8px" class="btn btn-primary btn-sm" href="{{url('view_addorder')}}"><i class="fa-solid fa-plus" data-feather="plus">></i> Tambah Data</a>
                            <p></p>
                        </div>
                            <div class="table-responsive">
                              <table class="table" style="text-align: center">
                                <thead>
                                  <tr>
                                    <th>Kode</th>
                                    <th>Gambar</th>
                                    <th>Ukuran</th>
                                    <th>Kuantitas</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Batas Waktu</th>
                                    <th>Sub-Kontraktor</th>
                                    <th colspan="">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($order as $order)
                                  <tr>
                                    <td>{{$order->code}}</td>
                                    <td>
                                       <img style="max-width: 50px; max-height:50px" class="img" src="{{url('order').'/'.$order->image}}" alt="">
                                    </td>
                                    <td>{{$order->size}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>@currency($order->price)</td>
                                    <td>@currency($order->total_price)</td>
                                    <td>{{$order->deadline}}</td>
                                    {{-- <td>{{ empty($order->n) ? 'jhj' : $order->quantity }}</td> --}}
                                    <td></td>
                                    <td>
                                      <a class="btn btn-info" href='{{ url('edit_order',$order->id) }}'><i class="fa-regular fa-pen-to-square" data-feather="edit"></i></a>
                                      <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_order',$order->id)}}"><i class="fa-solid fa-trash" data-feather="trash-2"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
					
			</main>

			<footer class="footer">
				@include('manager.footer')
			</footer>
		</div>
	</div>

	@include('manager.js')

</body>

</html>