<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <nav class="header-nav-wrapper">
                <ul class="header-nav">
                    @if (Auth::check())
                    <li class="header-nav__item">
                        <form class="form" action="/logout" method="post">
                            @csrf
                            <button class="header-nav__button" type="submit">logout</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="admin-form__content">
            <div class="admin-form__heading">
                <h2>Admin</h2>
            </div>

            <div class="admin-content">
            <form class="search-form" action="/admin/search" method="get">
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                </div>
                <div class="search-form__item">
                    <input type="date">
                </div>



                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>
            </div>



    </main>
</body>

</html>