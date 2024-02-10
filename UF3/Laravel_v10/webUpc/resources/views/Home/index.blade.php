<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Racers</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-4.0.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div>

    <div class="body">
        @include('layout.navigation')


        <div>
            <div id="homeBody">

                {{--        <div id="video-container" class="container ">--}}
                {{--            <div class="embed-responsive embed-responsive-16by9">--}}
                {{--                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BxlMtTh48zw" title="YouTube video" allowfullscreen></iframe>--}}
                {{--            </div>--}}
                {{--        </div>--}}


                <h1 id="title" class="text-white">
                </h1>


            </div>
        </div>


    </div>


    <h2>hshshs</h2>

</div>


<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const title = "Racing, the never Ending...";
        let currentTitle = '';
        let index = 0;
        const intervalId = setInterval(() => {
            currentTitle += title[index];
            document.getElementById('title').textContent = currentTitle;
            index++;
            if (index === title.length) {
                clearInterval(intervalId);
            }
        }, 100);
    });
</script>

</body>
</html>
