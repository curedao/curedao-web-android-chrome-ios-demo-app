<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Properties\GithubRepository;
use App\Models\GithubRepository;
use App\Traits\PropertyTraits\GithubRepositoryProperty;
use App\Properties\Base\BasePullsUrlProperty;
class GithubRepositoryPullsUrlProperty extends BasePullsUrlProperty
{
    use GithubRepositoryProperty;
    public $table = GithubRepository::TABLE;
    public $parentClass = GithubRepository::class;
}
