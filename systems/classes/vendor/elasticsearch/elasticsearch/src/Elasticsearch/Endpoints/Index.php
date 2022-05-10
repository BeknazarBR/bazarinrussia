<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elasticsearch\Endpoints;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class Index
 * Elasticsearch API name index
 * Generated running $ php util/GenerateEndpoints.php 7.9
 */
class Index extends AbstractEndpoint
{

    public function getURI(): string
    {
        if (isset($this->index) !== true) {
            throw new RuntimeException(
                'index is required for index'
            );
        }
        $index = $this->index;
        $id = $this->id ?? null;
        $type = $this->type ?? null;
        if (isset($type)) {
            @trigger_error('Specifying types in urls has been deprecated', E_USER_DEPRECATED);
        }

        if (isset($type) && isset($id)) {
            return "/$index/$type/$id";
        }
        if (isset($id)) {
            return "/$index/_doc/$id";
        }
        if (isset($type)) {
            return "/$index/$type";
        }
        return "/$index/_doc";
    }

    public function getParamWhitelist(): array
    {
        return [
            'wait_for_active_shards',
            'op_type',
            'refresh',
            'routing',
            'timeout',
            'version',
            'version_type',
            'if_seq_no',
            'if_primary_term',
            'pipeline'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setBody($body): Index
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }
}
