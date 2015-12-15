<?php

namespace Onlinecorrection\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Onlinecorrection\Repositories\ProjectRepository;
use Onlinecorrection\Models\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace Onlinecorrection\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{

    public function lists()
    {
        return $this->model->lists('name','id');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
