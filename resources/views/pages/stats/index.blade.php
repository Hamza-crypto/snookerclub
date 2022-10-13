<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&amp;display=swap">
    <title>Rankings | snookerNpool</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b479505538.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/front/css/stats/header-footer-snp.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/front/css/stats/style-snp.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/front/css/stats/other-styles-snp.css') }}" >

</head>


<body data-new-gr-c-s-check-loaded="14.1070.0" data-gr-ext-installed="" cz-shortcut-listen="true">

@include('includes.navbar')

<div class="main-content">

    <div class="form-select">
        <form>
            <!-- <label for="match-type">Total Matches Won</label> -->
            <select name="filter" id="match-type">
                @if(request()->type == 'snooker')
                    <option value="Highest-Break" @if(request()->filter == 'Highest-Break') selected @endif>Highest Break</option>
                @else
                    <option value="Average-Break-Run" @if(request()->filter == 'Average-Break-Run') selected @endif>Average Break & Run per Match</option>
                    <option value="Break-Run" @if(request()->filter == 'Break-Run') selected @endif>Break & Run</option>
                @endif
                <option value="Total-Frames-Won" @if(request()->filter == 'Total-Frames-Won') selected @endif>Total Frames Won</option>
                <option value="Total-Matches-Won" @if(request()->filter == 'Total-Matches-Won') selected @endif>Total Matches Won</option>
                <option value="Winning-Percentage" @if(request()->filter == 'Winning-Percentage') selected @endif>Winning Percentage</option>
                <option value="Winning-Streak" @if(request()->filter == 'Winning-Streak') selected @endif>Winning Streak</option>
                <option value="Total-Prize-Money" @if(request()->filter == 'Total-Prize-Money') selected @endif>Total Prize Money</option>
            </select>
            <button class="go-button" onclick="redirect()">Go</button>
        </form>
    </div>

    <section class="main-section back-to-top-wrapper">
        <!-- Table -->
        <table id="tablepress-416" class="tablepress tablepress-id-416">
            <thead>
            <tr class="row-1 odd">
                <th class="column-1" colspan="1">&nbsp;</th>
                <th class="column-2" colspan="1">Player</th>
                <th class="column-3" colspan="1">&nbsp;</th>
            </tr>
            </thead>
            <tbody class="row-hover">
            @foreach($data as $d)
                <tr class="row-2 even">
                    <th> {{ $loop->iteration }} </th>
                    <td class="column-2" data-label="&nbsp;"> {{ $d['name']  }}</td>
                    <td class="column-3" data-label="&nbsp;"> {{ $d['value']  }} </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </section>
</div>


@include('includes.footer-front')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script>
    function redirect() {

        var urlParams = new URLSearchParams(window.location.search);
        let type = urlParams.get('type');
        event.preventDefault();
        let filter = document.getElementById('match-type').value;
        url = `${window.location.pathname }?type=${type}&filter=${filter}`;
        window.history.pushState({ path: url }, '', url);
        window.location.reload();
    }

</script>

</body>


</html>
