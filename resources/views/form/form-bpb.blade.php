@extends('header')
@section('title', 'Cetak QRCode - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">CETAK QRCODE BARANG</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="white-box" >
                    <h3 class="box-title m-b-0" >Export Data</h3>
                    <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 20px">No.</th> --}}
                                    <th>Action</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Tgl Masuk</th>
                                    <th>NIK</th>
                                    <th>Admin</th>
                                    <th>Urutan</th>
                                    <th>No. Reff</th>
                                    <th>JOP</th>
                                    <th>Supplier</th>
                                    <th>Kode Brg</th>
                                    <th>Nama Brg</th>
                                    <th>Bagian</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($bpb as $b)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        @if($b->qty > 0) <!-- jika masih ada stok bisa di proses -->
                                            <td align='center'><a href="{{ url('/') }}/bpb/{{ $b->nomor }}/{{ $b->kode }}"><button type="button" class="btn btn-success"><i class="fa fa-cog fa-spin"></i></button></a></td>
                                        @else
                                            <td><span class="label label-rouded label-danger">SELESAI</span></td>
                                        @endif
                                        <td>{{ $b->form }}</td>
                                        <td>{{ strtoupper($b->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($b->tanggal)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($b->tglinsert)) }}</td>
                                        <td>{{ strtoupper($b->nik) }}</td>
                                        <td>{{ strtoupper($b->karyawan) }}</td>
                                        <td>{{ strtoupper($b->urutan) }}</td>
                                        <td>{{ strtoupper($b->no_reff) }}</td>
                                        <td>{{ strtoupper($b->no_job) }}</td>
                                        <td>{{ strtoupper($b->nama_supplier) }}</td>
                                        <td>{{ strtoupper($b->kode) }}</td>
                                        <td>{{ strtoupper($b->nama_barang) }}</td>
                                        <td>{{ strtoupper($b->nama_bagian) }}</td>
                                        <td>{{ $b->qty }}</td> <!-- Qty Konversi (Sudah dikurangi jumlah yg diinput qrcodenya) -->
                                        <td>{{ strtoupper($b->sat_konv) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                <!-- End white box -->
                </div>

                <div class="white-box" style="padding-bottom: 122%">
                    <h3 class="box-title m-b-0" >Detail Mapping</h3>
                    {{-- Form Input Mapping --}}
                    @foreach($select as $s)
                    <div class="col-md-4">
                        <form class="form-horizontal" action="{{ route('bpb.save') }}" method="POST" >
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-12">Keperluan</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="keperluan" required>
                                        @foreach ($keperluan as $kep)
                                            <option value="{{ $kep->id_gd_keperluan }}">{{ strtoupper($kep->nama_gd_keperluan) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            {{-- Hiddden form untuk kolom BPB --}}
                            <input type="hidden" id="form" name="form" class="form-control" value="{{ $s->form }}" readonly> 
                            {{-- End hidden form --}}

                            <div class="form-group">
                                <label class="col-md-12">Kode</label>
                                <div class="col-md-12">
                                    <input type="text" id="kode_barang" name="kode_barang" class="form-control" value="{{ $s->kode }}" readonly> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" value="{{ $s->nama_barang }}" readonly> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tgl Transaksi</label>
                                <div class="col-md-12">
                                    <input type="text" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="{{ date('d-m-Y', strtotime($s->tanggal)) }}" readonly>  
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">No. Transaksi</label>
                                <div class="col-md-12">
                                    <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="{{ $s->nomor }}" readonly> 
                                </div>
                            </div>
                            
                            <div class="form-group">                            
                                <label class="col-md-12">Qty Total</label>
                                <div class="col-md-12">
                                    <input id="qty_total" type="text" value="{{ $s->qty }}" name="qty_total" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline"> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Satuan Total</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="satuan_total" required>
                                        <option value="{{ $s->sat_konv }}">{{ $s->sat_konv }}</option>
                                        @foreach ($satuan as $sat)
                                            <option value="{{ $sat->kode_satuan }}">{{ strtoupper($sat->kode_satuan) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">                            
                                <label class="col-md-12">Qty Item</label>
                                <div class="col-md-12">
                                    <input id="qty_item" type="text" value="{{ $s->qty }}" name="qty_item" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline"> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Satuan Item</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="satuan_item" required>
                                        <option value="{{ $s->sat_konv }}">{{ $s->sat_konv }}</option>
                                        @foreach ($satuan as $sat)
                                            <option value="{{ $sat->kode_satuan }}">{{ strtoupper($sat->kode_satuan) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Bagian</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="bagian" required>
                                    @foreach ($bagian as $bag)
                                        <option value="{{ $bag->kode_bagian }}">Bagian : {{ strtoupper($bag->nama_bagian) }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Plong</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="plong" required>
                                    @foreach ($plong as $p)
                                        <option value="{{ $p->id_gd_plong }}">Plong : {{ strtoupper($p->nama_gd_plong) }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Jenis QRCode</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="jenis_qrcode" required>
                                        <option value="single">Single QRCode</option>
                                        <option value="multiple">Multiple QRCode</option>
                                    </select> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Keterangan</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="keterangan" rows="5"></textarea>
                                </div>
                            </div>
                            
                            @if($b->qty > 0) <!-- jika masih ada stok bisa di proses -->
                                <input type="submit" class="btn btn-block btn-success" value="Simpan">
                            @else
                                <input type="submit" class="btn btn-block btn-success" value="Simpan" disabled>
                            @endif
                        </form>
                    </div>
                    @endforeach
                    {{-- End form input mapping --}}
                    
                    {{-- Tabel Barcode Mapping --}}
                    <div class="col-md-8">
                        <h3 class="box-title m-b-0" >Data QRCode</h3>
                        <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example24" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        {{-- <th style="width: 20px">No.</th> --}}
                                        <th>Nomor</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Satuan</th>
                                        <th>Bagian</th>
                                        <th>Plong</th>
                                        <th>QR Code</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach($dataqr as $dataqr)
                                        <tr>
                                            <td>{{ strtoupper($dataqr->nomor_transaksi) }}</td>
                                            <td>{{ strtoupper($dataqr->nama_barang) }}</td>
                                            <td>{{ strtoupper($dataqr->qty_ukur) }}</td>
                                            <td>{{ strtoupper($dataqr->satuan_ukur) }}</td>
                                            <td>{{ strtoupper($dataqr->nama_bagian) }}</td>
                                            <td>{{ strtoupper($dataqr->nama_gd_plong) }}</td>
                                            <td>{{ strtoupper($dataqr->qrcode) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><br>
                        <div align="right">
                                <a href="{{ url('/') }}/bpb-print/{{ $bpb['0']->nomor }}"><button type="button" class="btn btn-info"><i class="fa fa-print"></i> Print Label</button></a>
                        </div>
                    </div>
                    {{-- End barcode mapping --}}
                </div>
            </div>
        </div>
        <!-- End Page -->
    </div>

    <script>
        $("input[name='qty_total']").TouchSpin({
            min: 0,
            max: 50,
            step: 0.01,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10
        });

        $("input[name='qty_satuan']").TouchSpin({
            min: 0,
            max: 9999,
            step: 0.01,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10
        });
    </script>
    @include('footer')
@endsection