<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/ampleadmin/images/logo-kiky.png">
    <title>QR Print - PT. Solo Murni</title>

    <style type="text/css">
        .label-kiky {        
            width: 50px;
            height: 30px;
        }

        .qrcode {
            width: 50x;
            height: 50px;
        }

        .label {
            width: 50px;
        }

        .qr-number {
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 7pt;
        }

        .detail {
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 6pt;
        }

        .title {
            width: 245px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 9pt;
            font-weight: bold;
        }

        .qr-number {
            writing-mode:tb-rl;
            -webkit-transform:rotate(-90deg);
            -moz-transform:rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform:rotate(-90deg);
            transform: rotate(-1deg);
            white-space:nowrap;
            float:right;
        

            margin-left: 0px;
            margin-right: 0px;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 6pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table border="1">
        @foreach ($data as $d)
            @if(($loop->iteration % 2) == 1)
            <tr>
                {{-- label left --}}
                <td>    
                    {{-- start Label --}}
                    <table> 
                        <tr>
                            <td rowspan="2"><p class="qr-number">{{ $d->qrcode }}</p></td>
                            <td class="label" align="center"><img src="{{url('/')}}/qrcode/qr-kiky.jpg" alt="" class="label-kiky"></td>
                            <td class="title" align="center">
                                {{ $d->nama_barang }}
                                <br>
                                <i>QTY : {{ $d->qty_ukur }} {{ $d->satuan_ukur }}</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="qrcode" align="center"><img src="{{ url('/') }}/qrcode/mapping/{{ $d->qrcode }}.svg" alt="" width="" class="qrcode"></td>
                            <td>
                                <table class="detail" cellpadding="0">
                                    <tr>
                                        <td>SUPPLIER</td>
                                        <td> : </td>
                                        <td>{{ $d->nama_supplier }}</td>
                                    </tr>
                                    <tr>
                                        <td>TGL DTG</td>
                                        <td> : </td>
                                        <td>{{ date('d-m-Y', strtotime($d->tanggal)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>QTY FISIK</td>
                                        <td> : </td>
                                        <td>{{ $d->qty_fisik }} {{ $d->satuan_fisik }}</td>
                                    </tr>
                                    <tr>
                                        <td>DICETAK</td>
                                        <td> : </td>
                                        <td>{{ session()->get('nama') }}</td>
                                    </tr>
                                    <tr>
                                        <td>TGL CETAK</td>
                                        <td> : </td>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    {{-- end Label --}}
                </td>
                {{-- end label left --}}
            @elseif(($loop->iteration % 2) == 0)
                {{-- label left --}}
                <td>    
                    {{-- start Label --}}
                    <table> 
                        <tr>
                            <td rowspan="2"><p class="qr-number">{{ $d->qrcode }}</p></td>
                            <td class="label" align="center"><img src="{{url('/')}}/qrcode/qr-kiky.jpg" alt="" class="label-kiky"></td>
                            <td class="title" align="center">
                                {{ $d->nama_barang }}
                                <br>
                                <i>QTY : {{ $d->qty_ukur }} {{ $d->satuan_ukur }}</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="qrcode" align="center"><img src="{{ url('/') }}/qrcode/mapping/{{ $d->qrcode }}.svg" alt="" width="" class="qrcode"></td>
                            <td>
                                <table class="detail" cellpadding="0">
                                    <tr>
                                        <td>SUPPLIER</td>
                                        <td> : </td>
                                        <td>{{ $d->nama_supplier }}</td>
                                    </tr>
                                    <tr>
                                        <td>TGL DTG</td>
                                        <td> : </td>
                                        <td>{{ date('d-m-Y', strtotime($d->tanggal)) }}</td>
                                    </tr>
                                    <tr>
                                        <td>QTY FISIK</td>
                                        <td> : </td>
                                        <td>{{ $d->qty_fisik }} {{ $d->satuan_fisik }}</td>
                                    </tr>
                                    <tr>
                                        <td>DICETAK</td>
                                        <td> : </td>
                                        <td>{{ session()->get('nama') }}</td>
                                    </tr>
                                    <tr>
                                        <td>TGL CETAK</td>
                                        <td> : </td>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    {{-- end Label --}}
                </td>
                {{-- end label left --}}
            </tr>
            @endif
        @endforeach
    </table>
    <br>
    <a href="{{ url('/') }}/bpb"><button type="button" class="btn btn-success"><i class="fa fa-reply"></i> Kembali</button></a>
</body>
</html>