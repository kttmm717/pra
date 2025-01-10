<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <div class="header__logo">FashionablyLate</div>
            <form action="/logout" method='post'>
                @csrf
                <button class="header-btn">logout</button>
            </form>
        </div>
    </header>

    <main>
        <div class="admin-search">
            <h2 class="admin-search__title">Admin</h2>
            <form action="/find" method="get">
                <div class="admin-search__nav">
                    @csrf
                    <input class="admin-search__nav--item input" name='keyword' type="text" placeholder="名前やメールアドレスを入力してください">
                    <select class="admin-search__nav--item select" name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        @foreach(App\Models\Contact::gender_options as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <select class="admin-search__nav--item select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input class="admin-search__nav--item date" type="date" name='date' placeholder="年/月/日">
                    <button class="admin-search__nav--search">検索</button>
                    <a href="/admin" class="admin-search__nav--reset">リセット</a>
                </div>
            </form>

            <div class="middle-row">
                <form class="export-btn" action="/export" method="get">
                    <input type="hidden" name='keyword' value="{{ request('keyword') }}">
                    <input type="hidden" name='gender' value="{{ request('gender') }}">
                    <input type="hidden" name='category_id' value="{{ request('category_id') }}">
                    <input type="hidden" name='date' value="{{ request('date') }}">
                    <button>エクスポート</button>
                </form>
                <div class="paginate">
                    {{ $contacts->appends(request()->query())->links('pagination::user') }}
                </div>
            </div>

            <table class="admin-table">
                <tr class="admin-table__header">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach($contacts as $index => $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__row name">{{ $contact['first_name'] }}  {{ $contact['last_name'] }}</td>
                    <td class="admin-table__row gender">
                        @if($contact['gender'] == 0)
                        男性
                        @elseif($contact['gender'] == 1)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                    <td class="admin-table__row mail">{{ $contact['email'] }}</td>
                    <td class="admin-table__row content">{{ $contact['category']['content'] }}</td>
                    <td class="admin-table__row modal-row">
                        <button class="open" data-modal="modal-{{ $index }}">詳細</button>
                        <div id="modal-{{ $index }}" class="modal">
                            <div class="close">
                                <span>×</span>
                            </div>
                            <div class="modal__inner">
                                <table class="modal-table">
                                    <tr class="modal-table__row">
                                        <th>お名前</th>
                                        <td class="modal-table__date">{{ $contact['first_name'] }}  {{ $contact['last_name'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>性別</th>
                                        <td class="modal-table__date">
                                        @if($contact['gender'] == 0)
                                            男性
                                            @elseif($contact['gender'] == 1)
                                            女性
                                            @else
                                            その他
                                        @endif
                                        </td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>メールアドレス</th>
                                        <td class="modal-table__date">{{ $contact['email'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>電話番号</th>
                                        <td class="modal-table__date">{{ $contact['tel'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>住所</th>
                                        <td class="modal-table__date">{{ $contact['address'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>建物名</th>
                                        <td class="modal-table__date">{{ $contact['building'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>お問い合わせの種類</th>
                                        <td class="modal-table__date">{{ $contact['category']['content'] }}</td>
                                    </tr>
                                    <tr class="modal-table__row">
                                        <th>お問い合わせ内容</th>
                                        <td class="modal-table__date">{{ $contact['detail'] }}</td>
                                    </tr>                    
                                </table>
                                <form class="delete-form" action="/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name='id' value="{{ $contact['id'] }}">
                                    <button>削除</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            
            
            
        </div>
    </main>
    <script src="{{ asset('js/modal.js') }}"></script>
</body>
</html>