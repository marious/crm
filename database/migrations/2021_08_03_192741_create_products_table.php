<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('product_type', 50);
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->tinyInteger('taxable')->default(0);
            $table->string('tax_type');
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('unit_id')->references('id')->on('product_units');
            $table->foreign('brand_id')->references('id')->on('product_brands');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('tax_id')->references('id')->on('taxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
