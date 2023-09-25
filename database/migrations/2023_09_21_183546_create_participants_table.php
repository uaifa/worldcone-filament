<?php

use App\Enum\AttendingStatus;
use App\Enum\ParticipantStatus;
use App\Enum\WSFSStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ticket_number')->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('wsfs_status')->default(WSFSStatus::None)->nullable();
            $table->integer('attending_status')->default(AttendingStatus::Not_attending)->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('preferred_name_first')->nullable();
            $table->string('preferred_name_last')->nullable();
            $table->string('badge')->nullable();
            $table->string('badge_title')->nullable();
            $table->tinyInteger('listing_type')->nullable();
            $table->date('dob')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('email')->nullable();
            $table->string('email_alternate')->nullable();
            $table->text('address_street')->nullable();
            $table->text('address_city')->nullable();
            $table->text('address_state')->nullable();
            $table->text('address_country')->nullable();
            $table->text('address_code')->nullable();
            $table->boolean('is_under_18')->default(false);
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_last_name')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->boolean('requests_pr')->nullable();
            $table->boolean('requests_souvenir')->nullable();
            $table->boolean('requests_minimal')->nullable();
            $table->boolean('requests_pass_along')->nullable();
            $table->boolean('requests_access')->nullable();
            $table->boolean('requests_program')->nullable();
            $table->boolean('requests_dealers')->nullable();
            $table->boolean('requests_fan_table')->nullable();
            $table->boolean('requests_exhibitor')->nullable();
            $table->boolean('requests_performer')->nullable();
            $table->boolean('requests_art_show')->nullable();
            $table->boolean('requests_volunteer')->nullable();
            $table->boolean('requests_instalment')->nullable();
            $table->unsignedTinyInteger('status')->default(ParticipantStatus::Incomplete);
            $table->decimal('amount_paid')->default(0);
            $table->decimal('amount_required')->default(0);
            $table->string('payment_source')->nullable();
            $table->string('payment_id')->nullable();
            $table->bigInteger('product_id')->nullable()->unsigned();
            $table->json('product_data')->nullable();
            $table->string('hash')->nullable()->index();
            $table->timestamps();

            // foreach(DB::table('participants')->select('ticket_number', DB::raw('min(email) as new_email'))->groupBy('ticket_number')->orderBy('ticket_number')->cursor() as $participant)
            // {
            //     DB::table('participants')->where('ticket_number', $participant->ticket_number)->update(['hash' => md5($participant->ticket_number.$participant->new_email)]);
            // }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
