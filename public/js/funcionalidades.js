function curtir(json){
    
    var data = {
      id_usuario: parseInt($("#id_usuario").val()),
      id_publicacao: json['id_publicacao']
    };
    
    var existe = $("#btn-like"+json['id_publicacao']+"").children("i").hasClass("blue-text");
    
    if( !existe ){
        $.post("http://localhost:8000/curtidas/add", data, function(data){
            console.log(data);
            if( data['mensagem'] == true ){
              $("#btn-like"+json['id_publicacao']+"").children("i").addClass("blue-text");
            }
        });
    }else{
        $.post("http://localhost:8000/curtidas/delete", data, function(data){
            console.log(data);
            if( data['mensagem'] == true ){
              $("#btn-like"+json['id_publicacao']+"").children("i").removeClass("blue-text");
            }
        });
    }
    
}

function comentar(){
    console.log("clicou");
}