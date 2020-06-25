@extends('header')
@section('title', 'Mapping - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Mapping Gudang</h4> </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- White Box -->
                <div class="white-box">
                    <!-- Input tag untuk scanner QR Code -->
                    <div class="form-group">
                        <div class="input-group m-t-10"> 
                            <span class="input-group-btn">
                                <button class="btn waves-effect waves-light btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-qrcode"></i></button>
                            </span>
                            
                            <input type="text" id="qr_code" name="kode_barang" class="form-control" placeholder="Kode Barang / Nama Barang" value=""> 
                            
                            <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-success" onclick="myHide()"><i class="fa  fa-check-circle"></i></button>
                            </span> 
                        </>
                    </div>
                    <!-- /End input tag untuk scanner QR Code -->
                    <div>
                        <h3 align="center" id="mapping" style="visibility: hidden"><b>GUDANG BAHAN PEMBANTU - AREA DEPAN - RAK BLOK B</b></h3>
                    </div>
                    <img id="mapping1" src="ampleadmin/images/Mapping.png" alt="" width="990px" height="230px" style="visibility:hidden" data-toggle="modal" data-target="#myModalTemp">

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

                    <div id="myModalTemp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Informasi Detail Barang</h4> </div>
                                <div class="modal-body" style="margin-left: auto; margin-right:auto;">
                                    <table>
                                        <tr>
                                            <td>NAMA BARANG</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td><b>FOIL AG20004</b></td>
                                        </tr>

                                        <tr>
                                            <td>KODE BARANG</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>170102022</td>
                                        </tr>

                                        <tr>
                                            <td>STOK</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>500</td>
                                        </tr>

                                        <tr>
                                            <td>SATUAN</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>ROLL</td>
                                        </tr>

                                        <tr>
                                            <td>SUPPLIER</td>
                                            <td>&nbsp;:&nbsp;</td>
                                            <td>SHANDONG HONGDING STEEL LTD.</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /End White Box -->
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
 
        function myHide() {
            document.getElementById("mapping").style.visibility = "visible";
            document.getElementById("mapping1").style.visibility = "visible";
        }
      </script>
    @include('footer')
@endsection