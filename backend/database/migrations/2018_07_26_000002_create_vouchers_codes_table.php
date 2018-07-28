<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersCodesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vouchers_codes';

    /**
     * Run the migrations.
     * @table vouchers_codes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('offer_id');
            $table->integer('recipient_id');
            $table->string('code', 45);
            $table->timestamp('expiration_date');
            $table->tinyInteger('active')->default('1');
            $table->timestamp('date_usage')->nullable();

            $table->index(["offer_id"], 'fk_special_offers_has_recipients_special_offers_idx');

            $table->index(["recipient_id"], 'fk_special_offers_has_recipients_recipients1_idx');

            $table->unique(["code"], 'code_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('offer_id', 'fk_special_offers_has_recipients_special_offers_idx')
                ->references('id')->on('specials_offers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('recipient_id', 'fk_special_offers_has_recipients_recipients1_idx')
                ->references('id')->on('recipients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
