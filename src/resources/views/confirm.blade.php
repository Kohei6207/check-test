<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ内容確認</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <h1 class="header__logo">お問い合わせ内容確認</h1>
    </header>

    <main>
        <div class="confirm__content">

            <form class="form" action="{{ route('contacts.store') }}" method="post">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <input type="text" name="full-name" value="{{ $contact ['last-name'] . ' ' . $contact ['first-name'] }}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                <input type="text" name="gender" value="{{ $contact ['gender'] == 1 ? '男性':'女性' }}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ $contact ['email']}}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">郵便番号</th>
                            <td class="confirm-table__text">
                                <input type="text" name="postcode" value="{{ $contact ['postcode']}}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ $contact ['address']}}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <input type="text" name="_name" value="{{ $contact ['building_name']}}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">ご意見</th>
                            <td class="confirm-table__text">
                                <input type="text" name="opinion" value="{{ $contact ['opinion']}}" readonly>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                </div>
                <div class="form__edit">
                    <a href="{{ route('contacts.edit') }}">修正する</a>
                </div>
            </form>
        </div>



    </main>
</body>

</html>