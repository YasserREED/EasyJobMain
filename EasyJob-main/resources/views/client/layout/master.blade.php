@include('client.layout.header')

@include('client.layout.navbar')

@yield('content')


@include('sweetalert::alert')

@include('client.layout.footer')
