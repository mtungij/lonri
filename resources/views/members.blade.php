<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table for dompdf</title>
    <style>
        /* Basic styles for dompdf */
        body {
            font-family: Arial, sans-serif;
            color: rgba(0, 0, 0, 0.87);
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 5%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            padding: 0.5em;
            border: 1px solid rgba(134, 188, 37, 1);
            text-align: left;
        }

        th {
            background-color: rgba(38, 137, 13, 1);
            color: white;
        }

        tr:nth-of-type(even) {
            background-color: rgba(0, 0, 0, 0.12);
        }

        caption {
            margin-bottom: 1em;
            font-size: 1em;
            font-weight: bold;
            text-align: center;
        }

        tfoot {
            font-size: 0.8em;
            font-style: italic;
        }

        /* Media queries and complex CSS are omitted */
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>List Ya Wanachama</caption>
            <span>imeprintiwa na {{auth()->user()->name }}</span>
            <thead>
                <tr>
                    <th>S/no</th>
                    <th>Jina Kamili</th>
                    <th>Namba Ya simu</th>
                    <th>Jina Maarufu</th>
                    <th>Jinsia</th>
                     <th>Tarehe Ya usajili</th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 0 ?>
            @foreach($members as $member)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$member->fname}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->nickname}}</td>
                    <td>{{$member->gender}} </td>
                    <td>{{$member->created_at}}</td>
                </tr>
                @endforeach;
            </tbody>
           
        </table>
    </div>
</body>
</html>
