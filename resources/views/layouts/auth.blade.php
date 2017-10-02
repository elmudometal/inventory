<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="hold-transition login-page">
@yield('content')

@include('layouts.partials.footer')


@section('scripts')
@include('layouts.partials.scripts')
@show

</body>
<style>
    .main-footer{
        margin-left: 0;
    }
</style>
</html>