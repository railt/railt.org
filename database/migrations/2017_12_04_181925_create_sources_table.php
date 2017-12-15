<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sources', function (Blueprint $table) {
            $types = ['Package', 'Component', 'Documentation', 'Common'];

            $table->increments('id');
            $table->string('user');
            $table->string('name');
            $table->string('branch')->default('master');
            $table->string('path')->default('/');
            $table->enum('type', $types)->default('Common');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
}
