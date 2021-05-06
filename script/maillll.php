<?php
$recebenome     = $_POST["nome"];
$recebemail     = $_POST["email"];
$recebemsg      = $_POST["message"];
if (!empty($recebenome) && !empty($recebemail) && !empty($recebemsg)) {
    echo '<script>
                alert("Alguma parte do formulário está em falta! acrescente.");history.go(-1);
                </script>';}
                else{
if(isset($_POST['email']) == true && empty($_POST['email']) == false){
        if (filter_var($recebemail, FILTER_VALIDATE_EMAIL) == true){
        // Recebendo os dados
        $recebenome     = $_POST["nome"];
        $recebemsg      = $_POST["message"];
                // Definindo os cabeçalhos do e-mail
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type:text/html; charset=utf-8 \n"; 
$headers .= "From: Formulario de contato\n"; 

// Destinatário do email
$para = "recievemailcont@ismaeljose.site";

// Definindo o aspecto da mensagem
$mensagem   = '<div style="display: block; margin-bottom: 20px; font-size: 22px; background-color: black; color: orange; font-width: bold; width: 100%; text-align: center; padding: 200px;">';
$mensagem  .= "<p>";
$mensagem  .= "<h3>De:</h3> " .$recebenome;
$mensagem  .= "</p>";
$mensagem  .= "<p>";
$mensagem  .= 'E-mail: '.$recebemail;
$mensagem  .= "</p>";
$mensagem  .= "<h3>Observações</h3>";
$mensagem  .= "<p>";
$mensagem  .= $recebemsg;
$mensagem  .= "</p>";
$mensagem   .= "</div>";

// Enviando a mensagem para o destinatário
mail($para,'Contato - Ismael José: '.$recebenome,$mensagem,$headers);

// Resposta Automática, preparando o e-mail com a resposta.
$mensagem2  = "<p>Olá <strong>" . $recebenome . "</strong>.<p>Agradeço sua visita ao meu site, e a oportunidade de receber seu contato.
<br />Em breve responderei seu questionamento.</p><br><p>OBS.: Não é necessário responder esta mensagem!</p><br>";
$mensagem2 .= "<p>Atenciosamente<br />Ismael José ".$empresa."</p>";

// Enviando a resposta sutomática

$envia =  mail($recebemail,"Agradeço sua visita ao meu site",$mensagem2,$headers);

// Exibe um alert que a mensagem foi enviada com sucesso.
echo '<script>
                alert("Email válido!");history.go(-1);
                alert("Mesagem enviada com sucesso!");history.go(-1);
          </script>';
                // Exibe um alert que o email é valido.
        } 
    }
            else{
                echo '<script>
                alert("O email que você usou é invalido!");history.go(-1);
                alert("Descartando!");history.go(-1);
                </script>';
        }
}
?>