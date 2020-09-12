@extends('header')
@section('title', 'Home - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Starter Page</h4> 
            </div>
        <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Blank page</h3> </div>
                    {{-- {!! QrCode::size(1000)->generate('Kurniawan Eko Yulianto'); !!} --}}
                    <img src="{{ url('/') }}/qrcode/{{ $qrcode }}.svg" alt="" height="200" width="200">
                </div>
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection