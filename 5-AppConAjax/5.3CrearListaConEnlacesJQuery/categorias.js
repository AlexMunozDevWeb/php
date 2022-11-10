$( document ).ready(function() {
  
  $.ajax({
    type: "GET",
    url: 'datos_categorias_json.php',
    // data: 'categoria',
    success: function(response){
      var jsonData = JSON.parse(response);
      console.log(jsonData[1]['CodCat']);
      var lista = '';
      for (let i = 0; i < jsonData.length; i++) {
        lista += '<li><a href="productos.php?categoria='+ jsonData[i]['CodCat'] +'">' + jsonData[i]['Nombre'] + '</a></li>';
      }
      $("<ul>").append( lista ).hide().appendTo('#lista').fadeIn('slow');
    }
  });

});