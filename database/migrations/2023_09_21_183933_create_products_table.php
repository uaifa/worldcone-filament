<?php

use App\Enum\AttendingStatus;
use App\Enum\ProductFlag;
use App\Enum\ProductStatus;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description')->nullable();
            $table->decimal('price')->default(0.00);
            $table->unsignedTinyInteger('status')->default(ProductStatus::Disabled);
            // Flags
            $table->string('attending_days')->nullable();
            $table->unsignedTinyInteger('attending_status')->default(AttendingStatus::Not_attending);
            $table->unsignedTinyInteger('age_at_con_min')->nullable();
            $table->unsignedTinyInteger('age_at_con_max')->nullable();
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_to')->nullable();
            $table->boolean('is_public')->default(true);
            $table->unsignedTinyInteger('required_wsfs_status')->nullable();
            $table->unsignedTinyInteger('requires_fullname')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_preferred_name')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_badge')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_listing')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_dob')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_employment')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_email')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_email_alternate')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_street')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_city')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_state')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_country')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('requires_code')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_pr')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_souvenir')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_minimal')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_pass_along')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_access')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_program')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_dealers')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_fan_table')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_exhibitor')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_performer')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_art_show')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_volunteer')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_instalment')->default(ProductFlag::Hidden);
            $table->unsignedTinyInteger('request_child_care')->default(ProductFlag::Hidden);
            $table->string('product_image_path')->nullable();
            $table->unsignedTinyInteger('requires_guardian_details')->default(ProductFlag::Hidden);
            $table->string('list_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
