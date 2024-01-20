<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NNN.vn</title>
    <style>
        body {
            background-color: rgb(245, 245, 250);
            margin-top: 0px;
        }

        .order_success_confirm_header {
            display: flex;
            background-color: white;
            padding-bottom: 13px;
            padding-top: 8px;
        }

        .order_success_confirm_body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .order_success_confirm_body img {
            margin: 40px;
        }
        .order_success_confirm_body{
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="order_success_confirm_header">
        <a href="{{url('/')}}">
            <img src="{{asset('image/Logo.svg')}}" alt="Logo" />
        </a>
    </div>
    <div class="order_success_confirm_body">
        <img src="{{asset('image/icon/Close.svg')}}" alt="Success" style="width: 110px"/>
        <p>You are failed to pay. Please retry again</p>
    </div>
</body>

</html>