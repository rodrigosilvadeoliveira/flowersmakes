<?php
// Conexão com o banco de dados (substitua as credenciais pelo seu ambiente)
include_once('config.php');
ini_set('display_errors', 1); // Exibir erros no navegador (para fins de desenvolvimento)
error_reporting(E_ALL); // Relatar todos os tipos de erro (para fins de desenvolvimento)
date_default_timezone_set('America/Sao_Paulo');

// Verifique se o ID do pedido foi fornecido na solicitação
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Atualize o status do pedido para "concluído" (ou o status desejado) no banco de dados
    $novoStatus = 'pago';
    $datas = date('Y-m-d'); // Data e hora atual
    $hora = date('H:i:s'); // Data e hora atual
    print_r($dataHora);
    print_r($hora);
    $sql = "UPDATE pagamento SET tipodePagamento = '$novoStatus' ,datas='$datas' ,hora='$hora' WHERE id = $id";
    
    if ($conexao->query($sql) === TRUE) {
        // Envie um cabeçalho de resposta para informar ao JavaScript que a atualização foi bem-sucedida
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);

        // Feche a conexão com o banco de dados
        $conexao->close();
    } else {
        echo "Erro ao atualizar o status do pedido: " . $conexao->error;
    }
} else {
    echo "ID do pedido não fornecido na solicitação.";
}
?>
