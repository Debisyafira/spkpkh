<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- Tell the browser to be responsive to screen width --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Favicon icon --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">
   
    {{-- Custom CSS --}}
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    @include('layouts.include.preloader')
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('layouts.include.header')
        @include('layouts.include.sidebar')

        <div class="page-wrapper">
            @yield('content')

        
            {{-- footer --}}
            {{-- ============================================================== --}}
            {{-- <footer class="footer text-center text-muted">
                All Rights Reserved by SPK PKH. Designed and Developed by <a
                    href="https://adminmart.com/">Adminmart</a>.
            </footer> --}}
            {{-- ============================================================== --}}
            {{-- End footer --}}
            {{-- ============================================================== --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{-- apps --}}
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    {{-- Custom JavaScript --}}
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    {{-- This page JavaScript --}}
    <script>
        $(function(e) {

            $("#select_all_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord').click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });


                $.ajax({
                    url: "{{ route('admin.pkh.delete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#ratio_ids' + val).remove();
                        })

                        setInterval('location.reload()', 2000);

                    }
                });
            });
        });
    </script>

    {{-- Custom scripts for all pages --}}
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{!! Session::get('message') !!}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    
    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{!! Session::get('success') !!}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{!! Session::get('error') !!}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    {{-- if with('pesan', 'Isi pesan') --}}
    @if (session()->has('pesan'))
        <script>
            Swal.fire({
                position: "top-end",
                title: "{{ session('pesan') }}",
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @yield('js')
</body>

</html>
