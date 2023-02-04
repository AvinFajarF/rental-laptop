<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MPLS Web</title>
    <link rel="stylesheet" href="{!! asset('assets/css/admin.css') !!}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://m3.material.io/styles/icons/overview#257fe17b-d20f-488d-9842-2af613e3abcd">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="img/Logo.webp" alt="">
                    <h2>LAP<span>TOP</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <h3>Profile</h3>
                </a>
                <a href="/dashboard/rentlogs">
                    <span class="material-symbols-outlined">
                        history
                    </span>
                    <h3>History</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        fingerprint
                    </span>
                    <h3>Id</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        list_alt
                    </span>
                    <h3>User-List</h3>
                </a>
                <a href="/dashboard/rent">
                    <span class="material-symbols-outlined">
                        play_arrow
                    </span>
                    <h3>Rents</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        grid_view
                    </span>
                    <h3>Dasboard</h3>
                </a>
            </div>
        </aside>

        <!-- END IF ASIDE -->
        <main>
            <h1>Dasboard</h1>

            <div class="date">
                <input type="date">
            </div>

            <div class="insights">
                <div class="laptop">
                    <span class="material-symbols-outlined">
                        devices
                    </span>
                    <div class="middle">
                        <div class="lef">
                            <h3>Laptop</h3>
                            <h1>Total Device</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                                <div class="number">
                                    <p>60%</p>
                                </div>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">{{ $category }}</small>
                </div>
                <!-- end of top list -->
                <div class="peminjaman">
                    <span class="material-symbols-outlined">
                        query_stats
                    </span>
                    <div class="middle">
                        <div class="lef">
                            <h3>Peminjaman</h3>
                            <h1></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                                <div class="number">
                                    <p>2%</p>
                                </div>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">{{ $rent_logs }}</small>
                </div>
                <!-- end of top list -->
                <div class="people">
                    <span class="material-symbols-outlined">
                        groups
                    </span>
                    <div class="middle">
                        <div class="lef">
                            <h3>people</h3>
                            <h1></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                                <div class="number">
                                    <p>1%</p>
                                </div>
                            </svg>
                        </div>
                    </div>
                    <small class="text-muted">{{ $users }}</small>
                </div>
                <!-- end of top list -->
            </div>
            <!-- end of list -->

            <div class="laptop-list">
                <h2>List Laptop</h2>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Rent Date</th>
                            <th>Retrun Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentlogs as $item)
                            <tr class="{{$item->status == 'dikembalikan' ? 'tester' : ''}}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->rent_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->status }}</td>
                                <form action="/dashboard/rent/kembali" method="post">
                                    <td> <a href="/dashboard/rent/kembali/{{$item->user->slug }}/{{$item->category_id}}">Oke</a> </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="#">Show ALL</a>
            </div>
        </main>
        <!-- end of main -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">
                        menu_open
                    </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">
                        brightness_6
                    </span>
                    <span class="material-symbols-outlined">
                        brightness_4
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Someone</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <!-- end of top -->
            <div class="recent-update">
                <h2>Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="massage">
                        <p><b>siswa</b> Lorem ipsum dolor sit.</p>
                        <small class="text-muted">Time</small>
                    </div>
                </div>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="massage">
                        <p><b>siswa</b> Lorem ipsum dolor sit.</p>
                        <small class="text-muted">Time</small>
                    </div>
                </div>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="massage">
                        <p><b>siswa</b> Lorem ipsum dolor sit.</p>
                        <small class="text-muted">Time</small>
                    </div>
                </div>
            </div>
            <!-- end of recent updates -->
            <div class="sales-analytics">
                <h2>progress analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Jumlah User</h3>
                            <small class="text-muted"> {{ $users }}</small>
                        </div>
                    </div>
                    <h5 class="success">+58%</h5>
                    <h3>8748</h3>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            category
                        </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Jumlah Category</h3>
                            <small class="text-muted">{{ $category }}</small>
                        </div>
                    </div>
                    <h5 class="success">+58%</h5>
                    <h3>8748</h3>
                </div>
                <div class="item User">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            person_off
                        </span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Jumlah Banned</h3>
                            <small class="text-muted">{{ $rent_logs }}</small>
                        </div>
                    </div>
                    <h5 class="success">+58%</h5>
                    <h3>8748</h3>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{!! asset('assets/js/admin.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
