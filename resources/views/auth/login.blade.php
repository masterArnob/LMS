<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in with illustration - Tabler - Premium and Open Source dashboard template with responsive and high
        quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('admin/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img
                                    src="{{ asset('admin/static/logo.svg') }}" height="36" alt=""></a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Login to your account</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email address / Name / Phone</label>
                                        <input id="login" type="text" name="login" :value="old('login')"
                                            required class="form-control" placeholder="your@email.com">
                                            @error('login')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                

                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">
                                            Password
                                            <span class="form-label-description">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">
                                                        I forgot password
                                                    </a>
                                                @endif

                                            </span>
                                        </label>
                                        <div class="input-group input-group-flat">
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="Your password">

                                             @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                           



                                            <span class="input-group-text">
                                                <a href="#" class="link-secondary" title="Show password"
                                                    data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-check">
                                            <input id="remember_me" type="checkbox" name="remember"
                                                class="form-check-input" />




                                            <span class="form-check-label">Remember me on this device</span>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="text-center text-secondary mt-3">
                            Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="{{ asset('admin/static/illustrations/undraw_secure_login_pdn4.svg') }}" height="300"
                        class="d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>
