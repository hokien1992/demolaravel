<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="admin_assets/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="admin_assets/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="admin_assets/ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .bd_table .table{
            margin-top: 20px;
            border: 1px solid #ccc;
        }
        .bd_table td{border: 1px solid #ccc;}
        .bd_table th{border: 1px solid #ccc;}
        /*.bd_table_them{border: 1px solid #ccc;padding-top: 10px;}*/
        .border_{border: 1px solid #ccc;padding: 20px 10px;}
        .page-header{font-size: 16px;font-weight: bold;}
        .them{display: inline-block;}
        .img_news img{width: 100%;}
    </style>
</head>
<body>

<div id="wrapper">
	@include('admin.layout.header')
    <!-- Navigation -->
    

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- ... Your content goes here ... -->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="admin_assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin_assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin_assets/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin_assets/js/startmin.js"></script>


<!-- <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> -->
<!-- <script src="{!! asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
<script src="{!! asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') !!}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> -->
@yield('script')
</body>
</html>
