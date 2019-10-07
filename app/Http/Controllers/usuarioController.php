<?php

namespace servicos\Http\Controllers;

use servicos\usuario;
use servicos\permissao;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use servicos\User;
use servicos\informacao;
use servicos\Http\Controllers\config;

class usuarioController extends Controller
{
    public function adicionar(){
        $permissao = Permissao::all();
        return view("novoUsuario")->with('permissao', $permissao);
    }
    
    public function search(){
        $search = "WHERE u.id is not null";
        $params = array();
        if( !empty($_GET['nome']) ){
            $search .= " AND u.nome LIKE '%{$_GET['nome']}%'";
            array_push($params, $_GET['nome']);
        }
        if( !empty($_GET['email']) ){
            $search .= " AND u.emal LIKE '%{$_GET['email']}%'";
            array_push($params, $_GET['email']);
        }
        if( !empty($_GET['cpf']) ){
            $search .= " AND u.cpf LIKE '%{$_GET['cpf']}%'";
            array_push($params, $_GET['cpf']);
        }
        if( !empty($_GET['permissao']) ){
            $search .= " AND u.id_permissao = {$_GET['permissao']}";
            array_push($params, $_GET['permissao']);
        }
        return ['where' => $search, 'params' => $params];
    }
    
    public function index(){
        $usuario = Auth::user();
        $search = $this->search();
        $sql = "select u.id, u.name, u.email, i.cpf, i.contato, p.permissao from users u "
                . "left join informacaos i on i.id_usuario = u.id "
                . "left join permissaos p on p.id = i.id_permissao "
                . " {$search['where']} ";
        $usuarios = DB::select($sql);
        $_POST['total'] = count($usuarios);
        $pagination = pagination::pagination();
        $sql .= " order by u.name {$pagination}";
        $usuarios = DB::select($sql);
        return view("listarUsuarios")->with('usuarios', $usuarios);
    }
    
    public function editar($id){
        
        $sql = "select u.*, i.id as id_informacaos, i.cpf, i.contato, i.id_permissao, i.data_nascimento from users u "
                . "left join informacaos i on u.id = i.id_usuario"
                . " where u.id = {$id}";
        $usuario = DB::select($sql);
        $usuario = $usuario[0];
        
        $usuario->data_nascimento = config::formataData($usuario->data_nascimento);
        
        return view("editarUsuario")
        ->with('usuario', $usuario)
        ->with('permissao', Permissao::all());
    }
    
    public function edit(){
        $erro = "";
        $info = "";
        $sucesso = "";
        $senha = Request::input("senha");
        $confirmarsenha = Request::input("confirmar_senha");
        $usuario = new User(Request::all());
        
        $informacaos = new informacao(Request::all());
        $informacaos->id = Request::input('id_informacaos');
        $informacaos->id_usuario = Request::input('id');
        $informacaos->data_nascimento = config::formataDataBase($informacaos->data_nascimento);
        
        
        $usuario->id = Request::input('id');
        $usuario->password = Hash::make(Request::input('senha'));
        if( $senha == $confirmarsenha ){
            $result = DB::table('users')->where(['id'=>$usuario->id])
                    ->update(['name'=>$usuario->name,
                        'email'=> $usuario->email,
                        'password'=>$usuario->password]);
            
            if( $result ){
                $result = DB::table('informacaos')->where(['id'=>$informacaos->id])
                        ->update(['cpf' => $informacaos->cpf,
                            'contato' => $informacaos->contato,
                            'data_nascimento' => $informacaos->data_nascimento,
                            'id_permissao' => $informacaos->id_permissao]);
                
                if( $result ){
                    $sucesso = "Informações de {$usuario->nome} atualizadas com sucesso!";
                    return redirect("/usuario")
                    ->with('success', "Informações atualizadas com sucesso!");
                }else{
                    $error = "Erro ao salvar informações de {$usuario->nome}";
                }
            }else{
                $error = "Erro ao salvar informações";
            }
            
            
        }else{
            $info = "Senhas divergiram";
        }
        return redirect("/usuario/editar/{$usuario->id}")->with('error', $erro)
                ->with('info', $info)
                ->with('success', $sucesso);
    }
    
    public function add(){
        $senha = Request::input("senha");
        $confirmarSenha = Request::input("confirmar_senha");
        $erro = "";
        $info = "";
        $sucesso = "";
        if( $senha == $confirmarSenha && strlen($senha) > 0 && strlen($confirmarSenha) > 0 ){
            
            $usuario = new User(Request::all());
            $usuario->password = Hash::make($senha);
            $usuario->save();
            
            $informacao = new informacao(Request::all());
            $informacao->id_usuario = $usuario->id;
            $informacao->data_nascimento = config::formataDataBase($informacao->data_nascimento);
            
            $resultado = $informacao->save();
            if( $resultado == true ){
                $sucesso = "Usuário criado com sucesso";
            }else{
                $erro = "Erro ao criar usuário";
            }

        }else{
            $erro = "Senhas inválidas ou distintas!";
        }
        
        return redirect("/usuario")->with('error', $erro)
                ->with('info', $info)
                ->with('success', $sucesso);
    }
}
