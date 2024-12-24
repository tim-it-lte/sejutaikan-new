@if (Auth::user()->role == 'admin')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('admin.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                        class="ri-apps-fill"></i><span>Master Data</span><i
                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{ route('admin.jenis-permohonan.all') }}"><i class="ri-checkbox-blank-fill"></i>Jenis
                            Pengujian</a></li>
                    <li><a href="{{ route('admin.parameter.all') }}"><i class="ri-checkbox-blank-fill"></i>Paramater</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.all.survei') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Hasil Survei</span></a>
            </li>
            <li>
                <a href="{{ route('admin.berita.all') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Berita</span></a>
            </li>
            <li>
                <a href="{{ route('admin.sop.all') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>SOP</span></a>
            </li>
            <li>
                <a href="{{ route('admin.pengumuman.all') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Pengumuman</span></a>
            </li>
            <li>
                <a href="{{ route('admin.gallery') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Galeri</span></a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.all.permohonan') }}" class="iq-waves-effect"><i class="ri-folders-fill"></i><span>Daftar Permohonan</span></a>
            </li> --}}
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'pemohon')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('pemohon.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
            {{-- <li>
                <a href="{{ route('pemohon.all.permohonan') }}" class="iq-waves-effect"><i class="ri-folders-fill"></i><span>Daftar Permohonan</span></a>
            </li> --}}
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'cs')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('cs.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
            {{-- <li>
                <a href="{{ route('cs.all.permohonan') }}" class="iq-waves-effect"><i class="ri-folders-fill"></i><span>Daftar Permohonan</span></a>
            </li> --}}
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'pengujian')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('pengujian.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'verifikator')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('verifikator.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('verifikator.all.permohonan') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Daftar Pengujian</span></a>
            </li>
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'pimpinan')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('pimpinan.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('pimpinan.all.permohonan') }}" class="iq-waves-effect"><i
                        class="ri-folders-fill"></i><span>Daftar Pengujian</span></a>
            </li>
            <li>
                <a href="{{ route('pimpinan.edit.ttd') }}" class="iq-waves-effect"><i
                        class="ri-group-fill"></i><span>Tanda Tangan</span></a>
            </li>
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'keuangan')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('keuangan.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@elseif(Auth::user()->role == 'pengangkut')
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Fitur</span></li>
            <li class="active">
                <a href="{{ route('pengangkut.home') }}" class="iq-waves-effect"><i
                        class="ri-home-8-fill"></i><span>Dashboard</span></a>
            </li>
        </ul>
    </nav>
    <div class="p-3 mb-5"></div>
@endif
