<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix Asset ATMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: white;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Ensure border radius is applied */
        }

        .email-header {
            background-color: #5da3f0;
            padding: 20px;
            text-align: center;
        }

        .email-header img {
            max-width: 100%;
            height: auto;
        }

        .email-body {
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin: 0 0 20px;
        }

        p {
            font-size: 16px;
            color: #666;
            line-height: 1.5;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table-header {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4184f3;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #357ae8;
        }

        .email-footer {
            font-size: 12px;
            color: #888;
            padding: 10px 20px;
            text-align: center;
            border-top: 1px solid #f0f0f0;
        }

        .email-footer a {
            color: #4184f3;
            text-decoration: none;
            margin: 0 5px;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }

        .email-footer .unsubscribe {
            margin-top: 10px;
            display: block;
            color: #888;
        }

        @media (max-width: 600px) {
            .email-body {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            .btn {
                padding: 8px 16px;
                font-size: 14px;
            }

            .email-footer {
                font-size: 11px;
                padding: 15px;
            }

            .email-footer a {
                display: block;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://via.placeholder.com/32" alt="ATMI Logo">
        </div>
        <div class="email-body">
            <h1>Halo!</h1>
            <p>Pengajuan Fix Asset Delayed/Disetujui/Ditolak/Menunggu</p>
        
            <table>
                <tr>
                    <td class="table-header">Diajukan oleh:</td>
                    <td><strong>Muhammad</strong></td>
                </tr>
                <tr>
                    <td class="table-header">Diajukan Tanggal:</td>
                    <td><strong>2021-01-01</strong></td>
                </tr>
                <tr>
                    <td class="table-header">Jenis Ajuan:</td>
                    <td><strong>[Jenis Ajuan]</strong></td>
                </tr>
                <tr>
                    <td class="table-header">Deskripsi Ajuan:</td>
                    <td><strong>[Deskripsi Ajuan]</strong></td>
                </tr>
                <tr>
                    <td class="table-header">STATUS:</td>
                    <td><strong>Menunggu/Ditolak/Disetujui/Delay</strong></td>
                </tr>
                <tr>
                    <td class="table-header">Alasan Delay:</td>
                    <td><small>Catatan</small></td>
                </tr>
                <tr>
                    <td class="table-header">Waktu Delay:</td>
                    <td><small>Sampai dengan 14 Agustus 2024</small></td>
                </tr>
                <tr>
                    <td class="table-header">Alasan penolakan:</td>
                    <td><small><strong>[Alasan Penolakan]</strong></small></td>
                
                </tr>
                <tr>
                    <td class="table-header">Ditolak oleh:</td>
                    <td><small><strong>[OfficialFixaset]</strong></small></td>
                
                </tr>
            </table>
        
            <a href="#" class="btn">Lihat Sekarang</a>
        
            <p>If you have any questions, just reply to this email—we're always happy to help out.</p>
            <p>IT Team ATMI</p>
        </div>
        <div class="email-footer">
            <p>
                <a href="#">Dashboard</a> · <a href="#">Billing</a> · <a href="#">Help</a>
            </p>
            <a href="#" class="unsubscribe">If these emails get annoying, please feel free to unsubscribe.</a>
            <p>Contoso - 1234 Main Street - Anywhere, MA - 56789</p>
        </div>
    </div>
</body>
</html>
