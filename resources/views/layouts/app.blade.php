<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('styles')
        <title>Todo list</title>
    </head>
    @if(session()->has('success'))
        <div> {{session('success')}} </div>
    @endif
    <h1>@yield('title')</h1>
    <div>@yield('content')</div>
</html>
