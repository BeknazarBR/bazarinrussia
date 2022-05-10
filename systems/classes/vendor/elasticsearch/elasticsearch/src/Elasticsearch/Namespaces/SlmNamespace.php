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

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class SlmNamespace
 * Generated running $ php util/GenerateEndpoints.php 7.9
 */
class SlmNamespace extends AbstractNamespace
{

    /**
     * $params['policy_id'] = (string) The id of the snapshot lifecycle policy to remove
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-delete-policy.html
     */
    public function deleteLifecycle(array $params = [])
    {
        $policy_id = $this->extractArgument($params, 'policy_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\DeleteLifecycle');
        $endpoint->setParams($params);
        $endpoint->setPolicyId($policy_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['policy_id'] = (string) The id of the snapshot lifecycle policy to be executed
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-execute-lifecycle.html
     */
    public function executeLifecycle(array $params = [])
    {
        $policy_id = $this->extractArgument($params, 'policy_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\ExecuteLifecycle');
        $endpoint->setParams($params);
        $endpoint->setPolicyId($policy_id);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-execute-retention.html
     */
    public function executeRetention(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\ExecuteRetention');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['policy_id'] = (list) Comma-separated list of snapshot lifecycle policies to retrieve
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-get-policy.html
     */
    public function getLifecycle(array $params = [])
    {
        $policy_id = $this->extractArgument($params, 'policy_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\GetLifecycle');
        $endpoint->setParams($params);
        $endpoint->setPolicyId($policy_id);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/slm-api-get-stats.html
     */
    public function getStats(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\GetStats');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-get-status.html
     */
    public function getStatus(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\GetStatus');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['policy_id'] = (string) The id of the snapshot lifecycle policy
     * $params['body']      = (array) The snapshot lifecycle policy definition to register
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-put-policy.html
     */
    public function putLifecycle(array $params = [])
    {
        $policy_id = $this->extractArgument($params, 'policy_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\PutLifecycle');
        $endpoint->setParams($params);
        $endpoint->setPolicyId($policy_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-start.html
     */
    public function start(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\Start');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/slm-api-stop.html
     */
    public function stop(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Slm\Stop');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
