<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Contact Form
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>お問い合わせ内容確認</h2>
            </div>
            <form class="form" action="/contacts" method="post">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['last_name'] }}</span>
                                <span>{{ $contact['first_name'] }}</span>
                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if ($contact['gender'] === '1')男性
                                @elseif ($contact['gender'] === '2')
                                女性
                                @else
                                その他
                                @endif

                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['email'] }}</span>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['tel1'] }}</span>
                                <span>{{ $contact['tel2'] }}</span>
                                <span>{{ $contact['tel3'] }}</span>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['address'] }}</span>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['building'] }}</span>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                <span>{{ $category_name }}</span>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <span>{{ $contact['detail'] }}</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                </div>
                <div class="form__button">
                    <form action="/contacts/confirm" method="post"></form>
                    @csrf
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                    <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                    <button class="form__button-submit" type="submit" name='back' value='back'>修正</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>