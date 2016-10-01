<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <input type="hidden" value="{{ URL('/') }}" id="base_path">
        <div class="container">
            <div class="content">
                <div class="title">Welcome {{ $QQQ }}  {{ $EEE }}</div>
                @for($i=0;$i<10;$i++)
                    <div><?php echo $keys["n_".$i]; ?></div>
                @endfor
                <div id="data"></div>
            </div>
        </div>
    </body>

    <script>
        $('document').ready(function(e){
            dataString = "id=1";
            url = $("#base_path").val()+"/getData";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url,
                data: dataString,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                success: function (data) {
                    console.log(data);
                    $("#data").html(data['user']['address']);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
</html>
