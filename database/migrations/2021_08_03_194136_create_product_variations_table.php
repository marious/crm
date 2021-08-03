<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('sku')->unique()->nullable();
            $table->string('variant_title')->nullable();
            $table->string('attribute_values')->nullable();
            $table->string('variant_details')->nullable();
            $table->double('purchase_price', 20,2);
            $table->double('selling_price', 20,2);
            $table->boolean('enabled')->default(1);
            $table->string('isNotify')->nullable();
            $table->string('image_url')->default('no_image.png');
            $table->string('bar_code_type')->nullable();
            $table->text('bar_code')->nullable();
            $table->integer('re_order')->nullable();

            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
}
