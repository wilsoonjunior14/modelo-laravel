@extends('template')
@section('conteudo')
<div class="row">
    <div class="col s12">
        <div class="card hoverable left-align">
            <form action="/usuario/add" method="post">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 l4">
                        <a onclick='window.history.back()' class='btn waves-effect waves-light azul-padrao'><i class='material-icons left'>keyboard_return</i>Voltar</a>
                    </div>
                </div>
                <span class="card-title"><i class="material-icons left">person</i>Novo Usuário</span>
                <div class="row">
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="name" id="nome" required maxlength="255"
                               data-error="Nome inválido! Apenas caracteres são permitidos"/>
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">mail</i>
                        <input type="email" name="email" id="email" required maxlength="255"
                               data-error="Email inválido!"/>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input type="text" name="cpf" id="cpf" required maxlength="14"
                               data-error="CPF inválido!" class="cpf"/>
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" name="data_nascimento" class="data datepicker" id="data_nascimento" required
                               data-error="Data de nascimento inválida!"/>
                        <label for="data_nascimento">Data de Nascimento</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">phone</i>
                        <input type="text" name="contato" class="telefone" id="telefone" required
                               data-error="Telefone inválido!"/>
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="select input-field col s12 l6">
                        <i class="material-icons prefix">settings</i>
                        <select id="permissao" name="id_permissao">
                            <option disabled value="">Escolha uma opção</option>
                            @foreach( $permissao as $p )
                            <option value="{{$p->id}}">{{$p->permissao}}</option>
                            @endforeach
                        </select>
                        <label for="permissão">Permissão</label>
                    </div>
                    <div class="input-field col s12 l12"></div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="senha" id="senha" maxlength="20" required
                               data-error="Senha inválida!"/>
                        <label for="senha">Senha</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" maxlength="20" required
                               data-error="Senha inválida!"/>
                        <label for="confirmar_senha">Confirmação de senha</label>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <div class="row">
                    <div class="col s12 m3 l5">
                        <button type="submit" class="btn waves-effect waves-light green"><i class="material-icons left">check</i>Salvar</button>
                        <button type="reset" class="btn waves-effect waves-light red"><i class="material-icons left">close</i>Cancelar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@stop()