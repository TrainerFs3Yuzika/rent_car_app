<!DOCTYPE html>
<html>
<head>
    <title>Ren Car Surabaya</title>
</head>
<body>
    <h1>Selamat datang</h1>
     <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="mr-2 fas fa-sign-out-alt"></i>
            {{ __('Log Out') }}
         </a>
</body>
</html>