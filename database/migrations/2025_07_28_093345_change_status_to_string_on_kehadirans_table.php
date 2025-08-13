<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusToStringOnKehadiransTable extends Migration
{
    public function up()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->string('status', 100)->change();
        });
    }

    public function down()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->enum('status', ['present', 'absent', 'late'])
                ->default('present')
                ->change();
        });
    }
}
