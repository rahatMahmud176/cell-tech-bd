<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 10:56:23 GMT -->
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title> @yield('title') || Cell Tech BD </title>
<meta name="description" content="en" />
@include('font-end.includes.style')
</head>
<body>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->




@include('font-end.includes.nav')


@yield('main-content')


@include('font-end.includes.footer')


<a href="#" class="scroll-top">
<i class="lni lni-chevron-up"></i>
</a>

@include('font-end.includes.script')
</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 10:56:45 GMT -->
</html>