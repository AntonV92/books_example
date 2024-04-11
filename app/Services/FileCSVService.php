<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * @class FileCSVService
 */
class FileCSVService
{
    /**
     * @param $data
     * @param string $fileName
     * @return StreamedResponse
     */
    public static function getExportFileStream($data, string $fileName): StreamedResponse
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => sprintf("attachment; filename=%s", $fileName),
            "Cache-Control" => "no-cache",
            "Location" => 'books'
        ];

        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            foreach ($data as $line) {
                fputcsv($file, $line);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
