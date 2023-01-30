<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{!! asset('assets/css/auth.css') !!}">
    <title>
        Mutuharjo Lab Inventory Sistem Auth
    </title>
</head>

<body>



    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <form action="/auth/register" method="post">
                            @csrf
                            @method('POST')
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" name="username" placeholder="username" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="password" name="password" placeholder="password" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="text" name="kelas" placeholder="kelas" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="text" name="NoHp" placeholder="no_hp" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="text" name="alamat" placeholder="alamat" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="text" name="nisn" placeholder="nisn" required>
                            </div>
                            <button type="submit">submit</button>
                        </form>
                        <p>
                            <span>
                                Already have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                            </b>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">

                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <form action="/auth/login" method="GET">
                            @method("POST")
                            @csrf
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" name="username" placeholder="username" required>
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" name="password" placeholder="password" required>
                            </div>
                            <button type="submit"> Sign in </button>
                            <p>
                                <b>
                                    Forgot password?
                                </b>
                            </p>
                        </form>
                        <p>
                            <span>
                                Don't have an account?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Sign up here
                            </b>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">

                </div>
            </div>

            <!-- END SIGN IN -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome back
                    </h2>
                    <p>
                        Selamat datang kembali di website Mutuharjo Lab Inventory Sistem.
                    </p>
                </div>
                <div class="img sign-in">
                    <img src="{!! asset('assets/images/undraw_different_love_a3rg.svg') !!}" alt="welcome">
                </div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                    <img src="{!! asset('assets/images/undraw_creative_team_r90h.svg') !!}" alt="welcome">
                </div>
                <div class="text sign-up">
                    <h2>
                        Join with us
                    </h2>
                    <p>
                        Selamat datang di website Mutuharjo Lab Inventory Sistem , dimana ada 5 laptop yang bisa anda
                        rental dengan gratis.
                    </p>
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>

    <script src="{!! asset('assets/js/auth.js') !!}"></script>
</body>

</html>
