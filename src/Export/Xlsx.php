<?php

declare(strict_types=1);

namespace Portofino\Export;

use Portofino\Export;
use Portofino\Payload;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class Xlsx implements Export
{
    private $payload;

    public function __construct(Payload $payload)
    {
        $this->payload = $payload;
    }

    public function value(): string
    {
        ob_start();
        (new XlsxWriter($this->payload->value()))
            ->save('php://output');
        $data = ob_get_contents();
        ob_end_clean();

        return $data;
    }
}