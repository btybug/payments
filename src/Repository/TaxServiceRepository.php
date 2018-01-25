<?php
namespace BtyBugHook\Payments\Repository;

use Btybug\btybug\Repositories\GeneralRepository;
use BtyBugHook\Payments\Models\TaxService;

class TaxServiceRepository extends GeneralRepository
{
    /**
     * @return mixed
     */

    public function model()
    {
        return new TaxService();
    }
}