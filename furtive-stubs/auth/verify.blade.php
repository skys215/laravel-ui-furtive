<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="main" class="grd">
        <div class="header grd-row txt--center my2">
            <div class="grd-row-col-6">
                <h1>{{ config('app.name') }}</h1>
            </div>
        </div>
        <div class="content grd-row">
            <div class="grd-row-col-2-6 center-box">
                <p>Verify</p>

                @if (session('resent'))
                    <div class="fnt--white bg--green p1 my1" role="alert">A fresh verification link has been sent to
                        your email address
                    </div>
                @endif

                <p>Before proceeding, please check your email for a verification link.If you did not receive
                            the email,
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                        click here to request another.
                    </a>
                </p>
                <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <div class="footer grd-row-col-6 txt--center">
            <p>Copyright &copy; 2022 <a href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</p>
        </div>
    </div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
