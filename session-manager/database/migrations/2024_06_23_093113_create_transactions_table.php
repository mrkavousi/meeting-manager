<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accounting_book_id');
            $table->string('type'); // 'income' یا 'expense'
            $table->decimal('amount', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('accounting_book_id')->references('id')->on('accounting_books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
