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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50);
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('product_name', 60);
            $table->string('created_by', 100);
            $table->string('updated_by', 100)->nullable();
            $table->foreignId('section_id')
                ->constrained('sections')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->decimal('amount_collection', 8, 2);
            $table->decimal('commission', 8, 2);
            $table->decimal('discount', 8, 2)->nullable()->default(0.0);
            $table->string('rate_vat');
            $table->decimal('value_vat', 8, 2);
            $table->decimal('total', 8, 2);
            $table->enum('status', ['paid_invoice', 'unpaid_invoice'])->default('unpaid_invoice');
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
