<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Properties\Base;
use App\Traits\PropertyTraits\IsDateTime;
use App\Types\PhpTypes;
use App\UI\ImageUrls;
use App\UI\FontAwesome;
use App\Properties\BaseProperty;
use App\Traits\PropertyTraits\IsTemporal;
class BaseLastEmailAtProperty extends BaseProperty{
	use IsDateTime;
	public $dbInput = 'datetime:nullable';
	public $dbType = \Doctrine\DBAL\Types\Types::DATETIME_MUTABLE;
	public $default = \OpenApi\Generator::UNDEFINED;
	public $description = 'last_email_at';
	public $example = '2020-02-07 16:34:15';
	public $fieldType = self::TYPE_DATETIME;
	public $fontAwesome = FontAwesome::LAST_EMAIL;
	public $format = 'date-time';
	public $htmlInput = 'date';
	public $htmlType = 'date';
	public $image = ImageUrls::LAST_EMAIL_AT;
	public $inForm = true;
	public $inIndex = true;
	public $inView = true;
	public $isFillable = true;
	public $isOrderable = true;
	public $isSearchable = false;
	public $name = self::NAME;
	public const NAME = 'last_email_at';
	public $phpType = PhpTypes::STRING;
	public $rules = 'nullable|date';
	public $title = 'Last Email';
	public $type = self::TYPE_DATETIME;
	public $canBeChangedToNull = true;
	public $validations = 'nullable|date';

}
