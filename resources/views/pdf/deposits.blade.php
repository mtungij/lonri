<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            margin-bottom: 16px;
            border-bottom: 1px solid #d1d5db;
            padding-bottom: 10px;
        }

        .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .meta {
            margin: 4px 0;
            color: #374151;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th,
        td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
        }

        thead th {
            background: #1d4ed8;
            color: #ffffff;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        .right {
            text-align: right;
        }

        .footer {
            margin-top: 10px;
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Deposits Report</h1>
        <p class="meta">Member: {{ $customer->fname }} {{ $customer->lname }} ({{ $customer->nickname }})</p>
        <p class="meta">Phone: {{ $customer->phone }}</p>
        <p class="meta">Generated: {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 20%;">Date</th>
                <th style="width: 34%;">Description</th>
                <th style="width: 15%;" class="right">Paid</th>
                <th style="width: 15%;" class="right">Withdrawn</th>
                <th style="width: 16%;" class="right">Balance</th>
            </tr>
        </thead>
        <tbody>
            @forelse($deposits as $deposit)
                <tr>
                    <td>{{ $deposit->created_at ? $deposit->created_at->format('d-m-Y H:i') : '-' }}</td>
                    <td>{{ $deposit->desc }}</td>
                    <td class="right">{{ number_format((float) $deposit->deposit, 2, '.', ',') }}</td>
                    <td class="right">{{ number_format((float) $deposit->withdrawal, 2, '.', ',') }}</td>
                    <td class="right">{{ number_format((float) $deposit->amount, 2, '.', ',') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No deposits found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="footer">Total records: {{ $deposits->count() }}</p>
</body>
</html>
