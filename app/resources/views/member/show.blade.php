<h1>詳細表示</h1>

<div>
    名前
    {{$member->name}}
</div>

<div>
    電話番号
    {{$member->telephone}}
</div>

<div>
    メールアドレス
    {{$member->email}}
</div>

<a href="{{ route('member.index') }}">{{ __('一覧に戻る') }}</a>
