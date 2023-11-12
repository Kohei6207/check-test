<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>管理システム</h1>

    @if ($contacts->isEmpty())
    <div class="contact__alert-error">
        <p>検索キーワードに一致するデータは見つかりませんでした</p>
    </div>
    @else
    <div class="contact__page">
        <div class="contact__page-range">
            全{{ $contacts->toral() }}件中
            {{ $contacts->firstItem() }}〜{{ $contacts->lastItem() }}件
        </div>
    </div>
    <div class="contact__table">
        <table class="contact__container">
            <tr>
                <th class="contact__table-id">ID</th>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>ご意見</th>
            </tr>
            @foreach ($contacts as $contact)
            <tr>
                <td class="contact__table-id">{{ $contact->id }}</td>
                <td class="contact__table-name">{{ $contact->full-name}}</td>
                @if ($contact->gender === 1)
                <td>男性</td>
                @else
                <td>女性</td>
                @endif
                <td class="contact__table-email">{{ $contact->email }}</td>
                <td class="contact__table-content">{{ $contact->content }}</td>
            </tr>
        @endforeach
        </table>
    </div>
    @endif
</body>

</html>