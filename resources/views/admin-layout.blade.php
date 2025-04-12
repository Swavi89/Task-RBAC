<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{asset ('public/assets/css/style.css')}}" />
  <title>@yield('title') | Dashboard</title>
  <script src="{{asset('public/assets/js/script.js')}}"></script>
</head>

<body>
@include('elements.navbar')
    <section class="flex items-center w-full">
        @include('elements.sidebar')
        <div id="dashboard-content" class="xl:w-[calc(100%-250px)] w-full ml-auto bg-[#f6f9fb]">
            @yield('content')
        </div>
    </section>
</body>