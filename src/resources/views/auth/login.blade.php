<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <a class="header__link" href="/register">register</a>
        </div>
    </header>
    <main>
        <form action="/login" method="post">
            @csrf
            <div class="login">
                <div class="login__inner">
                    <h2 class="login__litle">Login</h2>
                    <div class="login__content">
                        <div class="login__content--item">
                            <p class="ttl">メールアドレス</p>
                            <input type="email" name='email' placeholder="例:test@exsample.com" value="{{ old('email') }}">
                            <p class="error">
                                @error('email')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="login__content--item">
                            <p class="ttl">パスワード</p>
                            <input type="password" name='password' placeholder="例:coachtech1106">
                            <p class="error">
                                @error('password')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <button class="loguin-button">ログイン</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>