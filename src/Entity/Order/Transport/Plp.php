<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/submarino-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\SubmarinoSdk\Entity\Order\Transport;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Plp extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'id' => 'string',
            'codExterno' => 'string',
            'dtEnvio' => 'datetime',
            'resumoServicos' => 'array',
            'documents' => 'object',
        ];
    }

    public function getTrackingCodes()
    {
        $data = [];

        foreach ($this->getDocuments() as $document) {
            $data[$document->getDocExterno()] = $document->getTrackingCodes();
        }

        return $data;
    }
}
