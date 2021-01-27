@extends('backend.base')
@section('base.content')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('backend.partials.header')
            @include('backend.partials.sidebar')
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('backend.partials.footer')
        </div>
    </div>
@endsection
