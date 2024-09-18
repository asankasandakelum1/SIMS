<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMS 1.0</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <style>
        .container{
            height: 110%;
            align-content: center;
            z-index: 1;
        }
        body {
            background-size: cover;
            background-position: center;

            background-image: url("<?php echo base_url('Assets/BACK2.jpg'); ?>");

            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            z-index: 0;

            font-family: Calibri;
        }
        .errors{
            color: #E13300;
            font-family: "Calisto MT";
            font-size: medium;
        }
        .login-form {

            max-width: 400px;
            margin: auto;
            padding: 15px;
            background-color: #dddddd;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);

        }
        .login-form h2 {
            margin-bottom: 1px;
            text-align: center;
        }
        .form-control {
            border-radius: 2px;
        }
        .btn-login {
            border-radius: 3px;
        }
        .btn-login:hover, .btn-login:focus {
            background-color: #337ab7;
            border-color: #2e6da4;
        }
    </style>

    <style>
        .navbar-default {
            font-size: 1.15em;
            font-weight: 400;
            background-color: #006b96;
            padding: 10px;
            border: 0px;
            border-radius: 0px;

        }
        .navbar-default .navbar-nav>li>a {
            color: white;
        }
        .navbar-default .navbar-brand{
            color: #ffffff;

        }
        .navbar-default .navbar-brand:hover {
            color: #ffffff;
            text-shadow: 1px -1px 8px #b3e9ff;
        }
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
            background-color: #004059;
            color: white;
        }

        .navbar-default .navbar-toggle {
            border: none;
        }

        .navbar-default .navbar-collapse, .navbar-default .navbar-form {
            border: none;
        }

        .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
            background-color: #002433;
        }

        .navbar-default .navbar-toggle .icon-bar {
            background-color: #ffffff;
        }

        .footer {
            background-color: #006b96;
            color: #dddddd;
            padding: 1px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></sty>
<script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>

            </button>
            <a class="navbar-brand" href="">SEAPORT IMMIGRATION MANAGEMENT SYSTEM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('Login');?>">Login</a></li> <!--Login View-->
                <li><a href="<?php echo base_url('Register');?>">Register</a></li> <!--Register View-->

            </ul>
        </div><!-- /.navbar -->
    </div><!-- /.container-fluid -->
</nav>
