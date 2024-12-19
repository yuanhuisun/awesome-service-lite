<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique(); //type+id (INC, SR, PR, CR)
            $table->string('title');
            $table->string('type');             // incident, service request, problem request, change request
            $table->string('sub_type')->nullable();
            $table->tinyInteger('source')->nullable(); // Source of ticket: Admin Portal (1), Mobile Admin Portal (2), Phone Call (3), End-User Portal (4), Agent (5), Email Integration (6), Monitoring (7), Task (8), Chat (9), External Agent (10), Reminder (11), Manually from Chat (12), Password Services (13)
            $table->string('description');
            $table->string('request_by');
            $table->tinyInteger("requester_type")->nullable();   // 1-Auto created by AI agent, 2-support team, 3-end user
            $table->timestamp('request_at')->nullable();
            $table->string('create_by');
            //$table->timestamp('create_at');
            $table->tinyInteger('priority');    // ticket priority. 1-P1, 2-P2, 3-P3, 4-P4
            $table->string('workaround')->nullable();
            $table->string('resolution')->nullable();
            $table->string('updated_by')->nullable();
            //$table->timestamp('updated_at')->nullable();
            $table->string('close_by')->nullable();
            $table->timestamp('close_at')->nullable();
            $table->integer('reopen_count')->nullable();
            $table->string('status');           // status: Open, Assigned, Fixed, Validated, Closed, Re-Open
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
