<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>UAS PWE</title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<meta name="_token" content="{{csrf_token()}}" />
<!-- plugins:css -->
<link rel="stylesheet" href={{ URL::asset('/vendors/iconfonts/font-awesome/css/font-awesome.css')}}>

<link rel="stylesheet" href={{ URL::asset('/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}>
<link rel="stylesheet" href={{ URL::asset('/vendors/css/vendor.bundle.base.css') }}>
<link rel="stylesheet" href={{ URL::asset('/vendors/css/vendor.bundle.addons.css') }}>
<!-- endinject -->
<!-- plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}?v={{ filemtime('./css/app.css') }}">
<!-- endinject -->
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/icons/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/icons/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/icons/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('/icons/favicon/site.webmanifest')}}">
<link rel="mask-icon" href="{{asset('/icons/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
<link rel="shortcut icon" href="{{asset('/icons/favicon/favicon.ico')}}">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="{{asset('/icons/favicon/browserconfig.xml')}}">
<meta name="theme-color" content="#ffffff">
<script src={{ URL::asset('js/Chart.min.js') }}></script>