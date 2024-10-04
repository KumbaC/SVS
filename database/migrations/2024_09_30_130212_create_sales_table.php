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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Código correlativo único para la venta
            $table->foreignId('client_id')->references('id')->on('clients')->constrained()->onDelete('cascade'); //CLIENTE QUE REALIZA LA VENTA
            $table->foreignId('type_coin_id')->references('id')->on('type_coins')->constrained()->onDelete('cascade'); //TIPO DE MONEDA
            $table->decimal('amount', 10, 2); // MONTO DE LA MONEDA PRINCIPAL
            $table->decimal('amount_foreign_currency', 10, 2)->nullable(); // MONTO EN MONEDA EXTRANJERA
            $table->decimal('exchange_rate', 10, 4)->nullable(); // TASA DE CAMBIO
            $table->decimal('amount_total', 10, 2); // MONTO TOTAL DE LA VENTA
            $table->foreignId('box_id')->references('id')->on('boxes')->constrained()->onDelete('cascade'); //CAJA DONDE SE REALIZA LA VENTA
            $table->datetime('sale_date')->useCurrent(); //FECHA DE LA TRANSACCIÓN, POR DEFECTO LA FECHA ACTUAL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
