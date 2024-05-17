<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Pemesanan Paket Wisata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .ticket {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            text-align: center;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin: 0;
        }
        .ticket-body {
            margin-bottom: 20px;
        }
        .ticket-body h2 {
            margin-top: 0;
        }
        .ticket-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .ticket-info div {
            width: 48%;
        }
        .ticket-footer {
            text-align: center;
            border-top: 2px solid #4CAF50;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<div class="ticket">
    <div class="ticket-header">
        <h1>KOMODO EXPLORE</h1>
        <h2>Tiket Pemesanan Paket Wisata</h2>
    </div>
    <div class="ticket-body">
        <h2>Detail Pemesanan</h2>
        <div class="ticket-info">
            <div>
                <p><strong>Kode Booking:</strong> {{ $ticket->number }}</p>
                <p><strong>Nama Pemesan:</strong> {{ $ticket->guests->fullname }}</p>
                <p><strong>Jumlah Peserta:</strong> {{ $ticket->participant_count }} Orang</p>
            </div>
            <div>
                <p><strong>Tanggal Keberangkatan:</strong> {{ date('d/m/Y', strtotime($ticket->date)) }}</p>
            </div>
        </div>
        <h2>Detail Paket Wisata</h2>
        <div class="ticket-info">
            <div>
                <p><strong>Nama Paket:</strong> {{ $ticket->packages->package_name }}</p>
                <p><strong>Durasi:</strong> {{ $ticket->packages->duration }}</p>
            </div>
            <div>
                <p><strong>Harga:</strong> Rp {{ number_format($ticket->packages->price, 0, '.', '.') }}</p>
                <p><strong>Destinasi:</strong>
                    @foreach($ticket->packages->locations as $location)
                        {{ $location->location_name }}
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
    <div class="ticket-footer">
        <p>Terima kasih telah memesan dengan kami!</p>
        <p>Kontak: info@wisata.com | +62 812 3456 7890</p>
    </div>
</div>
</body>
</html>
