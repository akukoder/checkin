<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'Cetakan')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style media="all">

        body {
            background-color: #333333;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 11px !important;
        }

        body #wrapper {
            background: #fff;
            margin: 15px;
            max-width: 1010px;
            padding: 15px;
        }

        .page {
            background: #fff;
            box-shadow: 0 15px 10px rgba(0, 0, 0, 0.5);
            margin: 30px auto;
            max-width: 1024px;
            padding: 30px;
        }

        td div {
            font-size: 11px !important;
        }
        td.user {
            font-size: 12px !important;
        }
        td.ppz {
            font-size: 10px !important;
        }

        #btnPrint {
            display: block;
        }

        #printDate {
            display: none;
        }
    </style>

    <style media="print">
        body {
            background-color: #fff;
        }

        .page {
            background: #fff;
            box-shadow: 0 0 0 #fff;
            margin: 0 auto;
            padding: 0;
        }

        #btnPrint {
            display: none;
        }

        #printDate {
            display: block;
        }

        .hidden-print {
            display: none;
        }
    </style>
    @yield('styles')
</head>

<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">

<div id="wrapper">
    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
<script>
    $('#btnPrint').click( function () {
        window.print()
    })
</script>
</body>
</html>
