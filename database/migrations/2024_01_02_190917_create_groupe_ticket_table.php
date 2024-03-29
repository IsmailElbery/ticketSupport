<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('group_ticket', function (Blueprint $table) {
            $table->foreignId('ticket_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->primary(['group_id', 'ticket_id']);
        });
    }

    public function down(): void
    {
        Schema::table('group_ticket', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
            $table->dropForeign(['group_id']);
        });

        Schema::dropIfExists('group_ticket');
    }
};
