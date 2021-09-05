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
            <h1>お問い合わせ</h1>
        </section>
    </header>
    <main class="main-section">
        <form method="post" action="{{ route('contacts.confirm') }}" class="h-adr">
            <span class="p-country-name" style="display:none;">Japan</span>
            @csrf
            @if (count($errors) > 0)
            <div class="err-msg">
                <p class="err-msg-word">入力に問題があります</p>
            </div>
            @endif
            <table class="main-section-table">
                <tbody>
                    <tr>
                        <th>お名前<span class="require-lavel">※</span></th>
                        <td><input type="text" value="{{ old('firstname') }}" name="firstname" id="firstname"><br><br><span id="err-firstname1">必須入力です。</span><span id="err-firstname1">125文字以内で入力してください</span>@error('firstname')<span class="err-msg-list">{{$message}}</span>@enderror</td>
                        <td><input type="text" value="{{ old('lastname') }}" name="lastname" id="lastname"><br><br><span id="err-lastname1">必須入力です。</span><span id="err-lastname2">125文字以内で入力してください</span>@error('lastname')<span class="err-msg-list">{{$message}}</span>@enderror</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="lavel-color">例）山田</td>
                        <td class="lavel-color">例）太郎</td>
                    </tr>
                    <tr>


                    <tr>
                        <th>性別<span class="require-lavel">※</span></th>
                        <td><input type="radio" id="02-E" class="gender" name="gender" checked value="1" {{ old('gender') == '1' ? 'checked' : '' }}><label for="02-E" class="radio02">男性</label></td>
                        <td><input type="radio" id="02-F" class="gender" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}><label for="02-F" class="radio02">女性</label><br><span id="err-gender">必須入力です。</span></td>
                    </tr>
                    <tr>
                        @error('gender')
                        <th></th>
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <th>メールアドレス<span class="require-lavel">※</span></th>
                        <td colspan="2"><input type="text" class="input-size" value="{{ old('email') }}" name="email" id="email"><br><br><span id="err-email1">必須入力です。</span><span id="err-email2">正しい形式で入力してください。</span></td>
                    </tr>
                    <tr>
                        @error('email')
                        <th></th>
                        <td class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="lavel-color">例）test@example.com</td>
                    </tr>

                    <tr>
                        <th>郵便番号<span class="require-lavel">※</span></th>
                        <td colspan="2">〒<input type="text" class="p-postal-code input-size-middle " id="post" name="postcode" value="{{ old('postcode') }}"><br><br><span id="err-postcode1">必須入力です。</span><span id="err-postcode2">(半角数字3桁)-(半角ハイフン)(半角数字4桁)で入力してください。</span><span id="err-postcode3">8桁で入力してください。</span></td>
                    </tr>
                    <tr>
                        @error('postcode')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="lavel-color">例）123-4567</td>
                    </tr>
                    <tr>
                        <th>住所<span class="require-lavel">※</span></th>
                        <td colspan="2"> <input type="text" class="p-region p-locality p-street-address p-extended-address input-size " name="address" value="{{ old('address') }}" id="address"><br><br><span id="err-address1">必須入力です。</span><span id="err-address2">255文字以内で入力してください。</span></td>
                    </tr>
                    <tr>
                        @error('address')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="lavel-color">例）東京都渋谷区千駄ヶ谷1-2-3</td>
                    </tr>

                    <tr>
                        <th>建物名</th>
                        <td colspan="2"><input type="text" name="building_name" class="input-size" value="{{ old('building_name') }}" id="building_name"><br><br><span id="err-building_name">255文字以内で入力してください。</span></td>
                    </tr>
                    <tr>
                        @error('building_name')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="lavel-color">例）千駄ヶ谷マンション101</td>
                    </tr>

                    <tr>
                        <th>ご意見<span class="require-lavel">※</span></th>
                        <td colspan="2"><textarea type="text" name="opinion" rows="10" class="input-size" id="opinion">{{ old('opinion') }}</textarea><br><br><span id="err-opinion1">必須入力です。</span><span id="err-opinion2">120文字以内で入力してください。</span></td>
                    </tr>
                    <tr>
                        @error('opinion')
                        <th></th>
                        <td colspan="2" class="err-msg-list">{{$message}}</td>
                        @enderror
                    </tr>
                </tbody>
            </table>
            <div class="submit-button">
                <button class="submit-button-check" id="submit">確認</button>
            </div>
        </form>
    </main>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    <script src="{{ mix('js/word.js') }}"></script>
    <script src="{{ mix('js/check.js') }}"></script>
</body>

</html>