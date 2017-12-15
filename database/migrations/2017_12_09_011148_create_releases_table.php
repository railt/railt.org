<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('version');
            $table->unsignedInteger('component_id');
            $table->longText('content_original')->nullable();
            $table->longText('content_rendered')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->unique(['version', 'component_id']);

            $table->foreign('component_id')
                ->references('id')
                ->on('components')
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
        Schema::dropIfExists('releases');
    }
}
