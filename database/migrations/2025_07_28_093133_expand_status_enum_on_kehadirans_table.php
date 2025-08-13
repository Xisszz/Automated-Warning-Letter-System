<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExpandStatusEnumOnKehadiransTable extends Migration
{
    public function up()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            // redefine as ENUM(present,absent,late,other)
            $table->enum('status', ['present', 'absent', 'late', 'other'])
                ->default('present')
                ->change();
        });
    }

    public function down()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            // revert back if needed
            $table->enum('status', ['present', 'absent', 'late'])
                ->default('present')
                ->change();
        });
    }
}
