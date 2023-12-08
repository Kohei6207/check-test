<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}" />
</head>

<style>
    svg.w-5.h-5 {
        /*paginateメソッドの矢印の大きさ調整のために追加*/
        width: 30px;
        height: 30px;
    }

    .truncate-text {
        position: relative;
        display: inline-block;
    }

    .popup {
        position: absolute;
        top: -1.5em;
        /* 任意の位置に調整 */
        left: 0;
        background-color: white;
        padding: 0.5em;
        border: 1px solid #ccc;
        display: none;
        z-index: 1;
    }
</style>

<body>
    <h1>管理システム</h1>

    <!-- データ削除後に表示されるメッセージ -->
    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @else
    <div class="alert-error">
        {{ session('error') }}
    </div>
    @endif

    <!-- 検索フォームを呼び出す-->
    @include('admin.search')

    @if ($contacts->isEmpty())
    <div class="contact__alert-error">
        <p>検索キーワードに一致するデータは見つかりませんでした</p>
    </div>
    @else
    <div class="contact__page">
        <div class="contact__page-range">
            全{{ $totalContacts }}件中
        </div>
        <div class="contact__pagination">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>
    <table class="confirm-table__inner">
        <tr class="confirm-table__row">
            <th class="confirm-table__header--id">ID</th>
            <th class="confirm-table__header--name">お名前</th>
            <th class="confirm-table__header--gender">性別</th>
            <th class="confirm-table__header--email">メールアドレス</th>
            <th class="confirm-table__header--contents">ご意見</th>
        </tr>

        @foreach ($contacts as $contact)
        <tr>
            <td class="confirm-table__data-id">{{ $contact->id }}</td>
            <td class="confirm-table__data">{{ $contact->{'full-name'} }}</td>
            <td class="confirm-table__data">
                @if ($contact->gender == 1)
                男性
                @else
                女性
                @endif
            </td>
            <td class="confirm-table__data">{{ $contact->email }}</td>
            <td class="confirm-table__data">
                <span class="truncate-text" data-full-text="{{ $contact->opinion}}">
                    {{ mb_strimwidth($contact->opinion, 0, 25, '...') }}
                    <div class="popup" style="display: none;"></div>
                </span>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const truncateTexts = document.querySelectorAll('.truncate-text');

                        truncateTexts.forEach(function(truncateText) {
                            truncateText.addEventListener('mouseover', function() {
                                const fullText = this.getAttribute('data-full-text');
                                const remainingChars = fullText.length - 25; // 25は表示文字数

                                if (remainingChars > 0) {
                                    const popupElement = this.querySelector('.popup');
                                    popupElement.textContent = '残りの文字数: ' + remainingChars;
                                    popupElement.style.display = 'inline';
                                }
                            });

                            truncateText.addEventListener('mouseout', function() {
                                const popupElement = this.querySelector('.popup');
                                popupElement.style.display = 'none';
                            });
                        });
                    });
                </script>
            </td>
            <td class="button__delete">
                <form action="{{ route('contacts.delete', ['id' => $contact->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</body>

</html>