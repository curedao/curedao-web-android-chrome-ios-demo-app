<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Properties\Base;
use App\Traits\PropertyTraits\IsFloat;
use App\UI\ImageUrls;
use App\UI\FontAwesome;
class BaseCommonMinimumAllowedNonZeroValueProperty extends BaseValueProperty{
	use IsFloat;
	public $dbInput = 'float,10,0';
	public $dbType = 'float';
	public $default = \OpenApi\Generator::UNDEFINED;
	public $description = 'The minimum reasonable non-zero value for this variable';
	public $fieldType = 'float';
	public $fontAwesome = FontAwesome::COMMON_TAG;
	public $htmlType = self::TYPE_NUMBER;
	public $image = ImageUrls::COMMON_TAG;
	public $isOrderable = true;
    public $minimum = 0.00000000000000000000000000000000001;
	public $isSearchable = false;
	public $name = self::NAME;
	public const NAME = 'common_minimum_allowed_non_zero_value';
	public $phpType = 'float';
	public $rules = 'nullable|numeric';
	public $title = 'Common Minimum Allowed Non Zero Value';
	public $type = self::TYPE_NUMBER;
	public $canBeChangedToNull = true;
	public $validations = 'nullable|numeric';

}
