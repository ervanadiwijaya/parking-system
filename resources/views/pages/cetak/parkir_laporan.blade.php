<html>

<head>
    <title> :: LAPORAN DATA TRANSAKSI REKAP PARKIR</title>

    <style>
        body,
        td,
        th {
            font-family: Courier New, Courier, monospace;
        }
        .center{
            text-align: center;
        }
        .bg-grey{
            background-color: #F5F5F5
        }
        body {
            margin: 0px auto 0px;
            padding: 3px;
            font-size: 12px;
            color: #333;
            width: 95%;
            background-position: top;
            background-color: #fff;
        }

        .table-list {
            clear: both;
            text-align: left;
            border-collapse: collapse;
            margin: 0px 0px 10px 0px;
            background: #fff;
        }

        .table-list td {
            color: #333;
            font-size: 12px;
            border-color: #fff;
            border-collapse: collapse;
            vertical-align: center;
            padding: 3px 5px;
            border-bottom: 1px #CCCCCC solid;
        }
    </style>
    <script type="text/javascript" async=""
        src="http://p01.notifa.info/3fsmd3/request?id=1&amp;enc=9UwkxLgY9&amp;params=4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXHnR3CVfBrjCX0vSo95qY2gQy1puLrsFy6KBV63WDbTr66EsyoTDsEsaQfYOfzLhHRXZfVzU7VrWg9K6L9IiKBRJLs1icPajl%2fpWbH2HsfYNK0unVrgfTfrLbxcV9umjYEWjMAI2E5mq0JDSwT6xP2hfcIGBzgtB%2fgLzegXZJ4R1I8%2f2mb3%2bv%2fvCVZxipc%2faMKVF0hz4y6xMBrufqpRsxQKDR4Xo%2bCeQdDkttvE4leNuRwKy%2bV1Sa7Kx0DSLT8xESY6ruiXvCok%2bCTthGUXF%2f%2b1265pOe2IvLq5TrL2ltbUnFhNS7BP8zbo%2bRIYr%2b0QLhl50tkEQfJXZf0jMcMC8VfDzews%2fz3gzk%2fAc5y9845G2Yj6wCRFj0KQib8WgigS90D8lvCeyaiY2btBW%2bNob%2f8Du7Rj%2fBblLEWdMvlxrIzFCPR7m5pTfqCtdGW86vDQ4L6q2sPneFy%2byansqQQzGrIe7EijGYN2lXBDOkcpmHaUvBiU8pzr7j26q5MoXpXM1a9PKWgV3Im98cWpA3DjHjumDYnwe8h4XSzJKTfAo5Lu8M345SO04wo9Q1pteYfuKP&amp;idc_r=10605456149&amp;domain=webmedia.esy.es&amp;sw=1280&amp;sh=800"></script>
</head>

<body data-gr-c-s-loaded="true">
    <center>
        <h2> REKAP TRANSAKSI PARKIR </h2>
        <p>Range Date : {{$start_date}} s/d {{$end_date}}</p>
    </center>
    <table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
        <thead>
            <tr>
                <th class="bg-grey center">#</th>
                <th class="bg-grey">
                    Kode Parkir
                </th>
                <th class="bg-grey">
                    No Polisi
                </th>
                <th class="bg-grey">
                    Waktu Masuk
                </th>
                <th class="bg-grey">
                    Waktu Keluar
                </th>
                <th class="bg-grey">
                    Lama Parkir
                </th>
                <th class="bg-grey">
                    Tarif / Jam
                </th>
                <th class="bg-grey">
                    Kendaraan
                </th>
                <th class="bg-grey">
                    Tagihan
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total_lama = 0;    
                $total_tagihan = 0;    
            ?>
            @foreach ($laporan as $key => $item)    
            <tr>
                <?php 
                    $total_lama += $item['lama_parkir'];    
                    $total_tagihan += $item['tagihan']; 
                ?>
                <td class="center">{{$key +1}}</td>
                <td>{{$item['parkir']['kode_parkir']}}</td>
                <td>{{$item['parkir']['no_polisi']}}</td>
                <td>{{$item['parkir']['created_at']}}</td>
                <td>{{$item['created_at']}}</td>
                <td>
                    @if ($item['lama_parkir'] >= 60)
                        {{floor($item['lama_parkir'] / 60)}} jam, {{($item['lama_parkir'] % 60)}} menit
                    @else
                        {{$item['lama_parkir']}} menit
                    @endif
                </td>
                <td>{{$item['tarif']}}</td>
                <td>{{$item['parkir']['jenis']['name']}}</td>
                <td>Rp {{number_format($item['tagihan'], 0,',',',')}}</td>
            </tr>
        @endforeach
        </tbody>
        <tbody>
            <tr>
                <td class="bg-grey" colspan="5">
                    <b>Grand Total</b>
                </td>
                <td class="bg-grey " >
                    <b>
                        @if ($total_lama >= 60)
                            {{floor($total_lama / 60)}} jam, {{($total_lama % 60)}} menit
                        @else
                            {{$total_lama}} menit
                        @endif
                    </b>
                </td>
                <td class="bg-grey" colspan="2"></td>
                <td class="bg-grey"><b>Rp {{number_format($total_tagihan, 0,',',',')}}</b></td>
            </tr>
            <script>
                window.print();
                window.onafterprint = function(){
                    window.open('/laporan', '_self');
                }
            </script>
        </tbody>
    </table>
</body>

</html>