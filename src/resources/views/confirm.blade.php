<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/confirm.css')}}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">FashionablyLate</div>
        </div>
    </header>
    <main>
        <h2 class="confirm-title">Confirm</h2>
        <form action="/thanks" method="post">
        @csrf
            <table class="confirm-table">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__date name">
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__date">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        <p class="gender-p">
                            @if($contact['gender'] == 0)
                            男性
                            @elseif($contact['gender'] == 1)
                            女性
                            @else
                            その他
                            @endif
                        </p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__date">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__date">
                        <input type="text" name="tel" value="{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}" readonly />
                        <input type="hidden" name='tel1' value="{{ $contact['tel1'] }}">
                        <input type="hidden" name='tel2' value="{{ $contact['tel2'] }}">
                        <input type="hidden" name='tel3' value="{{ $contact['tel3'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__date">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__date">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容の種類</th>
                    <td class="confirm-table__date">
                        <input type="text" name='category_id' value="{{ $category->content }}" readonly />
                        <input type="hidden" name='category_id' value="{{ $category['id'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__date">
                        <textarea class="textarea" name="detail" readonly >{{ $contact['detail'] }}</textarea>
                    </td>
                </tr>
            </table>
            <div class="confirm-btn">
                <button type="submit" class="confirm-btn__submit">送信</button>
                <button type="submit" class="confirm-btn__back" name='back' value="back">修正</button>
            </div>
        </form>
    </main>
</body>
</html>