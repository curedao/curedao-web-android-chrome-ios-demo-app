<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCorrelationCausalityVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('correlation_causality_votes', function (Blueprint $table) {
            $table->foreign(['global_variable_relationship_id'], 'correlation_causality_votes_global_variable_relationships_id_fk')->references(['id'])->on('global_variable_relationships')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['cause_variable_id'], 'correlation_causality_votes_cause_variables_id_fk')->references(['id'])->on('variables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['client_id'], 'correlation_causality_votes_client_id_fk')->references(['client_id'])->on('oa_clients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['correlation_id'], 'correlation_causality_votes_correlations_id_fk')->references(['id'])->on('correlations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['effect_variable_id'], 'correlation_causality_votes_effect_variables_id_fk')->references(['id'])->on('variables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'correlation_causality_votes_wp_users_ID_fk')->references(['ID'])->on('wp_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('correlation_causality_votes', function (Blueprint $table) {
            $table->dropForeign('correlation_causality_votes_global_variable_relationships_id_fk');
            $table->dropForeign('correlation_causality_votes_cause_variables_id_fk');
            $table->dropForeign('correlation_causality_votes_client_id_fk');
            $table->dropForeign('correlation_causality_votes_correlations_id_fk');
            $table->dropForeign('correlation_causality_votes_effect_variables_id_fk');
            $table->dropForeign('correlation_causality_votes_wp_users_ID_fk');
        });
    }
}
