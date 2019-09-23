<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('noticium_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.noticia.index") }}" class="nav-link {{ request()->is('admin/noticia') || request()->is('admin/noticia/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-newspaper">

                            </i>
                            <p>
                                <span>{{ trans('cruds.noticium.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('evento_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.eventos.index") }}" class="nav-link {{ request()->is('admin/eventos') || request()->is('admin/eventos/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.evento.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('programa_de_parcerium_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/categoria*') ? 'menu-open' : '' }} {{ request()->is('admin/parceiros*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.programaDeParcerium.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('categorium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categoria.index") }}" class="nav-link {{ request()->is('admin/categoria') || request()->is('admin/categoria/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bars">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.categorium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('parceiro_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.parceiros.index") }}" class="nav-link {{ request()->is('admin/parceiros') || request()->is('admin/parceiros/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-handshake">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.parceiro.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('configuraco_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/informacos*') ? 'menu-open' : '' }} {{ request()->is('admin/municipios*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.configuraco.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('informaco_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.informacos.index") }}" class="nav-link {{ request()->is('admin/informacos') || request()->is('admin/informacos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-info">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.informaco.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('municipio_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.municipios.index") }}" class="nav-link {{ request()->is('admin/municipios') || request()->is('admin/municipios/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-map-marker-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.municipio.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('profissionai_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/profissionals*') ? 'menu-open' : '' }} {{ request()->is('admin/habilitacaos*') ? 'menu-open' : '' }} {{ request()->is('admin/especialidades*') ? 'menu-open' : '' }} {{ request()->is('admin/categoria-profissionals*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.profissionai.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('profissional_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.profissionals.index") }}" class="nav-link {{ request()->is('admin/profissionals') || request()->is('admin/profissionals/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-address-card">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.profissional.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('habilitacao_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.habilitacaos.index") }}" class="nav-link {{ request()->is('admin/habilitacaos') || request()->is('admin/habilitacaos/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bars">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.habilitacao.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('especialidade_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.especialidades.index") }}" class="nav-link {{ request()->is('admin/especialidades') || request()->is('admin/especialidades/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tooth">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.especialidade.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('categoria_profissional_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categoria-profissionals.index") }}" class="nav-link {{ request()->is('admin/categoria-profissionals') || request()->is('admin/categoria-profissionals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.categoriaProfissional.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contato_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/denuncia*') ? 'menu-open' : '' }} {{ request()->is('admin/nota*') ? 'menu-open' : '' }} {{ request()->is('admin/mensagems*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw far fa-comment">

                            </i>
                            <p>
                                <span>{{ trans('cruds.contato.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('denuncium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.denuncia.index") }}" class="nav-link {{ request()->is('admin/denuncia') || request()->is('admin/denuncia/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-exclamation-triangle">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.denuncium.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('notum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.nota.index") }}" class="nav-link {{ request()->is('admin/nota') || request()->is('admin/nota/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-sticky-note">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.notum.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('mensagem_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.mensagems.index") }}" class="nav-link {{ request()->is('admin/mensagems') || request()->is('admin/mensagems/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.mensagem.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>