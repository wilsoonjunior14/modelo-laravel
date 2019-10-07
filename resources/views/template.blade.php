<!DOCTYPE html>
<html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/materialize.min.css') }}"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/home.css') }}"/>
      <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/select2.css') }}"/>
        
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="grey lighten-3">
        
        <div class="navbar-fixed z-depth-3">
            <nav>
              <div class="nav-wrapper azul-padrao lighten-2">
                <a href="#" class="center brand-logo">Logo</a>
                <ul class="left hide-on-large-only show-on-medium-and-down">
                    <li><a href="#" class="btn-menu"><i class="material-icons">menu</i></a></li>
                </ul>
                <ul class="right hide-on-small-only white azul-padrao-text dropdown-trigger btn" data-target="dropConfiguracoes">
                    <div class="truncate"><i class="material-icons left">person</i><i class="material-icons right">arrow_drop_down</i>{{Auth::user()->name}}</div>
                </ul>
                <ul id="dropConfiguracoes" class="dropdown-content">
                    <!-- <li><a href="/usuario"><i class="material-icons left">settings</i>Alterar Perfil</a></li> -->
                    <li><a href="/modelo-laravel/public/usuario"><i class="material-icons left">group</i>Usuários</a></li>
                    <!-- <li><a href="/servicos/"><i class="material-icons left">build</i>Serviços</a></li> -->
                    <li class="divider"></li>
                    <li><a href="/modelo-laravel/public/logout"><i class="material-icons left">exit_to_app</i>Sair</a></li>
                </ul>
              </div>
            </nav>

            <div class="container-left azul-padrao white-text center-align z-depth-2">
                <h5 style="padding: 10px"><?= Config::get('constantes.SYSTEM_NAME') ?></h5>
                <hr style="border-bottom: 1px solid gray"></hr>
                <ul class="collapsible azul-padrao" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header">
                            <a href="/home"><i class="material-icons left">home</i>Início</a>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header">
                            <a href="/home"><i class="material-icons left">info</i>Informações</a>
                        </div>
                    </li>
                    <!-- <li>
                        <div class="collapsible-header">
                            <i class="material-icons left">content_paste</i>Publicações<i class="material-icons right">keyboard_arrow_down</i>
                        </div>
                        <div class="collapsible-body">
                            <section><a href="/publicacoes/minhas/"><i class="material-icons left">edit</i>Minhas publicações</a></section>
                            <section><a href="/publicacoes/"><i class="material-icons left">search</i>Pesquisar</a></section>
                        </div>
                    </li> -->
                    <!-- <li>
                        <div class="collapsible-header">
                            <i class="material-icons left">group</i>Usuários<i class="material-icons right">keyboard_arrow_down</i>
                        </div>
                        <div class="collapsible-body">
                            <section><i class="material-icons left">add</i>Novo usuário</section>
                            <section><i class="material-icons left">search</i>Consultar</section>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        <!-- CARDS DE MENSAGENS -->
        <div class="container">
            <div class="row">
                @if( session('info') && strlen(session('info')) > 0 )
                <div class="col s12">
                    <div class="card left-align blue white-text">
                        <div class="card-content">
                            <span class="card-title"><i class="material-icons left">info</i>Aviso!</span>
                            <p>{{session('info')}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if( session('error') && strlen(session('error')) > 0 )
                <div class="col s12">
                    <div class="card left-align red white-text">
                        <div class="card-content">
                            <span class="card-title"><i class="material-icons left">close</i>Aviso!</span>
                            <p>{{session('error')}}</p>
                        </div>
                    </div>
                </div>
                @endif
                @if( session('success') && strlen(session('success')) > 0 )
                <div class="col s12">
                    <div class="card left-align green white-text">
                        <div class="card-content">
                            <span class="card-title"><i class="material-icons left">check</i>Aviso!</span>
                            <p>{{session('success')}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <?php unset($_POST['info']); unset($_POST['error']); unset($_POST['success']); ?>
            </div>
            @yield('conteudo')
        </div>
        <!-- MODAL MENSAGENS ERRO -->
        <div id="modalErro" class="modal modal-fixed-footer mensagem">
            <div class="modal-content">
                <h5>Aviso!<i class="material-icons right modal-close">close</i></h5>
                <p id="modalErroMensagem"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-close btn waves-effect waves-light green"><i class="material-icons left">check</i>OK</button>
            </div>
        </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{ URL::asset('js/jquery.mask.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/select2.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/init.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/funcionalidades.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
    </body>
  </html>