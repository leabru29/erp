<?php

use Illuminate\Support\Facades\Route;
use Modules\Compras\Http\Controllers\ContaPagarController;
use Modules\Compras\Http\Controllers\CotacaoController;
use Modules\Compras\Http\Controllers\FornecedorController;
use Modules\Compras\Http\Controllers\ItemCotacaoController;
use Modules\Compras\Http\Controllers\ItemPedidoCompraController;
use Modules\Compras\Http\Controllers\NotaFiscalEntradaController;
use Modules\Compras\Http\Controllers\PedidoCompraController;
use Modules\Compras\Http\Controllers\RecebimentoCompraController;

Route::prefix('v1')->group(function () {
    Route::prefix('compras')->group(function(){
        Route::apiResource('conta/pagar', ContaPagarController::class)->names('conta.pagar');
        Route::apiResource('cotacao', CotacaoController::class)->names('cotacao');
        Route::apiResource('fornecedores', FornecedorController::class)->names('fornecedores');
        Route::apiResource('item/cotacao', ItemCotacaoController::class)->names('item.cotacao');
        Route::apiResource('item/pedido', ItemPedidoCompraController::class)->names('item.pedido');
        Route::apiResource('nota/fiscal/entrada', NotaFiscalEntradaController::class)->names('nota.fiscal.entrada');
        Route::apiResource('pedido/compra', PedidoCompraController::class)->names('pedido.compra');
        Route::apiResource('recebimento/compra', RecebimentoCompraController::class)->names('recebimento.compra');
    });
});
