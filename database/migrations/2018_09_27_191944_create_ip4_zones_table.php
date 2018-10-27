<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateIp4ZonesTable
 */
class CreateIp4ZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws \Throwable
     * @throws \Exception
     */
    public function up()
    {
        Schema::create('ip4_zones', function (Blueprint $t) {
            $t->increments('id');
            $t->unsignedInteger('country_id')->nullable();
            $t->unsignedBigInteger('ip_from');
            $t->unsignedBigInteger('ip_to');

            $t->unique(['ip_from', 'ip_to']);

            $t->foreign('country_id')
                ->references('id')
                ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ip4_zones');
    }
}
