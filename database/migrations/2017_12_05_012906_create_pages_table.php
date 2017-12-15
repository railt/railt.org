<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreatePagesTable
 */
class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $types = ['Content', 'Hidden', 'Menu'];

            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->string('title');
            $table->string('slug');
            $table->string('path');
            $table->string('hash', 42);
            $table->longText('content_original')->nullable();
            $table->longText('content_rendered')->nullable();
            $table->enum('type', $types)->default('Content');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->unique(['document_id', 'slug', 'type']);

            $table->foreign('document_id')
                ->references('id')
                ->on('docs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
}
