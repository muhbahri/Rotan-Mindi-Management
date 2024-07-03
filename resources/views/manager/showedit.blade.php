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
                        <div class="container">
                            <div style="border-radius:30px" class="card shadow-lg p-3 rounded-pill-4">
                                <div class="container-fluid">
                                    <div class="py-3">
                                        <h3 class="m-0 font-weight-bold pl-2" style="padding-bottom: 6px;">Edit <span
                                                class="text-primary">Data Order</span></h3>
                                    </div>
                                    <div style="border-radius:20px">
                                        <form class="forms-sample" action="{{ url('/update_order', $order->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Kode</label>
                                                <input type="text" class="form-control" name="kode"
                                                    id="exampleInputName1" placeholder="Kode"
                                                    value="{{ $order->code }}">
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputEmail3">Ukuran</label>
                                                <input type="text" class="form-control" name="ukuran"
                                                    id="exampleInputEmail3" placeholder="Ukuran"
                                                    value="{{ $order->size }}">
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputPassword4">Kuantitas</label>
                                                <input type="number" class="form-control" name="kuantitas"
                                                    id="exampleInputtext4" placeholder="Kuantitas"
                                                    value="{{ $order->quantity }}">
                                            </div>
                                            <div class="form-group cs-rl">
                                                <label for="exampleInputName1">Harga</label>
                                                <input type="number" class="form-control" name="harga" min="0"
                                                    id="exampleInputName1" placeholder="Harga"
                                                    value="{{ $order->price }}">
                                            </div>
                                            @if ($order->image)
                                                <div class="mb-2">
                                                    <img style="max-width: 50px; max-height:50px" src="/order/{{ $order->image }}" alt="">
                                                </div>
                                            @endif
                                            <div class="form-group cs-rl">
                                                <label>File upload</label>
                                                <input type="file" name="image" >
                                            </div>
                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                            <button class="btn btn-dark">Cancel</button>
                                        </form>
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