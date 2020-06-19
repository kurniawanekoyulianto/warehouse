@extends('header')
@section('title', 'Pengguna - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Pengguna Sistem</h4> 
            </div>
            
            <div class="col-lg-7 col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                <button class="btn btn-info btn-md btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" data-toggle="modal" data-target="#modaladd">Tambah Data</button>
            </div>

            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis User</th>
                                    <th>Divisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Users</th>
                                    <th>Divisi</th>
                                    <th style="width: 10px">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>19054825</td>
                                    <td>Pandu Mega</td>
                                    <td>Super Admin</td>
                                    <td>Business Analyst</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>19104886</td>
                                    <td>Kurniawan E. Yulianto</td>
                                    <td>Super Admin</td>
                                    <td>Business Analyst</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>19104887</td>
                                    <td>Dita Dwi Sapitri</td>
                                    <td>Super Admin</td>
                                    <td>Business Analyst</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>19094880</td>
                                    <td>Guruh Andi Pratama</td>
                                    <td>Admin</td>
                                    <td>Warehouse</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>19094881</td>
                                    <td>Mutiara Ratri Wulandari</td>
                                    <td>Admin</td>
                                    <td>Warehouse</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End white box -->

                <!-- Modal Scanner QR Code -->
                <div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data Pengguna</h4> 
                            </div>
                            <form class="form-horizontal">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-md-12">NIK Karyawan</label>
                                        <input type="text" id="nik" name="nik" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Nama Karyawan</label>
                                        <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Jenis User</label>
                                        <select class="selectpicker" data-style="form-control">
                                            <option>- PILIH JENIS USER -</option>
                                            <option>DIRECTOR</option>
                                            <option>SUPER ADMIN</option>
                                            <option>ADMIN</option>
                                            <option>STOCK KEEPER</option>
                                            <option>MATERIAL HANDLER</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Divisi</label>
                                        <select class="selectpicker" data-style="form-control">
                                            <option>- PILIH DIVISI -</option>
                                            <option>HUMAN RESOURCE</option>
                                            <option>BUSINESS ANALYST</option>
                                            <option>WAREHOUSE</option>
                                            <option>CETAK</option>
                                            <option>TAB</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <a href="#" class="btn btn-success">Simpan</a>
                                    <a href="#" class="btn btn-danger">Reset</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection

