<?php

if(!($this->session->userdata('loggedin'))){
    redirect('Home/Login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> SIMS 1.0</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>



    <style>
        .container{
            height: 100%;
            align-content: ;
        }
        body {
            background-color: #ffffff;
            font-family: Calibri;


        }
        .errors{
            color: #E13300;
            font-family: "Calisto MT";
            font-size: medium;
        }

        .footer {
            background-color: #006b96;
            color: #dddddd;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .clearance-form{

            max-width: 50%;
            margin: 0 auto;
            padding: 15px;
            background-color: #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);

        }
        .clearance-form h2 {
            margin-bottom: 25px;
            text-align: center;
        }

        .crew-form{

            max-width: 100%;
            margin: 0 auto;
            padding: 15px;
            background-color: #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);

        }
        .crew-form h2 {
            margin-bottom: 25px;
            text-align: center;
        }

        .voyage-form{

            max-width: 900px;
            margin: 0 auto;
            padding: 15px;
            background-color: #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);

        }
        .voyage-form h2 {
            margin-bottom: 25px;
            text-align: center;
        }

        .login-form {

            max-width: 400px;
            margin: 0 auto;
            padding: 15px;
            background-color: #dddddd;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);

        }
        .login-form h2 {
            margin-bottom: 25px;
            text-align: center;
        }

        .form-control {
            border-radius: 3px;
        }


        .btn-login {
            border-radius: 3px;
        }
        .btn-login:hover, .btn-login:focus {
            background-color: #337ab7;
            border-color: #2e6da4;
        }

        .navbar-default {
            font-size: 1.15em;
            font-weight: 200;
            background-color: #006b96;
            padding: 10px;
            border: 0px;
            margin: 0;

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

        .dropdown-menu {
            background-color: #004059;
            color: white;
            border: 0px;
            border-radius: 2px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .dropdown-menu>li>a {
            background-color: #004059;
            color: white;
        }

        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            background-color: #004059;
            color:white;
        }

        .dropdown-menu .divider {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: #003246;
        }

        .navbar-default .navbar-nav .open .dropdown-menu>li>a {
            color: #ffffff;
        }

    </style>

    <style>


        .sidebar {
            background-color: rgba(57, 74, 91, 0.78);
            padding: 20px;
            border-right: 1px solid #dee2e6;
            font-size: 15px;
            height: 100vh;
            position: sticky;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }


        .profile h4 {
            margin: 0;
            font-size: 22px;
            color: #ffffff;
            font-style: oblique;
        }

        .profile p {
            margin: 0;
            font-size: 16px;
            color: #dac796;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .sidebar ul li:last-child {
            border-bottom: none;
        }

        .sidebar ul li a {
            color: #f3eaea;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            color: #3f3d3a;
        }

        .btn-sidebar {
            width: 100%;
            text-align: left;
            padding: 10px 15px;
            border-radius: 0;
            border: none;
            background-color: transparent;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-sidebar:hover {
            background-color: #e7ebef;
            color: #fff;

        }

        .btn-sidebar.active {
            background-color: rgba(151, 159, 151, 0.6);
            color: #fff;
        }
    </style>


    <style>

        .table-responsive th {
            white-space: nowrap;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }


    </style>


    <style>
        .voyagetable-responsive th {
            white-space: nowrap;
            text-align: center;
        }

        .voyagetable {
            font-size: smaller;
            width: 100%;
            border-collapse: collapse;
        }

        .voyagetable, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Customize the width of each column */
        th:nth-child(1), td:nth-child(1) {
            width: 10%; /* Adjust width for the first column */
        }

        th:nth-child(2), td:nth-child(2) {
            width: 15%; /* Adjust width for the second column */
        }

        th:nth-child(3), td:nth-child(3) {
            width: 15%; /* Adjust width for the third column */
        }

        th:nth-child(4), td:nth-child(4) {
            width: 10%; /* Adjust width for the fourth column */
        }

        th:nth-child(5), td:nth-child(5) {
            width: 10%; /* Adjust width for the fifth column */
        }

        th:nth-child(6), td:nth-child(6) {
            width: 5%; /* Adjust width for the sixth column */
        }

        th:nth-child(7), td:nth-child(7) {
            width: 10%; /* Adjust width for the seventh column */
        }

        th:nth-child(8), td:nth-child(8) {
            width: 10%; /* Adjust width for the eighth column */
        }

        th:nth-child(9), td:nth-child(9) {
            width: 10%; /* Adjust width for the ninth column */
        }

        th:nth-child(10), td:nth-child(10) {
            width: 5%; /* Adjust width for the tenth column */
        }
    </style>
    <style>

        .button-container {
            text-align: center;
        }


        .image-button {
            display: inline-block;
            margin: 10px;
            border: #337ab7;
            border-radius: 10px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;

        }

        .button-text {
            display: block;
            margin-top: 5px;
            text-align: center;
            color: #002433;
        }

        .image-button:hover {
            transform: translateY(-3px);
        }


        .image-button img {
            width: 300px;
            height: 200px;
            border-radius: 10px;
        }
    </style>

    <style>

        .approvedclearancetable-responsive th {
            white-space: nowrap;
            text-align: center;
        }

        approvedclearancetable-responsive {
            font-size: smaller;
            width: 100%;
            border-collapse: collapse;
        }

        approvedclearancetable-responsive, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Customize the width of each column */
        th:nth-child(1), td:nth-child(1) {
            width: 5%; /* Adjust width for the first column */
        }

        th:nth-child(2), td:nth-child(2) {
            width: 5%; /* Adjust width for the second column */
        }

        th:nth-child(3), td:nth-child(3) {
            width: 15%; /* Adjust width for the third column */
        }

        th:nth-child(4), td:nth-child(4) {
            width: 10%; /* Adjust width for the third column */
        }

        th:nth-child(5), td:nth-child(5) {
            width: 10%; /* Adjust width for the third column */
        }

        th:nth-child(6), td:nth-child(6) {
            width: 7%; /* Adjust width for the third column */
        }

        th:nth-child(7), td:nth-child(7) {
            width: 10%; /* Adjust width for the third column */
        }

        th:nth-child(8), td:nth-child(8) {
            width: 5%; /* Adjust width for the third column */
        }


        th:nth-child(9), td:nth-child(9) {
            width: 10%; /* Adjust width for the third column */
        }


    </style>


</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
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
                <li><a href="<?php echo base_url('index.php/login/logoutUser'); ?>">Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
