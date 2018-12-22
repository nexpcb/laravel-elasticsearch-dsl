<?php
namespace Triadev\Es\Dsl;

use Elasticsearch\Client;
use ONGR\ElasticsearchDSL\Search as OngrSearch;
use Triadev\Es\Contract\ElasticsearchContract;
use Triadev\Es\Dsl\Contract\ElasticsearchDslContract;
use Triadev\Es\Dsl\Dsl\Search;
use Triadev\Es\Dsl\Dsl\Suggestion;

class ElasticsearchDsl implements ElasticsearchDslContract
{
    /**
     * Get es client
     *
     * @return Client
     */
    public function getEsClient(): Client
    {
        return $this->getElasticsearch()->getClient();
    }
    
    private function getElasticsearch() : ElasticsearchContract
    {
        return app(ElasticsearchContract::class);
    }
    
    /**
     * Search
     *
     * @param OngrSearch|null $search
     * @return Search
     */
    public function search(?OngrSearch $search = null): Search
    {
        return app()->makeWith(Search::class, [
            'search' => $search
        ]);
    }
    
    /**
     * Suggestion
     *
     * @param OngrSearch|null $search
     * @return Suggestion
     */
    public function suggest(?OngrSearch $search = null): Suggestion
    {
        return app()->makeWith(Suggestion::class, [
            'search' => $search
        ]);
    }
}
