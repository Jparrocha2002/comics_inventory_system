<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body class="antialiased">
<section class="page-section" id="integration">
<div class="container my-5">
    <div class="text-center">
        <p id="quotes" class="display-5">Processing...</p>
        <p id="author" class="display-5" style="font-style: italic"></p>
        <p id="year" class="display-7" style="font-style: italic"></p>
        <button class="btn btn-success my-3" id="get">Get</button>
    </div>
    <hr />
    <div id="res"></div>
    <div id="output"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const apiEndpoint = 'https://api.quotable.io/quotes/random';

    window.addEventListener('load', getAxiosInspirational);

   function getAxiosInspirational() {
        axios.get(apiEndpoint)
            .then(response => {
                output(response.data);
            })
            .catch(error => {
                console.error(error);
            });
    }

    function output(data) {
        const randomIndex = Math.floor(Math.random() * data.length);
        const quote = data[randomIndex];
        document.querySelector('#quotes').innerText = `'${quote.content || 'Unknown'}'`;
        document.querySelector('#author').innerText = `'${quote.author || 'Unknown'}'`;
        document.querySelector('#year').innerText = `'${quote.tags || 'Unknown'}'`;
    }

    document.querySelector('#get').addEventListener('click', getAxiosInspirational);
</script>
  </section>
</body>
</html>
