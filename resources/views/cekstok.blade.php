@extends('header')
@section('title', 'Cek Stok - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Cek Stok</h4> 
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <!-- Input tag untuk scanner QR Code -->
                    <div class="form-group">
                        <div class="input-group m-t-10"> 
                            <span class="input-group-btn">
                                <button class="btn waves-effect waves-light btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-qrcode"></i></button>
                            </span>

                            <input type="text" id="qr_code" name="kode_barang" class="form-control" placeholder="Kode Barang" value="" > 
                            
                            <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#modalStok"><i class="fa  fa-check-circle"></i></button>
                            </span> 
                        </div>
                    </div>
                    <!-- /End input tag untuk scanner QR Code -->
            </div>

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


            <!-- Modal Scanner QR Code -->
            <div id="modalStok" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Stok Barang</h4> 
                        </div>
                        <!-- <div class="modal-body" style="margin-left: auto; margin-right:auto; padding-bottom:auto"> -->
                            <div class="col-md-12" style="margin-top:15px ">
                                <div class="col-md-4">NAMA BARANG</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">FOIL AG20004</div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">KODE BARANG</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">170102022</div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">SATUAN BARANG</div>
                                <div class="col-md-1">:</div>
                                <div class="col-md-7">ROLL</div>
                            </div>

                            <div class="col-md-12">
                                <div class="white-box">
                                    <div class="table-responsive">
                                        <table id="example" class="table display">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px">No.</th>
                                                    <th>Tgl.</th>
                                                    <th>Input</th>
                                                    <th>Output</th>
                                                    <th>Saldo</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width: 20px">No.</th>
                                                    <th>Tgl.</th>
                                                    <th>Input</th>
                                                    <th>Output</th>
                                                    <th>Saldo</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </tfoot>
                                             <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>24/06/2020</td>
                                                    <td>4</td>
                                                    <td>-</td>
                                                    <td>4</td>
                                                    <td>QST/MBAG</td>
                                                </tr>
                                                <tr> 
                                                    <td>2.</td>
                                                    <td>25/06/2020</td>
                                                    <td>-</td>
                                                    <td>3.72</td>
                                                    <td>0.28</td>
                                                    <td>FIM</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
                //outputMessage.hidden = true;
                //outputData.parentElement.hidden = false;
                //outputData.innerText = code.data;
                //document.getElementById("demo").innerHTML = code.data;
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