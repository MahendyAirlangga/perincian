<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.6;
            margin: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            width: 60px;
        }
        .header h1 {
            margin: 5px 0;
            font-size: 28px;
            color: #d9534f;
        }
        .header p {
            margin: 2px 0;
            font-size: 14px;
        }
        .info {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }
        .info-row {
            display: flex;
            align-items: center; /* Align items vertically */
            margin-bottom: 5px;
        }
        .label {
            width: 100px; /* Adjust width to align labels */
            text-align: left;
            font-weight: bold;
        }
        .separator {
            margin-right: 10px; /* Space after colon */
        }
        .value {
            flex: 1; /* Take remaining space */
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f7f7f7;
            font-weight: bold;
        }
        .payment {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }
        .payment p {
            margin: 5px 0;
        }
        .note {
            font-size: 12px;
            margin-top: 20px;
        }
        .note p {
            margin: 5px 0;
            color: #d9534f;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature p {
            margin: 5px 0;
        }
        .claim {
            border: 1px solid #d9534f;
            background-color: #d9534f;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            display: inline-block;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="header" style="margin-bottom: 30px;">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 30px; vertical-align: middle;">
                    <img src="{{ asset('assets/images/logo_ekspedisi_2.png') }}" alt="Logo" style="width: 100px; height: auto;">
                </td>
                <td style="vertical-align: middle; text-align: center; padding-left: -70px;"> <!-- Negative padding -->
                    <h1 style="font-size: 28px; color: #d9534f; margin-left: -70px;">UD. IRIAN EXPRESS</h1> <!-- Move title to the left -->
                    <p style="font-size: 14px; margin-left: -70px;">EXPEDISI ANTAR PULAU</p> <!-- Move subtext to the left -->
                    <p style="font-size: 14px; margin-left: -70px;">Jl. KH. Mansyur no. 221A<br>No. kantor: (031) - 3550763</p> <!-- Address -->
                </td>
            </tr>
        </table>
        
    </div>
    
    
    <div class="">
        <div class="info-row">
            <span class="label">Nama Merk</span>
            <span class="separator">:</span>
            <span class="value">{{ $barang->nama_merk }}</span>
        </div>
        <div class="info-row">
            <span class="label">Kapal</span>
            <span class="separator">:</span>
            <span class="value">{{ $barang->kapal }}</span>
        </div>
        <div class="info-row">
            <span class="label">Tujuan</span>
            <span class="separator">:</span>
            <span class="value">{{ $barang->tujuan }}</span>
        </div>
        <div class="info-row">
            <span class="label">Tanggal</span>
            <span class="separator">:</span>
            <span class="value">{{ $barang->tanggal }}</span>
        </div>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>COLIS</th>
                <th>JENIS BARANG</th>
                <th>PENGIRIM</th>
                <th>P</th>
                <th>L</th>
                <th>T</th>
                <th>Total Barang</th>
                <th>m<sup>3</sup></th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang->details->take(7) as $key => $detail)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $detail->tanggal_barang }}</td>
                <td>{{ $detail->colis }}</td>
                <td>{{ $detail->jenis_barang }}</td>
                <td>{{ $detail->pengirim }}</td>
                <td>{{ $detail->panjang }}</td>
                <td>{{ $detail->lebar }}</td>
                <td>{{ $detail->tinggi }}</td>
                <td>{{ $detail->total_barang }}</td>
                <td>{{ number_format($detail->m3, 2) }}</td>
            </tr>
            @endforeach
            <!-- Menambahkan baris kosong jika data kurang dari 7 -->
        @for($i = $barang->details->count(); $i < 7; $i++)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endfor
        </tbody>
    </table>
    <div class="payment" style="text-align: center; margin: 0 auto; font-size: 10px;">
        <p style="font-size: 10px; color: black; margin-bottom: 10px;"><strong>Perincian Pembayaran</strong></p>
        <table style="margin: 0 auto; border-collapse: collapse; width: 80%; font-family: Arial, sans-serif; font-size: 10px;">
            <thead>
                <tr style="background-color: #f7f7f7; border-bottom: 2px solid #ddd;">
                    <th style="padding: 5px 10px; text-align: left; font-weight: bold; color: black; font-size: 10px;">Keterangan</th>
                    <th style="padding: 5px 10px; text-align: left; font-weight: bold; color: black; font-size: 10px;">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 5px 10px; font-size: 10px; color: black;"><strong>1. Biaya ekspedisi:</strong></td>
                    <td style="padding: 5px 10px; text-align: left; font-size: 10px; color: black;">{{ $barang->m3 }} m<sup>3</sup> x Rp750.000 = Rp. {{ number_format($barang->total_pembayaran, 2, ',', '.') }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 5px 10px; font-size: 10px; color: black;"><strong>2. Lain-lain:</strong></td>
                    <td style="padding: 5px 10px; text-align: left; font-size: 10px; color: black;">Rp. {{ number_format($barang->biaya_lain, 2, ',', '.') }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 5px 10px; font-size: 10px; color: black;"><strong>Total Pembayaran:</strong></td>
                    <td style="padding: 5px 10px; text-align: left; font-weight: bold; color: black; font-size: 10px;">Rp. {{ number_format($barang->total_pembayaran, 2, ',', '.') }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 5px 10px; font-size: 10px; color: black;"><strong>DP Pertama:</strong></td>
                    <td style="padding: 5px 10px; text-align: left; font-size: 10px; color: black;">Rp. {{ number_format($barang->dp_pertama, 2, ',', '.') }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 5px 10px; font-size: 10px; color: black;"><strong>Sisa Pembayaran:</strong></td>
                    <td style="padding: 5px 10px; text-align: left; font-weight: bold; color: black; font-size: 10px;">Rp. {{ number_format($barang->sisa_pembayaran, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <p style="font-size: 14px; font-weight: bold;"><strong>Terbilang:</strong> {{ ucwords(number_format($barang->total_pembayaran)) }} rupiah</p>
    <div class="note" style="margin-top: 10px;">
        <p style="margin: 2px 0;"><strong>CATATAN:</strong></p>
        <p style="margin: 2px 0;">Barang hilang claim maksimal 50%</p>
    </div>
    
    <div class="signature" style="margin-top: 20px;">
        <p style="margin: 2px 0;">Surabaya, {{ date('d F Y') }}</p>
        <p style="margin: 2px 0;">Ekspedisi "Irian Express"</p>
        <br><br><br><br><br>
        <p style="margin: 2px 0;"><strong>H. Muhammad Anwar</strong><br>Pimpinan</p>
    </div>
    
</body>
</html>
