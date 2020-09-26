<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/ampleadmin/images/logo-kiky.png">
    <title>QR Plong Print - PT. Solo Murni</title>

    <style type="text/css">
        .label-kiky {        
            width: 50px;
            height: 30px;
        }

        .qrcode {
            width: 220px;
            height: 220px;
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
            font-size: 15pt;
            font-weight: bold;
        }

        .title {
            width: 200px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 10pt;
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
                            <td class="label" align="center" rowspan="5"><img src="{{url('/')}}/qrcode/plong/{{ $d->nama_gd_plong }}.svg" alt="" class="qrcode"></td>
                            <td>
                                <table style="margin: 10px;">
                                    <tr>
                                        <td><i>KODE PLONG / TINGKAT :</i></td>
                                    </tr>
                                    <tr class="detail">
                                        <td>{{ strtoupper($d->nama_gd_plong) }} / {{ strtoupper($d->nama_gd_tingkat) }}</td></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><i>BAGIAN :</i></td>
                                    </tr>
                                    <tr class="detail">
                                        <td>{{ strtoupper($d->nama_bagian) }}</td>
                                    </tr>

                                    <tr>
                                        <td><i>DICETAK OLEH :</i></td>
                                    </tr>
                                    <tr class="detail">
                                        <td>{{ session()->get('nama') }}</td>
                                    </tr>

                                    <tr>
                                        <td><i>TGL CETAK :</i></td>
                                    </tr>
                                    <tr class="detail">
                                        <td>{{ date('d-m-Y H:i:s') }}</td>
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
                        
                    </table>
                    {{-- end Label --}}
                </td>
                {{-- end label left --}}
            </tr>
            @endif
        @endforeach
    </table>
    <br>
    <a href="{{ url('/') }}/plong"><button type="button" class="btn btn-success"><i class="fa fa-reply"></i> Kembali</button></a>
</body>
</html>