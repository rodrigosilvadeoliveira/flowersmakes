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

if (isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
    $inicio = $_POST['data_inicio'];
    $fim = $_POST['data_fim'];

$sql = "SELECT * FROM pagamento WHERE datas BETWEEN '$inicio' AND '$fim'";
$result = $conexao->query($sql);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Defina o cabeçalho da tabela
$sheet->setCellValue('A1', 'id');
$sheet->setCellValue('B1', 'tipodePagamento');
$sheet->setCellValue('C1', 'valorTotal');
$sheet->setCellValue('D1', 'datas');
$sheet->setCellValue('E1', 'hora');
$sheet->setCellValue('F1', 'Obs');
$sheet->setCellValue('G1', 'Total Vendas');

$sheet->setCellValue('J1', 'Kau 45%');
$sheet->setCellValue('K1', 'Vania 45%');
$sheet->setCellValue('L1', 'Rodrigo 10%');
$sheet->setCellValue('M1', 'Loja');
$sheet->setCellValue('M2', '=P2-G2');
$sheet->setCellValue('G2', '=SUM(C2:B999)');
$sheet->setCellValue('J2', '=P2*45/100');
$sheet->setCellValue('K2', '=P2*45/100');
$sheet->setCellValue('L2', '=P2*10/100');
$sheet->setCellValue('N1', 'Caixa');

$sheet->setCellValue('P1', 'Lucro');

//Estilo da celula
$styles = [
    'font' => [
        'bold' => true,
        'color' => [
            'rgb' => ''
        ],
        'size' => 10,
        'name' => 'Caimbra'
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    
];

//Define o estilo da Celula cabeçalho
$sheet->getStyle('A1:S1')->applyFromArray($styles);

// Preencha os valores da tabela
if ($result) {
    $row = 2;
    while ($row_data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $row_data['id']);
    $sheet->setCellValue('B' . $row, $row_data['tipodePagamento']);
    $sheet->setCellValue('C' . $row, $row_data['valorTotal']);
    $sheet->setCellValue('D' . $row, $row_data['datas']);
    $sheet->setCellValue('E' . $row, $row_data['hora']);
    $sheet->setCellValue('F' . $row, $row_data['obs']);
    $row++;
}
}else {
    echo "Por favor, selecione as datas.";
}

// Defina o cabeçalho do arquivo para download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="fechamento_vendas.xlsx"');
header('Cache-Control: max-age=0');

// Crie um objeto Writer para salvar o arquivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Encerre a conexão com o banco de dados
$conexao->close();
}
