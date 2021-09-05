<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <header>
        <section class="header-section">
            <h1>管理システム</h1>
        </section>
    </header>
    <main class="main-section">
        <section class="sarch-section">
            <form action="{{url('/search')}}" method="get">
                @csrf
                <table class="sarch-section-table">
                    <tbody>
                        <tr>
                            <th>お名前</th>
                            <td><input type="fullname" name="fullname"></td>
                            <th>性別</th>
                            <td><input type="radio" value="0" name="gender" checked id="02-D"><label for="02-D" class="radio02">全て</label></td>
                            <td><input type="radio" value="1" name="gender" id="02-E"><label for="02-E" class="radio02">男性</label></td>
                            <td><input type="radio" value="2" name="gender" id="02-F"><label for="02-F" class="radio02">女性</label></td>
                        </tr>
                        <tr>
                            <th>登録日</th>
                            <td><input type="date" name="date1"><span class="space">~</span><br><br> @error('date1')<span class="err-msg-list">{{$message}}</span>@enderror</td>
                            <td><input type="date" name="date2"><br><br>@error('date2')<span class="err-msg-list">{{$message}}</span>@enderror</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                    </tr>
                    </tbody>
                </table>

                <div class="submit-button">
                    <input name="action" type="submit" value="検索" class="submit-button-check">
                </div>
                <div class="submit-button">
                    <input name="action" type="submit" value="リセット" class="submit-button-reset">
                </div>
            </form>

        </section>
        {{ $contacts->appends(request()->query())->links() }}
        </div>
        <section class="result-section">
            <table class="result-section-table">
                <tr>
                    <th>ID</th>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>ご意見</th>
                    <th></th>
                </tr>
                @foreach($contacts as $contact)
                @csrf
                <!--ID取得!-->
                <tr>
                    <td>
                        {{ $contact->id }}
                    </td>
                    <!--お名前!-->
                    <td>
                        {{ $contact->fullname }}
                    </td>
                    <!--性別!-->
                    @if($contact->gender == "1")
                    <td> 男性</td>
                    @elseif($contact->gender == "2")
                    <td> 女性</td>
                    @endif
                    <!--メールアドレス!-->
                    <td>
                        {{ $contact->email }}
                    </td>
                    <!--ご意見!-->
                    @php
                    $text_limit = 25;
                    if (mb_strlen($contact->opinion) > $text_limit) {
                        $opinion_short = mb_substr($contact->opinion, 0, $text_limit) . '...';
                    } else {
                        $opinion_short = $contact->opinion;
                    }
                    @endphp
                    <td class="text">
                       <p class="text_overflow">{{ $contact->opinion }}</p>
                       <p class="text_short">{{ $opinion_short }}</p>
                    </td>
                    <td>
                        <form action="{{ url('admin/delete/'.$contact->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="dark">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </section>
    </main>
   
</body>

</html>