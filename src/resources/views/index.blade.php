<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">FashionablyLate</div>
        </div>
    </header>
    <main>
        <h2 class="contact-title">Contact</h2>
        <form class="contact-form" action="/confirm" method="POST">
            @csrf
            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>お名前</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text name">
                    <div class="contact-form__item--input firstname-input">
                        <input type="text" name='first_name' placeholder="例:山田" value="{{ old('first_name') }}">
                        <div class="error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>                 
                    <div class="contact-form__item--input lastname-input">
                        <input type="text" name='last_name' placeholder="例:太郎" value="{{ old('last_name') }}">
                        <div class="error">
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>              
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>性別</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text gender">
                    <div class="contact-form__item--input gender-type">
                        <input name='gender' type="radio" value="0" {{ old('gender') == 0 ? 'checked' : '' }}>
                        男性
                    </div>
                    <div class="contact-form__item--input gender-type">
                        <input name='gender' type="radio" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                        女性
                    </div>
                    <div class="contact-form__item--input gender-type">
                        <input class="other-input" name='gender' type="radio" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                        その他
                    </div>
                    <div class="error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>メールアドレス</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text email">
                    <input type="email" name='email' placeholder="例:test@example.com" value="{{ old('email') }}">
                    <div class="error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>電話番号</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text tel">
                    <div class="tel-each first">
                        <input type="text" name='tel1' placeholder="080" value="{{ old('tel1') }}"><span class="span-left">-</span>
                        <div class="error">
                            @error('tel1')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="tel-each second">
                        <input type="text" name='tel2' placeholder="1234" value="{{ old('tel2') }}">
                    </div>
                    <div class="tel-each third">
                    <span class="span-righr">-</span><input type="text" name='tel3' placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>住所</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text address">
                    <input type="text" name='address' placeholder="例:東京都渋谷区世田谷1-2-3" value="{{ old('address') }}">
                    <div class="error">
                        @error('address')
                            {{ $message }}
                            @enderror
                    </div>
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>建物名</span>
                </div>
                <div class="contact-form__item--text buiding">
                    <input type="text" name='building' placeholder="例:世田谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>お問い合わせの種類</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text content-category">
                    <select name="category_id">
                        <option>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{$category->content}}
                        </option>
                        @endforeach
                    </select>
                    <div class="error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact-form__item">
                <div class="contact-form__item--lavel">
                    <span>お問い合わせ内容</span>
                    <span class="required">※</span>
                </div>
                <div class="contact-form__item--text content">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
                    <div class="error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="contact-form__button">
                <button>確認画面</button>
            </div>
        </form>
    </main>
</body>
</html>