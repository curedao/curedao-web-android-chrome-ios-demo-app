<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Buttons\RelationshipButtons\VariableCategory;
use App\Buttons\RelationshipButtons\HasManyRelationshipButton;
use App\Models\GlobalVariableRelationship;
use App\Models\VariableCategory;
class VariableCategoryGlobalVariableRelationshipsWhereCauseVariableCategoryButton extends HasManyRelationshipButton {
	public $interesting = true;
	public $parentClass = VariableCategory::class;
	public $qualifiedParentKeyName = VariableCategory::TABLE . '.' . VariableCategory::FIELD_ID;
	public $relatedClass = GlobalVariableRelationship::class;
	public $methodName = 'global_variable_relationships_where_cause_variable_category';
	public $relationshipType = 'Illuminate\\Database\\Eloquent\\Relations\\HasMany';
	public $color = GlobalVariableRelationship::COLOR;
	public $fontAwesome = GlobalVariableRelationship::FONT_AWESOME;
	public $id = 'global-variable-relationships-where-cause-variable-category-button';
	public $image = GlobalVariableRelationship::DEFAULT_IMAGE;
	public $text = 'Global Variable Relationships Where Cause Variable Category';
	public $title = 'Global Variable Relationships Where Cause Variable Category';
	public $tooltip = 'Global Variable Relationships where this is the Cause Variable Category';
}
