<div class="form-container">
    <form class="form" method="GET">
        @csrf
        <!-- 入力欄(名前)ラジオボタン(性別) -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-area">
                    <input type="text" name="full-name" value="{{ old('full-name') }}" />
                </div>
            </div>

            <div class="form__group-title">
                <span class="form__label-item">性別</span>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="all" name="gender" value="all" {{ old('gender') == 'all' ? 'checked' : '' }} />
                <label for="male">全て</label>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="male" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} />
                <label for="male">男性</label>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="female" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} />
                <label for="female">女性</label>
            </div>

        </div>

        <!--修正前
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">性別</span>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="all" name="gender" value="all" {{ old('gender') == 'all' ? 'checked' : '' }} />
                <label for="male">全て</label>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="male" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} />
                <label for="male">男性</label>
            </div>
            <div class="form__input-radio">
                <input type="radio" class="form__input-radio-item" id="female" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} />
                <label for="female">女性</label>
            </div>
        </div> -->


        <!-- 入力(登録日) -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">登録日</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-date">
                    <input type="date" name="first_date" value="{{ old('first_date') }}" />
                    <span>~</span>
                    <input type="date" name="last_date" value="{{ old('last_date') }}" />
                </div>
            </div>
        </div>
        <!-- 入力(メールアドレス) -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input type="text" name="email" value="{{ old('email') }}" />
                </div>
            </div>
        </div>
        <!-- 検索ボタンとリセットリンク) -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">検索</button>
            <a href=" {{ route('contacts.stock') }} ">リセット</a>
        </div>
    </form>
</div>