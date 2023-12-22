<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('dashboard') || request()->is('dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i
                        class="{{ request()->is('dashboard') || request()->is('dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            @can('app')
                <li class=" navigation-header"><span data-i18n="Application">Aplikasi</span><i class="la la-ellipsis-h"
                        data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
                </li>
            @endcan
            @can('management_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('user') || request()->is('user/*') || request()->is('*/user') || request()->is('*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                            class="menu-title" data-i18n="Management Access">Manajemen Akses</span></a>
                    <ul class="menu-content">

                        @can('user_access')
                            <li
                                class="{{ request()->is('user') || request()->is('user/*') || request()->is('*/user') || request()->is('*/user/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('user.index') }}">
                                    <i></i><span>User</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('master_data_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('permission') || request()->is('permission/*') || request()->is('*/permission') || request()->is('*/permission/*') || request()->is('caleg') || request()->is('caleg/*') || request()->is('*/caleg') || request()->is('*/caleg/*') || request()->is('dapil') || request()->is('dapil/*') || request()->is('*/dapil') || request()->is('*/dapil/*') || request()->is('desa') || request()->is('desa/*') || request()->is('*/desa') || request()->is('*/desa/*') || request()->is('kecamatan') || request()->is('kecamatan/*') || request()->is('*/kecamatan') || request()->is('*/kecamatan/*') || request()->is('role') || request()->is('role/*') || request()->is('*/role') || request()->is('*/role/*') || request()->is('tps') || request()->is('tps/*') || request()->is('*/tps') || request()->is('*/tps/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                            class="menu-title" data-i18n="Master Data">Master Data</span></a>
                    <ul class="menu-content">

                        @can('permission_access')
                            <li
                                class="{{ request()->is('permission') || request()->is('permission/*') || request()->is('*/permission') || request()->is('*/permission/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('permission') }}">
                                    <i></i><span>Akses</span>
                                </a>
                            </li>
                        @endcan

                        @can('caleg_access')
                            <li
                                class="{{ request()->is('caleg') || request()->is('caleg/*') || request()->is('*/caleg') || request()->is('*/caleg/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('caleg') }}">
                                    <i></i><span>Caleg</span>
                                </a>
                            </li>
                        @endcan

                        @can('dapil_access')
                            <li
                                class="{{ request()->is('dapil') || request()->is('dapil/*') || request()->is('*/dapil') || request()->is('*/dapil/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('dapil') }}">
                                    <i></i><span>Dapil</span>
                                </a>
                            </li>
                        @endcan

                        @can('desa_access')
                            <li
                                class="{{ request()->is('desa') || request()->is('desa/*') || request()->is('*/desa') || request()->is('*/desa/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('desa') }}">
                                    <i></i><span>Desa</span>
                                </a>
                            </li>
                        @endcan

                        @can('kecamatan_access')
                            <li
                                class="{{ request()->is('kecamatan') || request()->is('kecamatan/*') || request()->is('*/kecamatan') || request()->is('*/kecamatan/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('kecamatan') }}">
                                    <i></i><span>Kecamatan</span>
                                </a>
                            </li>
                        @endcan

                        @can('paket_access')
                            <li
                                class="{{ request()->is('paket') || request()->is('paket/*') || request()->is('*/paket') || request()->is('*/paket/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('paket') }}">
                                    <i></i><span>Paket</span>
                                </a>
                            </li>
                        @endcan

                        @can('role_access')
                            <li
                                class="{{ request()->is('role') || request()->is('role/*') || request()->is('*/role') || request()->is('*/role/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('role') }}">
                                    <i></i><span>Peran</span>
                                </a>
                            </li>
                        @endcan

                        @can('tps_access')
                            <li
                                class="{{ request()->is('tps') || request()->is('tps/*') || request()->is('*/tps') || request()->is('*/tps/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('tps') }}">
                                    <i></i><span>Tps</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('operational_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('kegiatan') || request()->is('kegiatan/*') || request()->is('*/kegiatan') || request()->is('*/kegiatan/*') || request()->is('saksi') || request()->is('saksi/*') || request()->is('*/saksi') || request()->is('*/saksi/*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span
                            class="menu-title" data-i18n="Operational">Operasional</span></a>
                    <ul class="menu-content">

                        @can('kegiatan_access')
                            <li
                                class="{{ request()->is('kegiatan') || request()->is('kegiatan/*') || request()->is('*/kegiatan') || request()->is('*/kegiatan/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('kegiatan.index') }}">
                                    <i></i><span>Kegiatan</span>
                                </a>
                            </li>
                        @endcan

                        @can('saksi_access')
                            <li
                                class="{{ request()->is('saksi') || request()->is('saksi/*') || request()->is('*/saksi') || request()->is('*/saksi/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('saksi.index') }}">
                                    <i></i><span>Saksi</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
