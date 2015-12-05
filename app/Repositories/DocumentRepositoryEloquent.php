<?php

namespace Onlinecorrection\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Onlinecorrection\Repositories\DocumentRepository;
use Onlinecorrection\Models\Document;

/**
 * Class DocumentRepositoryEloquent
 * @package namespace Onlinecorrection\Repositories;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
