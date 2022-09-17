<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&amp;display=swap">
    <title>SnookernPool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/front/css/results/style.css') }}" >

    <script src="{{ asset('assets/front/js/results/jquery.js') }}" ></script>
    <script src="{{ asset('assets/front/js/results/moment.js') }}" ></script>

    <style>
        .navbar-brand img {
            width: 75%;
        }
        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            .navbar-brand img {
                width: 40%;
            }

            .tbl-hd-label {
                font-size: 0.8em !important;
            }
        }
    </style>
<body>


@include('includes.navbar')

<form class="sec-2-button-div">
    <div class="sec-2-button1 d-flex justify-content-center align-items-center position-relative">

        <input type="radio" name="gameType" value="POOL" @if( request()->type == '8-pool' || request()->type == null) checked @endif onclick="checkRadio('8-pool')">
        <label for="html">POOL</label><br>
    </div>
    <div class="sec-2-button2 d-flex justify-content-center align-items-center position-relative">
        <input type="radio" name="gameType" value="SNOOKER"  @if( request()->type == 'snooker' ) checked @endif onclick="checkRadio('snooker')">
        <label for="html">SNOOKER</label><br>
    </div>
</form>




<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 daterdiv" id="matchlistPdf">
    <div class="content-area-button d-flex justify-content-center align-items-center">
        <!-- <i class="fa-solid fa-angle-left"></i>  -->

        <div class="d-flex align-items-center">
            <span id="left" style="font-size:20px;cursor: pointer;" class="mx-3"><</span>
            <i id="Current_date" class="fa-solid fa-calendar-days"></i>
            <select id="select1" class="text-center" style="cursor: pointer;"></select>
            <span id="right" style="font-size:20px;cursor: pointer" class="mx-3">></span>
        </div>
        <!-- <i class="fa-solid fa-angle-right"></i> -->
    </div>
    <!-- <a class="content-area-button" href="#" style="margin-left: 2px;">Pool Standings</a> -->
</div>

<div id="app">
    <scores/>
</div>

{{--@include('pages.results._inc.table')--}}

@include('includes.footer-front')

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    // if(localStorage.getItem('baseUrl') === null) localStorage.setItem('baseUrl', window.location.href);
    var curr = moment();
    var count = 0,mid = 0;
    var request_count = "{{ request()->count ?? -100 }}";
    let startDate =  moment().subtract(6, 'days');
    let startDate2 =  startDate;
    let endDate = moment().add(6, 'days');
    let DateMap = [];
    let gameType = "{{ request()->type ?? 'snooker' }}";
    let url = window.location.href;
    function checkRadio(name){
        gameType = name;
        changeState();
    }
    function changeState(){
        var s_val;
        var selectedText = $('#select1 option:selected').text();
        var count = $('#select1 option:selected').val();
        if(selectedText == 'Today'){
            s_val = new Date().getDate();
        }
        else{
            let parsed = moment(selectedText, "DD/MM dd");
            s_val = parsed.format('D');
        }

        url = `${window.location.origin+window.location.pathname}?type=${gameType}&date=${s_val}&count=${count}`;
        window.history.pushState({ path: url }, '', url);
        window.location.reload();
    }
    $( document ).ready(function() {
        while (count < 13) {
            $('#select1').append(`<option value="${ count }">${startDate.isSame(curr)? "Today" : startDate.format('DD/MM dd')}</option>`);
            DateMap[count++] = startDate;
            startDate = startDate.add(1, 'day');
        }
        count = mid = (count-1 )/ 2;
        if(request_count == -100){
            $(`#select1 option[value=${count}]`).attr("selected",true);
        }
        else{
            $(`#select1 option[value=${request_count}]`).attr("selected",true);
        }
        $("#left").click(function() {

            $("#right").css({opacity: 1,fontSize: 20});
            var z = DateMap[--count].format('DD/MM dd');
            $("#select1").val(count);
            if(count === 0){
                $("#left").css({opacity: 0,fontSize: 0});
                return;
            }else{
                $("#left").css({opacity: 1,fontSize: 20});
            }

            changeState();

        });

        $("#right").click(function() {

            $("#left").css({opacity: 1,fontSize: 20});
            DateMap[++count].format('DD/MM dd');
            $("#select1").val(count);
            if(count === 12){
                $("#right").css({opacity: 0,fontSize: 0});
                return;
            }else{
                $("#right").css({opacity: 1,fontSize: 20});
            }

            changeState();
        });

        $('#select1').change(function() {

            changeState();

            $("#right").css({opacity: 1,fontSize: 20});
            $("#left").css({opacity: 1,fontSize: 20});
            count = parseInt($(this).val());
            getSelectedValue();
            if(count === 0) $("#left").css({opacity: 0,fontSize: 0});
            if(count === 12)$("#right").css({opacity: 0,fontSize: 0});
        });

        //function to get value of select tag
        function getSelectedValue(id) {
            return $("#" + id).find("option:selected").val();
        }
;
    });
</script>
</body>
</html>
