<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

</head>

<body>
    <header class="header">
        <h1 class="header__logo">お問い合わせ</h1>
    </header>

    <main>
        <div class="contact-form__content">
            <form class="form" action="{{ route('contacts.confirm') }}" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-name">
                            <input type="text" name="last-name" value="{{ old('last-name') }}" />
                            <input type="text" name="first-name" value="{{ old('first-name') }}" />
                        </div>
                        <div class="form__input-name">
                            <label for="last-name">例）山田</label>
                            <label for="first-name">例）太郎</label>
                        </div>
                        <div class="form__input-name">
                            <div class="form__error">
                                @error('last-name')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="form__error">
                                @error('first-name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <!--修正前(あとで削除する)
                        <div class="form__input--text-last-name">
                            <input type="text" name="last-name" value="{{ old('last-name') }}" />
                            <p class="form__ex-name">例）山田</p>
                        </div>
                        <div class="form__error">
                            @error('last-name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-first-name">
                            <input type="text" name="first-name" value="{{ old('first-name') }}" />
                            <p class="form__ex-name">例）太郎</p>
                        </div>
                        <div class="form__error">
                            @error('first-name')
                            {{ $message }}
                            @enderror
                        </div>
                        ここまで修正前-->
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content--radio">
                        <input class="input__radio-ale" type="radio" id="male" name="gender" value="1" checked>
                        <label class="input__radio" for="male">男性</label>

                        <input class="input__radio-female" type="radio" id="female" name="gender" value="2">
                        <label class="input__radio" for="female">女性</label>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス
                        </span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <input class="form__input--text" type="email" name="email" value="{{ old('email') }}" />
                        <p class="form__ex">例）test@example.com</p>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">郵便番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <span class="form__label--postal-symbol">〒</span>
                        <input class="form__input--text" type="text" name="postcode" value="{{ old('postcode') }}" />
                        <p class="form__ex">例）123-4567</p>
                        <div class="form__error">
                            @error('postcode')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <input class="form__input--text" type="text" name="address" value="{{ old('address') }}" />
                        <p class="form__ex">例）東京都渋谷区千代田区1-2-3</p>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <input class="form__input--text" type="text" name="building_name">
                        <p class="form__ex">例）千駄ヶ谷マンション101</p>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">ご意見</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="opinion" cols="30" rows="4"></textarea>
                        </div>
                        <div class="form__error">
                            @error('opinion')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                </div>
            </form>
        </div>

    </main>
</body>

</html>