<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<style>
    body {
        background-image: url(http://mymap.mn/images/certificate.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        font-family: DejaVu Sans
    }

    *{
        padding: 0px;
        margin: 0px;
    }
    .cert-no{
        position: absolute;
        top: 328px;
        left:565px;
        font-weight: 700;
    }

    .license-duration{
        position: absolute;
        top: 671px;
        left:250px;
        font-size: 13px;
    }
    .year{
        position: absolute;
        top: 674px;
        left:475px;
        font-size: 13px;
    }
    .month{
        position: absolute;
        top: 674px;
        left:520px;
        font-size: 13px;
    }
    .day{
        position: absolute;
        top: 674px;
        left:600px;
        font-size: 13px;
    }
    .lastname{
        position: absolute;
        top: 401px;
        left:350px;
    }
    .firstname{
        position: absolute;
        top: 401px;
        left:620px;
    }

    .qrcode{
        width: 80px;
        height: 80px;
        position: absolute;
        top: 600px;
        left:910px;
    }
</style>
<body>
    <h4  class="cert-no"><b>{{ $certificate_no }}</b></h4>
    <label class="lastname">{{ $lastname }}</label>
    <label class="firstname">{{ $firstname }}</label>
    <b><label class="license-duration">3</label></b>
    <label class="year">23</label>
    <label class="month">12</label>
    <label class="day">31</label>
    <img src="{{ $image_url }}" class="qrcode" alt="">
</body>
</html>