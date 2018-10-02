//SCRIPT PARA PEGAR OS DADOS DOS FORMULÁRIOS E MANDAR PRA PAGINA PHP, SEM MUDANÇA DE PÁGINA - FONTE: ??

// Add Record 
function oferecerAjuda() { // ALTERAR PARA O MODAL OFERECER AJUDA
    // get values
    var tipo = $("#tipo").val();
    var usuario = $("#usuario").val();
    var contato = $("#contato").val();
    var curso = $("#curso").val();
    var materia = $("#materia").val();
    var assunto = $("#assunto").val();
    var contrapartida = $("#contrapartida").val();
		var disponibilidade = $("#disponibilidade").val();
		
    // Add record
    $.post("oferecerAjuda.php", {
        tipo: tipo,
				usuario: usuario,
				contato: contato,
				curso: curso,
				materia: materia,
        assunto: assunto,
				contrapartida: contrapartida,
				disponibilidade: disponibilidade,
		}, function (data, status) {
        // close the popup
        $("#oferecerAjuda").modal("hide");

        // read records again
				lerPedidos();
        // clear fields from the popup
        $("#tipo").val("");
        $("#usuario_").val("");
        $("#contato").val("");
        $("#curso").val("");
        $("#materia").val("");
        $("#assunto").val("");
        $("#contrapartida").val("");
        $("#disponibilidade").val("");
    });
}

function pedirAjuda() { // ALTERAR PARA O MODAL PEDIR AJUDA
    // get values
    var tipo = $("#tipo_pedir").val();
    var usuario = $("#usuario_pedir").val();
    var contato = $("#contato_pedir").val();
    var curso = $("#curso_pedir").val();
    var materia = $("#materia_pedir").val();
    var assunto = $("#assunto_pedir").val();
    var contrapartida = $("#contrapartida_pedir").val();
		var disponibilidade = $("#disponibilidade_pedir").val();
		
    // Add record
    $.post("pedirAjuda.php", {
        tipo: tipo,
				usuario: usuario,
				contato: contato,
				curso: curso,
				materia: materia,
        assunto: assunto,
				contrapartida: contrapartida,
				disponibilidade: disponibilidade,
		}, function (data, status) {
        // close the popup
        $("#pedirAjuda").modal("hide");

        // read records again
				lerPedidos();
        // clear fields from the popup
        $("#tipo_pedir").val("");
        $("#usuario_pedir").val("");
        $("#contato_pedir").val("");
        $("#curso_pedir").val("");
        $("#materia_pedir").val("");
        $("#assunto_pedir").val("");
        $("#contrapartida_pedir").val("");
        $("#disponibilidade_pedir").val("");
    });
}
// READ records
function lerPedidos() {
    $.get("lerPedidos.php", {}, function (data, status) {
        $(".pedidos").html(data);
    });
}



function GetUserDetails(login) {
	// Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(login);
    // Add User ID to the hidden field for furture usage
    $.post("carregarUsuario.php", {
            login: login
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#editarLogin").val(user.login);
            $("#editarNome").val(user.nome);
            $("#editarUsername").val(user.username);
            $("#editarEmail").val(user.email);
            $("#editarEmail_corporativo").val(user.email_corporativo);
            $("#editarGraduacao").val(user.graduacao);
            $("#editarPermissao").val(user.permissao);
        }
    );
    // Open modal popup
    $("#editarUsuarioModal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var nome = $("#editarNome").val();
    var username = $("#editarUsername").val();
    var email = $("#editarEmail").val();
    var email_corporativo = $("#editarEmail_corporativo").val();
    var graduacao = $("#editarGraduacao").val();
    var permissao = $("#editarPermissao").val();
	
 // get hidden field value
    var login = $("#hidden_user_id").val();
	
    // Update the details by requesting to the server using ajax
    $.post("editarUsuario.php", {
        login: login,
				nome: nome,
				username: username,
				email: email,
        email_corporativo: email_corporativo,
				graduacao: graduacao,
				permissao: permissao
        },
        function (data, status) {
            // hide modal popup
            $("#editarUsuarioModal").modal("hide");
            // reload Users by using readRecords();
            lerUsuarios();
        }
    );
}


function DeleteUser(login) {
    var conf = confirm("Tem certeza de que quer EXCLUIR este Usuário?");
    if (conf == true) {
        $.post("excluirUsuario.php", {
                login: login
            },
            function (data, status) {
                // reload Users by using readRecords();
                lerUsuarios();
            }
        );
    }
}

$(document).ready(function () {
    // READ recods on page load
    lerPedidos(); // calling function
});