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

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id');
            $table->string('title')->nullable();
            $table->json('nav');
            $table->string('urn');
            $table->string('path');
            $table->string('hash')->nullable();
            $table->longText('content_original');
            $table->longText('content_rendered');
            $table->enum('type', ['Page', 'Hidden'])->default('Page');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

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
        Schema::dropIfExists('docs');
    }
}
