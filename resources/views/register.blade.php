@extends('master')
@section('content')
<style>
.card{
    border-radius: 5px;
-webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
border: none;
margin-bottom: 30px;
}
    </style>
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Register Form</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Authentication</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row card">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class="signin-container">
                            <form action="{{ url('register') }}" method="post">
                                @csrf

                            <div class="card-block">
                                @if(session('success') !== null)
                                <div class="succWrap">
                                    {{ session('success') }}
                                </div>
                                <!-- <div class='alert alert-success'>
                                {{ session('success') }}
                            </div> -->
                                @endif

                                @if(session('errors') !== null)

                                @foreach(session('errors') as $v)
                                @foreach($v as $e)

                                <div class="alert alert-danger"><strong>ERROR</strong>: {{ $e }} </div>


                                @endforeach

                                @endforeach
                                @endif


                                @if(session('error') !== null)
                                <div class="alert alert-danger"><strong>ERROR</strong>: {{session('error') }} </div>

                                @endif

                                @if(session('message') !== null)
                                <div class="errorWrap"><strong>ERROR</strong>: {{session('message') }} </div>

                                @endif
                                <p class="form-row">
                                    <label for="fid-name">Name:<span class="requite">*</span></label>
                                    <input type="text" id="name" name="name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">E-Mail:<span class="requite">*</span></label>
                                    <input type="email" id="email" name="email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password<span class="requite">*</span></label>
                                    <input type="password" id="password" name="password" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Confirm Password:<span class="requite">*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit">Register</button>
                                    {{-- <a href="#" class="link-to-help">Forgot your password</a> --}}
                                    {{-- <a href="#" class="btn btn-bold col-md-offset-5">Create an account</a> --}}
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="#" class="btn btn-bold">Create an account</a>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>

        </div>

    </div>


@endsection
