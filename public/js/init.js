$(document).ready(function(){
    $(".collapsible").collapsible();
    $(".dropdown-trigger").dropdown({coverTrigger: false});
    $(".cpf").mask("000.000.000-00");
    $(".data").mask("00/00/0000");
    $(".telefone").mask("(00)00000-0000");
    $('.tooltipped').tooltip();
    $('.modal').modal();
    $('.select2').select2();
    $('.chip').chips();
    
    var ativo = false;
    $(".btn-menu").click(function(){
        ativo = !ativo;
        if( ativo ){
            $(".container-left").css("display","block");
        }else{
            $(".container-left").css("display","none");
        }
    });
    
    
    var options = {
      cancel: 'Cancelar',
      done: 'Selecionar',
      months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
      weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'],
      weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
      weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S']
    };
    $(".datepicker").datepicker({format: 'dd/mm/yyyy', i18n : options});
    $(".datepicker-date-display").addClass("azul-padrao");
    
    var total = parseInt($(".total").text());
    var pagina = parseInt($(".pagina").text());
    var url = $(".url").text();
    $(".pagination").append("<li class='waves-effect waves-light'><a href='"+url+"?pagina=1'><i class='material-icons'>chevron_left</i></a></li>");
    var paginas = Math.ceil(total/5);
    console.log(paginas);
    for( var i=1; i<=paginas; i++ ){
        if( pagina == i ){
            $(".pagination").append("<li class='waves-effect waves-light ativar'><a href='"+url+"?pagina="+i+"' >"+i+"</a></li>");
        }else{
            $(".pagination").append("<li class='waves-effect waves-light'><a href='"+url+"?pagina="+i+"' >"+i+"</a></li>");
        }
    }
    $(".pagination").append("<li class='waves-effect waves-light'><a href='"+url+"?pagina="+(i-1)+"'><i class='material-icons'>chevron_right</i></a></li>");

    
    $(".btn-confirmar").click(function(){
        $("#modalConfirmar").modal('open');
    });
    

});

function erro(array){
    $("#modalErroMensagem").empty();
    $("#modalErroMensagem").css("color", "red");
    for( var i=0; i<array.length; i++ ){
       $("#modalErroMensagem").append("<span>"+array[i]+"</span>"); 
    }
    $("#modalErro").modal('open');
}

function sucesso(array){
    $("#modalErroMensagem").empty();
    $("#modalErroMensagem").css("color", "green");
    for( var i=0; i<array.length; i++ ){
       $("#modalErroMensagem").append("<span>"+array[i]+"</span>"); 
    }
    $("#modalErro").modal('open');
}

function atualizaCampos(){
     M.updateTextFields();
}

function dateFormat(date){
    var data = date.substring(0, 10);
    data = data.split("-");
    if( data[2] == 0 ){
        return "Atual";
    }
    return ""+data[2]+"/"+data[1]+"/"+data[0];
}
