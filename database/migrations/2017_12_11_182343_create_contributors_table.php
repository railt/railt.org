<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('contributors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('github_id')->unique();
            $table->string('login');
            $table->string('url');
            $table->string('avatar');
            $table->unsignedInteger('contributions')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('contributors');
    }
}
