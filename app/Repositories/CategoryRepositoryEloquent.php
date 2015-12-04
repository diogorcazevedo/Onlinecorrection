<?php

namespace Onlinecorrection\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Onlinecorrection\Repositories\CategoryRepository;
use Onlinecorrection\Models\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace Onlinecorrection\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
