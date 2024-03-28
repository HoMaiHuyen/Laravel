
<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title') - Unicode</title>
        @yield('css')
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
    </head>

    <body>
        @include('clients.blocks.header')
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <aside>
                            @section('sidebar')
                                @include('clients.blocks.sidebar')
                            @show
                        </aside>
                    </div>
                    <div class="col-9">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('clients.blocks.footer')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous">
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous">
        </script>
        @yield('js')
        @stack('scripts')
    </body>
</html>
