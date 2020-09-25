@extends('header')
@section('title', 'Pengeluaran - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Pengeluaran Barang</h4> 
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- White box -->
                <div class="white-box">
                    <!-- Input tag untuk scanner QR Code -->
                    <div class="form-group">
                        <div class="input-group m-t-10"> 
                            <span class="input-group-btn">
                                <button class="btn waves-effect waves-light btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-qrcode"></i></button>
                            </span>

                            <input type="text" id="qr_code" name="kode_barang" class="form-control" placeholder="QR Code Barang" value="" > 
                            
                            <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-success"><i class="fa  fa-check-circle"></i></button>
                            </span> 
                        </div>
                    </div>
                    <!-- /End input tag untuk scanner QR Code -->

                    <!-- Input tag untuk detail barang -->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-12">Keperluan</label>
                            <div class="col-md-12">
                                <select class="form-control select2" data-style="form-control" name="pengeluaran">
                                    @foreach ($keperluan as $kep)
                                        <option value="{{ $kep->id_gd_keperluan }}">{{ $kep->nama_gd_keperluan }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
 
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Nomor</label>
                                <div class="col-md-12">
                                    <input type="text" id="nomor" name="nomor" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Nama Barang</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" value=""> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Qty Barang</label>
                                <div class="col-md-12">
                                    <input id="qty_item" type="text" name="qty_item" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Satuan</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" data-style="form-control" name="satuan">
                                        @foreach ($satuan as $sat)
                                            <option value="{{ $sat->id_satuan }}">{{ $sat->nama_satuan }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Bagian Asal</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" data-style="form-control" name="bagian_asal">
                                        <option value="-"> TIDAK ADA </option>
                                        @foreach ($bagian as $bag)
                                            <option value="{{ $bag->kode_bagian }}"> {{ strtoupper($bag->nama_bagian) }} </option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Plong Asal</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" data-style="form-control" name="plong_asal">
                                        <option value="-"> - </option>
                                        @foreach ($plong as $plong1)
                                            <option value="{{ $plong1->id_gd_plong }}"> Blok : {{ $plong1->nama_gd_blok }} Tingkat : {{ $plong1->nama_gd_tingkat }} Plong : {{ $plong1->nama_gd_plong }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Bagian Tujuan</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" data-style="form-control">
                                        <option value="-"> TIDAK ADA </option>
                                        @foreach ($bagian as $bag)
                                            <option value="{{ $bag->kode_bagian }}"> {{ strtoupper($bag->nama_bagian) }} </option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Plong Tujuan</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" data-style="form-control" name="plong_tujuan">
                                        <option value="-"> - </option>
                                        @foreach ($plong as $plong2)
                                            <option value="{{ $plong2->id_gd_plong }}"> Blok : {{ $plong2->nama_gd_blok }} Tingkat : {{ $plong2->nama_gd_tingkat }} Plong : {{ $plong2->nama_gd_plong }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Keterangan</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-lg-5 col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-success">Tambah Data</button>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">&nbsp;</div>
                                <div class="col-lg-5 col-sm-4 col-xs-12">
                                    <button type="reset" class="btn btn-block btn-danger">Reset Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /End input tag untuk detail barang -->

                    <!-- Table temporary -->
                    <h3 class="box-title m-b-0">Daftar Pengeluaran Barang</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Barcode</th>
                                    <th>Tgl. Keluar</th>
                                    <th>Keperluan</th>
                                    <th>Nomor</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Bagian Asal</th>
                                    <th>Plong Asal</th>
                                    <th>Bagian Tujuan</th>
                                    <th>Plong Tujuan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /Table temporary -->

                    <!-- Modal Scanner QR Code -->
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Scan QR Code</h4> </div>
                                <div class="modal-body" style="margin-left: auto; margin-right:auto;">
                                    <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
                                    <canvas id="canvas" style="width: 100%; height:100%;" hidden></canvas>
                                    <div id="output" hidden style="color: white">
                                        <div id="outputMessage">No QR code detected.</div>
                                        <div hidden><b>Data:</b> 
                                            <span id="outputData"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- End white box -->
            </div>
        </div>
        <!-- End Page -->
    </div>

    <script>
        var video = document.createElement("video");
        var canvasElement = document.getElementById("canvas");
        var canvas = canvasElement.getContext("2d");
        var loadingMessage = document.getElementById("loadingMessage");
        var outputContainer = document.getElementById("output");
        var outputMessage = document.getElementById("outputMessage");
        var outputData = document.getElementById("outputData");

        function drawLine(begin, end, color) {
          canvas.beginPath();
          canvas.moveTo(begin.x, begin.y);
          canvas.lineTo(end.x, end.y);
          canvas.lineWidth = 4;
          canvas.strokeStyle = color;
          canvas.stroke();
        }
    
        // Use facingMode: environment to attemt to get the front camera on phones
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
          video.srcObject = stream;
          video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
          video.play();
          requestAnimationFrame(tick);
        });
    
        function tick() {
          loadingMessage.innerText = "⌛ Loading video..."
          if (video.readyState === video.HAVE_ENOUGH_DATA) {
            loadingMessage.hidden = true;
            canvasElement.hidden = false;
            outputContainer.hidden = false;
    
            canvasElement.height = video.videoHeight;
            canvasElement.width = video.videoWidth;
            canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
            var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
            var code = jsQR(imageData.data, imageData.width, imageData.height, {
              inversionAttempts: "dontInvert",
            });
            if (code) {
                drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF0000");
                drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF0000");
                drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF0000");
                drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF0000");
                $("#qr_code").val(code.data);

                if (code.data !== null) {
                    $("#myModal").modal('hide');
                }
            } else {
              outputMessage.hidden = false;
              outputData.parentElement.hidden = true;
            }
          }
          requestAnimationFrame(tick);
        }
      </script>
    @include('footer')
@endsection