<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Simpan Lagu</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/table.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/sidebars.css" rel="stylesheet">
    {{-- <link href="/css/sticky-footer.css" rel="stylesheet"> --}}
    <script src="https://unpkg.com/feather-icons"></script>
    

    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  </head>
<body>
    


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2">
          @include('mainpage.layouts.sidebar')
        </div>
        <div class="col-md-10">
          <main class="ms-sm-4 col-lg-11">
            @yield('container')
          </main>
          @include('mainpage.layouts.footer')
        </div>
      </div>
    </div>
  </div>
</div>




<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/feather.min.js"></script>
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>
<script>
  feather.replace()
</script>

</body>
</html>