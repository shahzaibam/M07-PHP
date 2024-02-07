<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Racers</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/home/styles.css') }}" rel="stylesheet">
</head>
<body>

@include('layout.navigation')

<div id="homeBody">

    <h1 id="title" class="text-white" >
    </h1>

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
