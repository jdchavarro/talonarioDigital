$(".boton").click(function(){
  //Tomamos el ide del boton presionado y creamos el id del panel correspondiente
  var panelId = $(this).attr("id")+"Panel";
  $(".panel").addClass("oculto");
  $("#"+panelId).toggleClass("oculto");
  $(".boton").removeClass("active");
  $("#"+$(this).attr("id")).addClass("active");
});
