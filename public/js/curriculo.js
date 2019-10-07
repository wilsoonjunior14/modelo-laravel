
$(document).ready(function(){
   
    $("#formExperiencia").submit(function(){
        var data_inicio = $("#data_inicio").val();
        data_inicio = (data_inicio.substring(0,10)).split("/");
        data_inicio = ""+data_inicio[2]+"-"+data_inicio[1]+"-"+data_inicio[0];
        
        var data_final = $("#data_fim").val();
        if( data_final.length > 0 ){        
            data_final = (data_final.substring(0,10)).split("/");
            data_final = ""+data_final[2]+"-"+data_final[1]+"-"+data_final[0];
        }
        
        var data = {
            id: $("#id_experiencia").val(),
            id_usuario: $("#id_usuario").val(),
            experiencia: $("#experiencia").val(),
            funcao: $("#funcao").val(),
            id_nivel: $("#nivel").val(),
            data_inicial: data_inicio,
            data_fim: data_final,
            observacao: $("#observacao").val()
        }
        console.log(data);
        
        $.post("http://localhost:8000/curriculo/add", data, function(data){
            console.log(data);
            var array = [];
            if( data['mensagem'] == true ){
                $("#formExperiencia")[0].reset();
                array.push("Experiência profissional salva com sucesso!");
                sucesso(array);
                
                atualizarTabelaCurriculo(data['experiencias']);
                
                /*var tbody = $("#tabelaExperiencias tbody");
                tbody.empty();
                for( var i=0; i<data['experiencias'].length; i++ ){
                    var experiencia = data['experiencias'][i];
                    experiencia['observacao'] = experiencia['observacao'] === null ? "" : experiencia['observacao'];
                    console.log(experiencia['data_inicial']);
                    var row = "<tr> \n\
                                <td class='row'>\n\
                                    <p class='col s12'>"+experiencia['experiencia']+"</p>\n\
                                    <p class='col s12'>Função: "+experiencia['funcao']+"</p>\n\
                                </td>\n\
                                <td>"+experiencia['data_inicial']+" - "+experiencia['data_fim']+" </td> \n\
                                <td>"+experiencia['id_nivel']+"</td>\n\
                                <td>"+experiencia['observacao']+"</td>\n\
                                <td>\n\
                                <a onclick='onEditarExperiencia("+JSON.stringify(experiencia)+")' class='btn-floating waves-effect waves-light orange tooltipped' data-tooltip='Editar qualificação'><i class='material-icons'>edit</i></a>\n\
                                <a class='btn-floating waves-effect waves-light red tooltipped' data-tooltip='Remover qualificação'><i class='material-icons'>delete</i></a></td>\n\
                                \n\
                                </tr>";      
                    tbody.append(row);
                }*/
                
            }else if( data['mensagem'] == false ){
                array.push("Informações relacionadas a experiência profissional incoerentes! Verifique-as e tente novamente.");
                erro(array);
            }else{
                array.push(data['mensagem']);
                erro(array);
            }
        });
        return false;
    });
    
    
    $("#formExperienciaExcluir").submit(function(){
        
        var data = {
          id_usuario: $("#id_usuario").val(),
          id_experiencia: $("#id_experiencia").val()
        };
        
        $.post("http://localhost:8000/curriculo/delete", data, function(data){
            console.log(data);
            array = [];
            if( data['mensagem'] == true ){
                array.push("Item excluído com sucesso!");
                atualizarTabelaCurriculo(data['experiencias']);
                sucesso(array);
            }else if( data['mensagem'] == false ){
                array.push("Não foi possível excluir experiência profissional");
            }else{
                array.push(data['mensagem']);
                erro(array);
            }
        });
        
        
        return false;
    });
    
});

function onEditarExperiencia(json){
    console.log(json);
    $("#experiencia").val(json['experiencia']);
    $("#funcao").val(json['funcao']);
    $("#data_inicio").val(json['data_inicial']);
    $("#data_fim").val(json['data_fim']);
    $("#id_nivel").val(json['id_nivel']);
    $("#observacao").val(json['observacao']);
    $("#id_experiencia").val(json['id']);
    atualizaCampos();
    sucesso(["Experiência profissional pronta para edição!"]);
}

function onExcluirExperiencia(json){
    $("#mensagemExcluir").text("Deseja excluir o item "+json['experiencia']+" do currículo ?");
    $("#id_experiencia").val(json['id']);
    $("#modalExcluirExperiencia").modal('open');
}

function atualizarTabelaCurriculo(experiencias){
    var tbody = $("#tabelaExperiencias tbody");
    tbody.empty();
    for( var i=0; i<experiencias.length; i++ ){
        var experiencia = experiencias[i];
        experiencia['observacao'] = experiencia['observacao'] === null ? "" : experiencia['observacao'];
        var row = "<tr> \n\
        <td class='row'>\n\
        <p class='col s12'>"+experiencia['experiencia']+"</p>\n\
        <p class='col s12'>Função: "+experiencia['funcao']+"</p>\n\
        </td>\n\
        <td>"+experiencia['data_inicial']+" - "+experiencia['data_fim']+" </td> \n\
        <td>"+experiencia['descricao']+"</td>\n\
        <td>"+experiencia['observacao']+"</td>\n\
        <td>\n\
        <a onclick='onEditarExperiencia("+JSON.stringify(experiencia)+")' class='btn-floating waves-effect waves-light orange tooltipped' data-tooltip='Editar qualificação'><i class='material-icons'>edit</i></a>\n\
        <a onclick='onExcluirExperiencia("+JSON.stringify(experiencia)+")' class='btn-floating waves-effect waves-light red tooltipped' data-tooltip='Remover qualificação'><i class='material-icons'>delete</i></a></td>\n\
        \n\
        </tr>";      
        tbody.append(row);
    }
}