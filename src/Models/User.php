<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 11.01.2018
 * Time: 13:30
 */

namespace BtyBugHook\Payments\Models;

use Laravel\Cashier\Billable;

class User extends \Btybug\User\User
{
    use Billable;

}