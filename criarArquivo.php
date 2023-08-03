<?php
//Autoload do composer
require __DIR__.'/vendor/autoload.php';

// Dependências do projeto
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'cadastro';

// Estabelecer a conexão com o banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}

// Consulta SQL para obter os dados
$sql = "SELECT id, barra, produto, marca, caracteristicas, valordevenda, qtdcomprada, valordecompra, usuario, data_hora, obs FROM vendas";
$result = $conexao->query($sql);
if (!$result) {
    // Caso a consulta não tenha retornado resultados ou ocorrido um erro
    echo "Erro na consulta SQL: " . $conexao->error;
}

// Crie uma nova planilha Excel
$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();

// Defina o cabeçalho da tabela
$activeWorksheet->setCellValue('A1', 'id');
$activeWorksheet->setCellValue('B1', 'barra');
$activeWorksheet->setCellValue('C1', 'produto');
$activeWorksheet->setCellValue('D1', 'marca');
$activeWorksheet->setCellValue('E1', 'caracteristicas');
$activeWorksheet->setCellValue('F1', 'valordevenda');
$activeWorksheet->setCellValue('G1', 'qtdcomprada');
$activeWorksheet->setCellValue('H1', 'valordecompra');
$activeWorksheet->setCellValue('I1', 'usuario');
$activeWorksheet->setCellValue('J1', 'data_hora');
$activeWorksheet->setCellValue('K1', 'obs');

// Preencha os valores da tabela
$row = 2;
while ($row_data = $result->fetch_assoc()) {
    $activeWorksheet->setCellValue('A' . $row, $row_data['id']);
    $activeWorksheet->setCellValue('B' . $row, $row_data['barra']);
    $activeWorksheet->setCellValue('C' . $row, $row_data['produto']);
    $activeWorksheet->setCellValue('D' . $row, $row_data['marca']);
    $activeWorksheet->setCellValue('E' . $row, $row_data['caracteristicas']);
    $activeWorksheet->setCellValue('F' . $row, $row_data['valordevenda']);
    $activeWorksheet->setCellValue('G' . $row, $row_data['qtdcomprada']);
    $activeWorksheet->setCellValue('H' . $row, $row_data['valordecompra']);
    $activeWorksheet->setCellValue('I' . $row, $row_data['usuario']);
    $activeWorksheet->setCellValue('J' . $row, $row_data['data_hora']);
    $activeWorksheet->setCellValue('K' . $row, $row_data['obs']);
    $row++;
}

// Defina o cabeçalho do arquivo para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="vendasrealizadas.xlsx"');
header('Cache-Control: max-age=0');

// Crie um objeto Writer para salvar o arquivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Encerre a conexão com o banco de dados
$conexao->close();
