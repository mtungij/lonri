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
            font-size: 11px;
            margin: 18px;
        }

        .header {
            margin-bottom: 12px;
            border-bottom: 1px solid #d1d5db;
            padding-bottom: 8px;
        }

        .title {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .meta {
            margin: 3px 0;
            color: #374151;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #d1d5db;
            padding: 6px;
            text-align: left;
        }

        thead th {
            background: #1d4ed8;
            color: #ffffff;
            font-size: 10px;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        .right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="title">Deposits Report</h1>
        <p class="meta">Search: {{ $search ?: 'N/A' }}</p>
        <p class="meta">Start Date: {{ $startDate ?: 'N/A' }}</p>
        <p class="meta">End Date: {{ $endDate ?: 'N/A' }}</p>
        <p class="meta">Generated: {{ now()->format('d-m-Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 18%;">Jina Kamili</th>
                <th style="width: 14%;">Jina Maarufu</th>
                <th style="width: 12%;" class="right">Deposit</th>
                <th style="width: 16%;">Depositor</th>
                <th style="width: 12%;" class="right">Balance</th>
                <th style="width: 23%;">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->customer->fname ?? '-' }}</td>
                    <td>{{ $payment->customer->nickname ?? '-' }}</td>
                    <td class="right">{{ number_format((float) $payment->deposit, 2, '.', ',') }}</td>
                    <td>{{ $payment->user->name ?? '-' }}</td>
                    <td class="right">{{ number_format((float) $payment->amount, 2, '.', ',') }}</td>
                    <td>{{ $payment->created_at ? $payment->created_at->format('d-m-Y H:i:s') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No deposits found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="meta" style="margin-top: 8px;">Total records: {{ $payments->count() }}</p>
</body>
</html>
