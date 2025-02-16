<!DOCTYPE html>
<html lang="en">
<head>
    <title>Personal Website - Krishnan - {{ $title }}
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="{{ $title }}">
    <meta name="keywords" content="">

    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('static/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('static/images/favicon/favicon-16x16.png') }}">


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous">
    </script>
    <!-- <script src="/static/js/lib/vue.min.js">
    </script>
    <script src="/static/js/lib/axios.min.js">
    </script>
    <script src="/static/js/lib/lodash.min.js">
    </script>
    <script src="/static/js/lib/sweetalert2.all.min.js"> -->
    <script src="{{ asset('static/js/lib/vue.min.js') }}"></script>
    <script src="{{ asset('static/js/lib/axios.min.js') }}"></script>
    <script src="{{ asset('static/js/lib/lodash.min.js') }}"></script>
    <script src="{{ asset('static/js/lib/sweetalert2.all.min.js') }}"></script>

    </script>
    <style type="text/css">.responsive {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <br>
<!-- <p align="center"><img src="/static/images/krish_header.png" alt="header image" class="responsive"></p> -->
<h1 align="center">Blog</h1>
<hr>
<div class="container">
