    var ponto = ".&nbsp;&nbsp;&nbsp;";
        var timeout = false;
        var velocidade = 500;
        function animaPonto() {
            timeout = setTimeout("animaPonto()", velocidade);
            document.getElementById("tresPontos").innerHTML = ponto;
            if( ponto == "...." ) {
                ponto = "&nbsp;&nbsp;&nbsp;&nbsp;";
            } else if( ponto == "&nbsp;&nbsp;&nbsp;&nbsp;" ) {
                ponto = ".&nbsp;&nbsp;&nbsp;";
            }else if( ponto == ".&nbsp;&nbsp;&nbsp;" ) {
                ponto = "..&nbsp;&nbsp;";
            }else if( ponto == "..&nbsp;&nbsp;" ) {
                ponto = "...&nbsp;";
            }else if( ponto == "...&nbsp;" ) {
                ponto = "....";
            }


        }

    function enviado(){

        $(".sumir").hide();
        $("#descricao").show();
        $("#carregando").show();
        $("#titulo").css("font-size", 600 + "%");
        $(".profile-img-card").css("width", 85 + "%");
        $(".profile-img-card").css("height", 85 + "%");
        $("#camada").addClass("classecss");
        $("#capa").removeClass("classecss");

        var angle = 0;
        var i = 0;
        var arredondado = 0;
        var to = 0;
        setInterval(function(){
            if(i != 1){
                  angle+=1;
                $("#logo").rotate(angle);
            }
        },10);

        var rotation = function (angle,to){
            $("#logo").rotate({
            angle:angle,
            animateTo:to    
            });
        }
    animaPonto();
}