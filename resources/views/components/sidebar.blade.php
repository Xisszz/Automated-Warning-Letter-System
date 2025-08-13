<div>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="home">
                    <img src="{{ asset('template/dist') }}/assets/images/Skss1.png" alt="img"
                        style="width: 50px; height: auto; display: block; margin-left: auto; margin-right: auto;">
                </a>
                <a href="{{ route('home') }}" class="b-brand text-dark">
                    <span>Kehadiran Pengurusan Sekolah Kebangsaan Sungai Sireh</span>
                </a>

            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">

                    <x-sidebar.links title="Laman Utama" icon="ti ti-dashboard" route="home" />
                    @if (Auth::user()->role_id == 1)
                        <x-sidebar.links title="Data Users" icon="ti ti-users" route="users.index" />
                        <x-sidebar.links title="Data Guru" icon="fa fa-users" route="guru.index" />
                        <x-sidebar.links title="Daftar Kelas" icon="ti ti-bell" route="bahagian.index" />
                    @endif


                    <x-sidebar.links title="Data Murid" icon="ti ti-users" route="murid.index" />
                    <x-sidebar.links title="Kehadiran" icon="fa	fa-calendar" route="kehadiran.index" />
                    <x-sidebar.links title="Surat Amaran" icon="fa	fa-envelope" route="warning_letters.index" />




                </ul>
            </div>
        </div>
    </nav>
</div>
