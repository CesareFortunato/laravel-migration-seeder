<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Tabellone Treni</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font stazione -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        body {
            background: #111;
            color: #0f0;
            font-family: 'Share Tech Mono', monospace;
        }

        .board {
            margin-top: 40px;
        }

        .train-table {
            background: #000;
            color: #0f0;
            border: 2px solid #0f0;
        }

        .train-table th {
            background: #0f0;
            color: #000;
            text-transform: uppercase;
        }

        .late {
            color: #ff3b3b;
            font-weight: bold;
        }

        .ok {
            color: #0f0;
        }

        .cancelled {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container board">

        <h1 class="text-center mb-4">DEPARTURES / PARTENZE</h1>

        <table class="table train-table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>Azienda</th>
                    <th>Partenza</th>
                    <th>Arrivo</th>
                    <th>Orario</th>
                    <th>Binario</th>
                    <th>Stato</th>
                    <th>Ritardo</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->azienda }}</td>

                        <td>{{ $train->stazione_partenza }}</td>

                        <td>{{ $train->stazione_arrivo }}</td>

                        <td>{{ \Carbon\Carbon::parse($train->orario_partenza)->format('H:i') }}</td>

                        <td>{{ $train->binario ?? '-' }}</td>

                        <td>
                            @if($train->cancellato)
                                <span class="cancelled">CANCELLATO</span>
                            @elseif($train->in_orario)
                                <span class="ok">IN ORARIO</span>
                            @else
                                <span class="late">IN RITARDO</span>
                            @endif
                        </td>

                        <td>
                            @if($train->ritardo > 0)
                                <span class="late">+{{ $train->ritardo }} min</span>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>