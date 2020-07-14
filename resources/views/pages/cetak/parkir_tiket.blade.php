<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tket</title>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }
        @page                {
            size: A6 portrait;
            margin: 0;
        }
        .qr{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1em;
        }
        hr{
            border: 1px solid #dedede;
        }
        body{
            background: #e0e0e0;
            min-height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.5;
        }
        #print_area{
            height: 105mm;
            width: 74mm;
            background: white;
            box-sizing: border-box;
            padding: 20px;
        }
        #print_area .wrap{
            height: 100%;
            width: 100%;
        }
        #print_area .wrap .body{
            height: 100%;
            width: 100%;
        }
        .body .logo{
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: uppercase;
            margin-bottom: 1em;
        }
        .logo h1{
            font-size: 18pt;
        }
        .container{
            width: 74mm;
        }
        table{
            width: 100%;
            border-top: 3px solid black;
            border-bottom: 3px solid black;
            border-collapse: collapse;
        }
        table tr td{
            vertical-align: initial;
            padding-left: 2px;
            padding-right: 2px;
            padding-top: 5px;
            padding-bottom: 1em;
            border: 1px solid black;
            border-left: none;
            border-right: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="print_area">
            <div class="wrap">
                <div class="body">
                    <div class="logo">
                        <h1>Parking Receipt</h1>
                    </div>
                    <div class="qr">
                        <?php echo DNS1D::getBarcodeHTML($id, 'CODABAR', 3,80); ?>
                    </div>
                    <p style="text-align: center; font-size: 18pt">{{$data->kode_parkir}}</p>
                    <div style="line-height: 1; margin-top:1em;margin-bottom:1em">
                        <p style="text-align: center; font-size: 20pt"><b>{{date('d-m-Y', strtotime($data->created_at))}}</b></p>
                        <p style="text-align: center; font-size: 35pt"><b>{{date('H:s:t', strtotime($data->created_at))}}</b></p>
                    </div>

                    <p style="font-size: 11pt; text-align:center;margin-top:1em">Terima Kasih atas kunjungan anda!</p>
                </div>
            </div>
        </div>
        <button onclick="_print_label()" style="margin-top: 1em; padding:10px; box-shizing:border-box; width:100%">Print</button>
    </div>
    <script>
        function _print_label(){
            let area = document.getElementById('print_area').innerHTML;
            let temp = document.body.innerHTML;
            document.body.style.backgroundColor = "white";
            document.body.id = 'print_area';
            document.getElementById('print_area').style.width = "100%"
            document.body.innerHTML = area;
            window.print()
            document.body.id = "";
            document.body.style.backgroundColor = "#e0e0e0";
            document.body.innerHTML = temp;
        }
        // _print_label()
    </script>
</body>
</html>