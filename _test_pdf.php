<?php

require __DIR__ . '/vendor/autoload.php';

use Barryvdh\DomPDF\Facade\Pdf;

try {
    $pdf = Pdf::loadHTML('<h1>TEST PDF</h1>');
    echo "loadHTML OK" . PHP_EOL;
    $result = $pdf->output();
    echo "output OK, length=" . strlen($result) . PHP_EOL;
} catch (Throwable $e) {
    echo "ERROR: " . get_class($e) . PHP_EOL;
    echo "Message: " . $e->getMessage() . PHP_EOL;
    echo "File: " . $e->getFile() . PHP_EOL;
    echo "Line: " . $e->getLine() . PHP_EOL;
    echo $e->getTraceAsString() . PHP_EOL;
}