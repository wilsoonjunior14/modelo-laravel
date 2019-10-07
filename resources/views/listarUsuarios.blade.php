@extends("template")
@section("conteudo")
<div class="row">
    <div class="col s12">
        
        <div class="card hoverable left-align">
            <form method="get">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 l4">
                            <a onclick='window.history.back()' class='btn waves-effect waves-light azul-padrao'><i class='material-icons left'>keyboard_return</i>Voltar</a>
                        </div>
                    </div>
                    <span class="card-title"><i class="material-icons left">search</i>Pesquisa</span>
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="nome" id="nome" maxlength="255" pattern="[a-z A-Z áéíóúÁÉÍÓÚãõÃÕâêîôûÂÊÎÔÛ]*"
                                data-error="Nome inválido! Apenas caracteres são permitidos"/>
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">edit</i>
                            <input type="text" name="cpf" id="cpf" maxlength="255" class="cpf"
                                data-error="CPF inválido! Apenas dígitos são permitidos"/>
                            <label for="cpf">CPF</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <i class="material-icons prefix">mail</i>
                            <input type="text" name="email" id="email" maxlength="255"
                                data-error="Email inválido! Apenas caracteres são permitidos"/>
                            <label for="email">Email</label>
                        </div>
                        
                    </div>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="col s12 m3 l5">
                            <button type="submit" class="btn waves-effect waves-light azul-padrao"><i class="material-icons left">search</i>Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="card hoverable left-align">
            <div class="card-content">
            <span class="card-title"><i class="material-icons left">group</i>Usuários</span>
            </br>
            <a href="/usuario/adicionar" class="btn waves-effect waves-light green tooltipped" data-tooltip='Novo usuário' data-position='bottom'><i class="material-icons left">add</i>Novo</a>
            </br>
            <div class="right">
                Total: <span class="total"><?= $_POST['total']; ?> <span class="pagina invisible"><?= $_POST['pagina'] ?></span><span class="url invisible"><?= $_POST['url'] ?></span>
            </div>
            <div class="row">
                    <table class="highlight striped responsive-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CPF</th>
                                <th>Contato</th>
                                <th>Tipo de Usuário</th>
                                <th class="center-align">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $usuarios as $usuario )
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->cpf}}</td>
                                <td>{{$usuario->contato}}</td>
                                <td>{{$usuario->permissao}}</td>
                                <td>
                                    <center>
                                        <a href="/usuario/editar/{{$usuario->id}}" class="btn-floating waves-effect waves-light tooltipped orange" data-tooltip='Editar' data-position='bottom'><i class="material-icons">edit</i></a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="row">
                <ul class="pagination"></ul>
            </div>
            </div>
            
        </div>
    </div>
</div>
@stop()