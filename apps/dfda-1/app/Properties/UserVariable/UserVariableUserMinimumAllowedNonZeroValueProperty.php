<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Properties\UserVariable;
use App\Models\UserVariable;
use App\Traits\PropertyTraits\UserVariableProperty;
use App\Properties\Base\BaseUserMinimumAllowedNonZeroValueProperty;
use App\Traits\PropertyTraits\UserHyperParameterTrait;
use App\Traits\VariableValueTraits\UserVariableValuePropertyTrait;
use App\Traits\VariableValueTraits\VariableValueTrait;
class UserVariableUserMinimumAllowedNonZeroValueProperty extends BaseUserMinimumAllowedNonZeroValueProperty
{
    use UserVariableProperty, VariableValueTrait, UserHyperParameterTrait, UserVariableValuePropertyTrait;
    public $table = UserVariable::TABLE;
    public $parentClass = UserVariable::class;
}
