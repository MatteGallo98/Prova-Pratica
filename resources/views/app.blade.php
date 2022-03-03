<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="{{ mix('/css/style.css') }}" rel="stylesheet" />
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
  </head>
  <body>
    @inertia
    @auth
     <form method="post" action="{{route('logout')}}" style="display:none!important" id="logout">      
        @csrf
    </form>
    @endauth
  </body>
</html>
