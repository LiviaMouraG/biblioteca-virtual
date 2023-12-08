
<?php
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

// Inclua o conteúdo HTML das páginas
ob_start();
include 'livro.php';
$htmlPage1 = ob_get_clean();

ob_start();
include 'usuario.php';
$htmlPage2 = ob_get_clean();

// Concatene o conteúdo HTML
$htmlContent = $htmlPage1 . $htmlPage2;

$dompdf->loadHtml($htmlContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Nome do arquivo PDF gerado
$filename = 'usuários e livros.pdf';

// Salve o PDF no servidor
$output = $dompdf->output();
file_put_contents($filename, $output);

// Link para o download automático
?>

