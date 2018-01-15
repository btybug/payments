<?php
namespace BtyBugHook\Payments\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Payments\Models\Attributes;

class AttributesRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model()
    {
        return new Attributes();
    }
}