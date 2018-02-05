<?php

namespace BtyBugHook\Payments\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Payments\Models\Attributes;
use BtyBugHook\Payments\Models\AttributeTerms;

class AttributeTermsRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model ()
    {
        return new AttributeTerms();
    }
}