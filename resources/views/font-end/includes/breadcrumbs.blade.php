<div class="breadcrumbs">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-12">
    <div class="breadcrumbs-content">
    <h1 class="page-title">@yield('title')</h1>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <ul class="breadcrumb-nav">
    <li><a href="{{ route('/') }}"><i class="lni lni-home"></i> Home</a></li>
    <li>@yield('title')</li>
    </ul>
    </div>
    </div>
    </div>
    </div>