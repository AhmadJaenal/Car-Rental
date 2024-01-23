<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
</head>

<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        width: 25cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        padding: 10px 0;
        margin-bottom: 30px;
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo img {
        width: 90px;
    }

    h1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
    }

    #project {
        float: left;
    }

    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
    }

    table .service,
    table .desc {
        text-align: left;
    }

    table td {
        padding: 20px;
        text-align: right;
    }

    table td.service,
    table td.desc {
        vertical-align: top;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 1px solid #5D6975;
        ;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }
</style>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="images/logo.png">
        </div>
        <h1>Carbook Invoice</h1>
        <div id="company" class="clearfix">
            <div>Carbook Baud</div>
            <div>29 Dago,<br /> AZ 85004, US</div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">baudCarbook@example.com</a></div>
        </div>
        <div id="project">
            <div><span>NAME</span> Contoh</div>
            <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
            <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
            <div><span>DATE</span> August 17, 2015</div>
            <div><span>DUE DATE</span> September 17, 2015</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">ID TRANSAKSI</th>
                    <th class="desc">TANGGAL MULAI</th>
                    <th>TANGGAL BERAKHIR</th>
                    <th>JAM MULAI</th>
                    <th>TOTAL DURASI</th>
                    <th>BIAYA SEWA</th>
                    <th>DENDA</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionData as $tr)
                    <tr>
                        <td class="service">{{ $tr->id_transaksi }}</td>
                        <td class="service">{{ $tr->tgl_rental }}</td>
                        <td class="service">{{ $tr->tgl_kembali }}</td>
                        <td class="service">{{ $tr->jam_mulai }}</td>
                        <td class="service">{{ $tr->total_durasi }}</td>
                        <td class="service">RP {{ $tr->biaya_sewa }}</td>
                        <td class="service">RP {{ $tr->denda }}</td>
                        <td class="service">RP {{ $tr->total }}</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="grand total ">TOTAL</td>
                        <td colspan="2" class="grand total service">RP {{ $tr->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
