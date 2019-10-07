@extends('template')
@section('conteudo')
<div class="row">
    <div class="col s12">
        <div class="card hoverable left-align">
            <form action="/usuario/edit" method="post">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 l4">
                        <a onclick='window.history.back()' class='btn waves-effect waves-light azul-padrao'><i class='material-icons left'>keyboard_return</i>Voltar</a>
                    </div>
                </div>
                <span class="card-title"><i class="material-icons left">edit</i>Editar Usuário</span>
                <div class="row">
                    <input type="hidden" value="<?= $usuario->id ?>" name="id" />
                    <input type="hidden" value="<?= $usuario->id_informacaos ?>" name="id_informacaos" />
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="name" id="nome" required maxlength="255"
                               value="{{$usuario->name}}"
                               data-error="Nome inválido! Apenas caracteres são permitidos"/>
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">mail</i>
                        <input type="email" name="email" id="email" required maxlength="255"
                               value="{{$usuario->email}}"
                               data-error="Email inválido!"/>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">edit</i>
                        <input type="text" name="cpf" id="cpf" required maxlength="14"
                        value="{{$usuario->cpf}}"
                               data-error="CPF inválido!" class="cpf"/>
                        <label for="cpf">CPF</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">date_range</i>
                        <input type="text" name="data_nascimento" class="data" id="data_nascimento" required
                        value="{{$usuario->data_nascimento}}"
                               data-error="Data de nascimento inválida!"/>
                        <label for="data_nascimento">Data de Nascimento</label>
                    </div>
                    <div class="input-field col s12 l6">
                        <i class="material-icons prefix">phone</i>
                        <input type="text" name="contato" class="telefone" id="telefone" required
                        value="{{$usuario->contato}}"
                               data-error="Telefone inválido!"/>
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="select input-field col s12 l6">
                        <i class="material-icons prefix">phone</i>
                        <select id="permissao" name="id_permissao">
                            <option disabled value="">Escolha uma opção</option>
                            @foreach( $permissao as $p )
                            <option <?php if($p->id == $usuario->id_permissao){ echo "selected"; } ?> value="{{$p->id}}">{{$p->permissao}}</option>
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
                        <button type="button" class="btn-confirmar btn waves-effect waves-light green"><i class="material-icons left">check</i>Salvar</button>
                    </div>
                </div>
            </div>
                <div id="modalConfirmar" class="modal modal-fixed-footer" style="height: 250px !important">
                    <div class="modal-content">
                        <h5>Aviso!</h5>
                        <p>Confirma a alteração das informações de {{$usuario->name}} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn waves-effect waves-light green"><i class="material-icons left">thumb_up</i>Sim</button>
                        <button type="button" class="modal-close btn waves-effect waves-light red"><i class="material-icons left">thumb_down</i>Não</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop()
