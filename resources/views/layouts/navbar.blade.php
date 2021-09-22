<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My pouch</a>
        <!--ハンバーガーボタン-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#responsive" aria-controls="responsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
            <div class="collapse navbar-collapse" id="responsive">
                <ul class="navbar-nav me-auto"></ul>
                <ul class="navbar-nav">
                @if (Auth::check())
                        {{-- ログアウトへのリンク --}}
                        <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    
                @else
                        {{-- ユーザ登録ページへのリンク --}}
                        <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                        {{-- ログインページへのリンク --}}
                        <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
                </ul>
            </div>
           
    </div>
</nav>
