//SCRIPT PARA PEGAR OS DADOS DOS FORMULÁRIOS E MANDAR PRA PAGINA PHP, SEM MUDANÇA DE PÁGINA - FONTE: ??


// Add Record 
function oferecerAjuda() { // ALTERAR PARA O MODAL OFERECER AJUDA
    // get values
    var contato = $("#contato").val();
    var curso = $("#curso").val();
    var materia = $("#materia").val();
    var assunto = $("#assunto").val();
		var disponibilidade = $("#disponibilidade").val();
		
    // Add record
    $.post("oferecerAjuda.php", {
				contato: contato,
				curso: curso,
				materia: materia,
        assunto: assunto,
				disponibilidade: disponibilidade,
		}, function (data, status) {
        // close the popup
        $("#oferecerAjuda").modal("hide");

        // read records again
				load_data();
        // clear fields from the popup
        $("#contato").val("");
        $("#curso").val("");
        $("#materia").val("");
        $("#assunto").val("");
        $("#disponibilidade").val("");
    });
}

function pedirAjuda() { // ALTERAR PARA O MODAL PEDIR AJUDA
    // get values
    var contato = $("#contato_pedir").val();
    var curso = $("#curso_pedir").val();
    var materia = $("#materia_pedir").val();
    var assunto = $("#assunto_pedir").val();
		var disponibilidade = $("#disponibilidade_pedir").val();
		
    // Add record
    $.post("pedirAjuda.php", {
				contato: contato,
				curso: curso,
				materia: materia,
        assunto: assunto,
				disponibilidade: disponibilidade,
		}, function (data, status) {
        // close the popup
        $("#pedirAjuda").modal("hide");

        // read records again
				load_data();
        // clear fields from the popup
        $("#contato_pedir").val("");
        $("#curso_pedir").val("");
        $("#materia_pedir").val("");
        $("#assunto_pedir").val("");
        $("#disponibilidade_pedir").val("");
    });
}
// READ records




$(document).ready(function () {
    // READ recods on page load
    load_data(); // calling function
});

  function load_data(page)
  {
   var action = "Load";
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{action:action, page:page},
    success:function(data)
    {
     $('#user_table').html(data);
    }
   });
  }

$(document).ready(function(){

  load_data();

 
  function load_data(page)
  {
   var action = "Load";
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{action:action, page:page},
    success:function(data)
    {
     $('#user_table').html(data);
    }
   });
  }

  $(document).on('click', '.pagination_link', function(){
   var page = $(this).attr("id");
   load_data(page);
  });

  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   var action = "Delete";
   if(confirm("Tem certeza que quer excluir?"))
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:{id:id, action:action},
     success:function(data)
     {
      alert(data);
      load_data();
     }
    });
   }
   else
   {
    return false;
   }
  });
  
  $('#search').keyup(function(){
   var query = $('#search').val();
   var action = "Search";
   if(query !== '')
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:{query:query, action:action},
     success:function(data)
     {
      $('#user_table').html(data);
     }
    });
   }
   else
   {
    load_data();
   }
  });
  
 });