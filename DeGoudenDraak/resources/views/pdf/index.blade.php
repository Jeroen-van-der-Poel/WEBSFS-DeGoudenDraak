<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerechten Lijst</title>
</head>
<body>
    <table class="blueTable">
        <thead>
        <tr>
            <th>Menunummer</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
        </tr>
        </thead>

        <tbody>
        @foreach($dishes as $dish)
            <tr>
                <td style="text-align: center">{{$dish->menu_number}}{{$dish->menu_addition}}</td>
                <td style="text-align: center">{!!$dish->name!!}</td>
                <td style="text-align: center">{!!$dish->description!!}</td>
                <td style="text-align: center">€ {{$dish->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>

<style type="text/css">
    .blueTable{
        width:100%;
        border-collapse:collapse;
    }
    .blueTable td{
        padding:7px; border:#4e95f4 1px solid;
    }
    /* provide some minimal visual accomodation for IE8 and below */
    .blueTable tr{
        background: #b8d1f3;
    }
    /*  Define the background color for all the ODD background rows  */
    .blueTable tr:nth-child(odd){
        background: #b8d1f3;
    }
    /*  Define the background color for all the EVEN background rows  */
    .blueTable tr:nth-child(even){
        background: #dae5f4;
    }
</style>




