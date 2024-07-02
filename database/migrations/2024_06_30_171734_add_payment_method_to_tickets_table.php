<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentMethodToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->enum('payment_method', ['cash', 'tf'])->default('cash');
            $table->decimal('total', 10, 2)->after('bukti_pembayaran')->nullable();

        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('total');

        });
    }
}
