<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Print</title>
    <style type="text/css">
        .border-bg {
            border-style: solid;
            border-color: #000;
            width: 378px;
            height: 189px;
        }

        .border-bg-sm {
            border-style: solid;
            border-color: #000;
            width: 57px;
            height: 57px;
            position: absolute;
            top: 8px;
            left: 400px;
        }

        .title {
            position: absolute;
            top: 15px;
            left: 140px;
            height: 62px;
            width: 245px;
            font-size: 13pt;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            text-align: center;
        }

        .qty-ukur {
            position: absolute;
            top: 80px;
            left: 140px;
            height: 20px;
            width: 245px;
            font-size: 13pt;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
        }

        .qrcode {
            position: absolute;
            left: 35px;
            top: 90px;
            width: 110px;
            height: 110px;
        }

        .qrcode-sm {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 45px;
            height: 45px;
            margin-left: 6px;
        }

        .label-kiky {
            position: absolute;
            left: 37px;
            top: 15px;
            width: 100px;
            height: 75px;
        }

        .qr-number {
            writing-mode:tb-rl;
            -webkit-transform:rotate(-90deg);
            -moz-transform:rotate(-90deg);
            -o-transform: rotate(-90deg);
            -ms-transform:rotate(-90deg);
            transform: rotate(180deg);
            white-space:nowrap;
            float:left;

            position: absolute;
            top: 8px;
            left: 13px;

            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 12pt;

            width: 20px;
            height: 189px;
            text-align: center;
        }

        .qr-number-sm {
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 4pt;
            position: absolute;
            top: 46px;
            left: 3px;
        }

        .table-detail {
            position: fixed;
            top: 105px;
            left: 140px;
            height: 15px;
            width: 245px;
            font-size: 8pt;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="demo-container">
        <div class="border-bg">
            <div class="qr-number">GAA632009310000001</div>
            <img src="{{url('/')}}/qrcode/mapping/20092200022.svg" alt="" width="" class="qrcode">
            <img src="{{url('/')}}/qrcode/qr-kiky.jpg" alt="" class="label-kiky">
            <div class="title">LEM AICA HM 244 (ACORO SAMPING) KKCHE</div>
            <div class="qty-ukur">QTY : 200 LITER</div>
            <div class="table-detail">
                <table>
                    <tr>
                        <td>SUPPLIER</td>
                        <td>:</td>
                        <td>PT. EKA DHARMA TAPE INDONESIA</td>
                    </tr>
                    <tr>
                        <td>TGL DTG</td>
                        <td>:</td>
                        <td>30 SEPTEMBER 2020</td>
                    </tr>
                    <tr>
                        <td>QTY FISIK</td>
                        <td>:</td>
                        <td>1 KALENG</td>
                    </tr>
                    <tr>
                        <td>CETAK OLEH</td>
                        <td>:</td>
                        <td>MUTIARA RATRI WULANDARI</td>
                    </tr>
                    <tr>
                        <td>TGL CETAK</td>
                        <td>:</td>
                        <td>30 SEPTEMBER 2020</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="border-bg-sm">
            <img src="{{url('/')}}/qrcode/mapping/20092200022.svg" alt="" width="" class="qrcode-sm">
            <div class="qr-number-sm">GAA632009310000001</div>
        </div>
        
    </div>
</body>
</html>