@extends('header')
@section('title', 'Penerimaan - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Penerimaan Barang</h4> 
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

                            <input type="text" id="qr_code" name="kode_barang" class="form-control" placeholder="Kode Barang" value="" disabled> 
                            
                            <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-success"><i class="fa  fa-check-circle"></i></button>
                            </span> 
                        </div>
                    </div>
                    <!-- /End input tag untuk scanner QR Code -->

                    <!-- Input tag untuk detail barang -->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Tanggal</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Keperluan</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH KEPERLUAN -</option>
                                        <option>NPB</option>
                                        <option>PENERIMAAN BARU</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Nomor NPB</label>
                                <div class="col-md-12">
                                    <input type="text" id="no_pm" name="no_pm" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Nama Barang</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control"> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Qty Barang</label>
                                <div class="col-md-12">
                                    <input type="text" id="tch3" name="qty" class="form-control" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Satuan</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH SATUAN -</option>
                                        <option>KG</option>
                                        <option>PCS</option>
                                        <option>BOX</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Harga</label>
                                <div class="col-md-12">
                                    <input type="text" id="harga" data-mask="999,999,999,999,999" name="harga" class="form-control"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Mata Uang</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH MATA UANG -</option>
                                        <option>RUPIAH (RP)</option>
                                        <option>DOLLAR (US)</option>
                                        <option>DOLLAR (SG)</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Gudang Asal</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH GUDANG ASAL -</option>
                                        <option>GUDANG BAHAN PEMBANTU</option>
                                        <option>GUDANG BATARI</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Gudang Tujuan</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH GUDANG TUJUAN -</option>
                                        <option>GUDANG BAHAN PEMBANTU</option>
                                        <option>GUDANG BATARI</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Area Gudang</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH AREA GUDANG -</option>
                                        <option>GUDANG DEPAN</option>
                                        <option>KANTOR PAK HARTO</option>
                                        <option>GUDANG B. PEMBANTU PUSAT</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Blok Gudang</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH BLOK GUDANG -</option>
                                        <option>BLOK - A</option>
                                        <option>BLOK - B</option>
                                        <option>BLOK - C</option>
                                        <option>BLOK - D</option>
                                        <option>BLOK - E</option>
                                        <option>BLOK - F</option>
                                        <option>BLOK - G</option>
                                        <option>BLOK - H</option>
                                        <option>BLOK - I</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-12">Tingkat Rak</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH TINGKAT -</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-md-12">Plong Gudang</label>
                                <div class="col-md-12">
                                    <select class="selectpicker" data-style="form-control">
                                        <option>- PILIH PLONG -</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
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
                                    <a href="#" class="btn btn-block btn-success">Tambah Data</a>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">&nbsp;</div>
                                <div class="col-lg-5 col-sm-4 col-xs-12">
                                    <a href="#" class="btn btn-block btn-danger">Reset Data</a>
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
                                    <th>Tgl. Administrasi</th>
                                    <th>Keperluan</th>
                                    <th>No. PM</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>JOP</th>
                                    <th>Gudang Asal</th>
                                    <th>Gudang Tujuan</th>
                                    <th>Area</th>
                                    <th>Blok</th>
                                    <th>Tingkat</th>
                                    <th>Plong</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Barcode</th>
                                    <th>Tgl. Administrasi</th>
                                    <th>Keperluan</th>
                                    <th>No. PM</th>
                                    <th>Nama Barang</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>JOP</th>
                                    <th>Gudang Asal</th>
                                    <th>Gudang Tujuan</th>
                                    <th>Area</th>
                                    <th>Blok</th>
                                    <th>Tingkat</th>
                                    <th>Plong</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>20061812345678</td>
                                    <td>23/06/2020</td>
                                    <td>PENERIMAAN BARU</td>
                                    <td>21874947209</td>
                                    <td>ISI CUTTER KENKO / BONA KECIL</td>
                                    <td>100</td>
                                    <td>PCS</td>
                                    <td>7B601197</td>
                                    <td>GUDANG BAHAN PEMBANTU</td>
                                    <td>-</td>
                                    <td>GUDANG DEPAN</td>
                                    <td>BLOK A</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>PM URGENT</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>20061876859029</td>
                                    <td>18/06/2020</td>
                                    <td>NPB</td>
                                    <td>21874947209</td>
                                    <td>LEM A 8050</td>
                                    <td>9</td>
                                    <td>KG</td>
                                    <td>7B601197</td>
                                    <td>GUDANG BAHAN PEMBANTU</td>
                                    <td>-</td>
                                    <td>GUDANG DEPAN</td>
                                    <td>BLOK A</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>PM URGENT</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr> 
                            </tbody>
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
                //outputMessage.hidden = true;
                //outputData.parentElement.hidden = false;
                //outputData.innerText = code.data;
                //document.getElementById("demo").innerHTML = code.data;
                $("#qr_code").val(code.data);

                if (code.data !== null) {
                    $("#myModal").modal('hide');
                    $("#nama_barang").val('ISI CUTTER KENKO/BONA KECIL')
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