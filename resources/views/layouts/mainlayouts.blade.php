<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="main d-flex flex-column justify-content-between">
      <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">MFP test</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    
      <div class="body-content h-100">
        <div class="row g-0 h-100">
          <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">
            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif >Dashboard</a>
            <a href="/dictionary" @if (request()->route()->uri == 'dictionary') class="active" @endif >Dictionary</a>
            <a href="/history" @if (request()->route()->uri == 'history') class="active" @endif >History</a>
            <a href="/logout">Log out</a>
          </div>

          <div class="content p-4 col-lg-10">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
