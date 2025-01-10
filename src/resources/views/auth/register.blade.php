<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <a class="header__link" href="/login">login</a>
        </div>
    </header>
    <main>
        <form action="/register" method="post">
            @csrf
            <div class="register">
                <div class="register__inner">
                    <h2 class="register__litle">register</h2>
                    <div class="register__content">
                        <div class="register__content--item">
                            <p class="ttl">お名前</p>
                            <input type="text" name='name' placeholder="例:山田　太郎" value="{{ old('name') }}">
                            <p class="error">
                                @error('name')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="register__content--item">
                            <p class="ttl">メールアドレス</p>
                            <input type="email" name='email' placeholder="例:test@exsample.com" value="{{ old('email') }}">
                            <p class="error">
                                @error('email')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="register__content--item">
                            <p class="ttl">パスワード</p>
                            <input type="password" name='password' placeholder="例:coachtech1106">
                            <p class="error">
                                @error('password')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <button class="register-button">登録</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>