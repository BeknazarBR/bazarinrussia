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

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class GetCalendarEvents
 * Elasticsearch API name ml.get_calendar_events
 * Generated running $ php util/GenerateEndpoints.php 7.9
 */
class GetCalendarEvents extends AbstractEndpoint
{
    protected $calendar_id;

    public function getURI(): string
    {
        $calendar_id = $this->calendar_id ?? null;

        if (isset($calendar_id)) {
            return "/_ml/calendars/$calendar_id/events";
        }
        throw new RuntimeException('Missing parameter for the endpoint ml.get_calendar_events');
    }

    public function getParamWhitelist(): array
    {
        return [
            'job_id',
            'start',
            'end',
            'from',
            'size'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setCalendarId($calendar_id): GetCalendarEvents
    {
        if (isset($calendar_id) !== true) {
            return $this;
        }
        $this->calendar_id = $calendar_id;

        return $this;
    }
}
