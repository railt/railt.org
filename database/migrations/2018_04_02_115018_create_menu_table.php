<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMenuTable
 */
class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('language_id');
            $table->unsignedInteger('document_id')->nullable()->index();
            $table->string('urn');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('order_id')->default(0);
            $table->timestamps();

            $table->unique(['language_id', 'urn']);
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
}
