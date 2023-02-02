<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            width:100%;
            height:100vh;
            display: flex;
            justify-content:center;
            align-items:center;
            background: URL(images/wave1.png);
            background-repeat: no-repeat;
            background-size:cover;
        }
        .login{
            width:450px;
            height:450px;
            background-color: lightblue;
            border-radius:10px;
        }
        .login .login-con{
            /* height:100%; */
            gap:30px;
            /* border: 1px solid red; */
            margin:55px 40px;
        }
        .title{
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
            color: #1d1d1d;
            margin-top: 80px;
        }

        .login-password, .login-username{
            display:flex;
            align-items:center;
        }
        .login-username{
            margin-top: 50px;
        }
        .login-password{
            margin-top: 20px;
        }
        .ico{
            height:37px;
            width:35px;
            background-color: white;
            border-bottom-left-radius:5px;
            border-top-left-radius:5px;
            display:flex;
            justify-content:center;
            align-items:center;
            color: #999;
        }
        .login-password input, .login-username input{
            height:35px;
            width:350px;
            border:none;
            border-top-right-radius:5px;
            border-bottom-right-radius:5px;
            outline:none;
        }
        .remember{
            margin-top: 10px;
        }
        .btn-part{
            display:flex;
            justify-content:center;
        }
        .login-btn{
            width:200px;
            height:50px;
            border-radius:5px;
            background-color: cyan;
            margin-top: 30px;
        }
        .login-btn a{
            width:100%;
            height:100%;
            text-decoration:none;
            color:black;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size: 18px;
        }
        .register-section{
            margin-top: 30px;
            display:flex;
            justify-content:center;
            gap:5px;
        }

    </style>
</head>
<body>
    <div class="login">
        <form method="POST" action="{{ route('login.custom') }}">
            <div class="login-con">
                <div style="text-align:center;" class="title">Нэвтрэх</div>
                <div class="login-username">
                    <div class="ico"><i class="fa-solid fa-user"></i></div>
                    <input type="text" name="username" placeholder="Хэрэглэгчийн нэр">
                </div>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                <div class="login-password">
                    <div class="ico"><i class="fa-solid fa-lock"></i></div>
                    <input type="password" name="password" placeholder="Нууц үг">
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="btn">
                    <div class="remember">
                        <input type="checkbox">
                        <label for="checkbox">Намайг сана.</label>
                    </div>
                    @if(session('success'))
                        <span class="text-danger">{{session('success')}}</span>
                    @endif
                    <div class="btn-part">
                        <div class="login-btn">
                            <button  type="submit" style="width: 100%;height: 100%;background-color: aqua;border: none;border-radius: 15px;">Нэвтрэх</button>
                        </div>
                    </div>
                    <div class="register-section">
                        burtgelgui bol <a href="register"> burtguuleh</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>