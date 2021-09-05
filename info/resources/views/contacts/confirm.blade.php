<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <section class="header-section">
            <h1>内容確認</h1>
        </section>
    </header>
    <main class="main-section">
        <form method="post" action="{{ route('contacts.thanks') }}">
            <table class="main-section-table">
                @csrf
                <tbody>
                    <tr>
                        <th>お名前</th>
                        <td> {{ $firstname }}</td>
                        <td> {{ $lastname }}</td>
                    </tr>
                    <tr>
                        @error('firstname')
                        <th></th>
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                        @error('lastname')
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>性別</th>
                        @if($gender == "1")
                        <td> 男性</td>
                        @elseif($gender == "2")
                        <td> 女性</td>
                        @endif
                    </tr>
                    <tr>
                        @error('gender')
                        <th></th>
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td colspan="2"> {{ $email }}</td>
                    </tr>
                    <tr>
                        @error('email')
                        <th></th>
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>郵便番号</th>
                        <td colspan="2"> {{ $postcode }}</td>
                    </tr>
                    <tr>
                        @error('postcode')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td colspan="2">{{ $address }}</td>
                    </tr>
                    <tr>
                        @error('address')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td colspan="2">{{ $building_name }}</td>
                    </tr>
                    <tr>
                        @error('building_name')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>ご意見</th>
                        <td colspan="2">{{ $opinion }}</td>
                    </tr>
                    <tr>
                        @error('opinion')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>

                </tbody>
            </table>
            <input type="hidden" value="{{ $firstname }}" name="firstname">
            <input type="hidden" value="{{ $lastname }}" name="lastname">
            <input type="hidden" value="{{ $gender }}" name="gender">
            <input type="hidden" value="{{ $email }}" name="email">
            <input type="hidden" value="{{ $postcode }}" name="postcode">
            <input type="hidden" value="{{ $address }}" name="address">
            <input type="hidden" value="{{ $building_name }}" name="building_name">
            <input type="hidden" value="{{ $opinion }}" name="opinion">
            <div class="submit-button">
                <input name="action" type="submit" value="送信" class="submit-button-check">
            </div>
            <div class="submit-button">
                <input name="action" type="submit" value="修正する" class="submit-button-reset">
            </div>
        </form>
    </main>
</body>

</html>