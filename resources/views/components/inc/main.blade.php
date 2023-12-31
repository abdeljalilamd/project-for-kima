<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Community Page</title>
</head>

<body>

<x-inc.navbar />

{{ $slot }}


<div class="bg-light mt-5">
  <div class="container" bis_skin_checked="1">
       <x-inc.footer />
    </div>
  </div>


</body>

</html>