<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\KnowledgeBaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('chat');
});

Route::post('/query', [ChatbotController::class, 'query']);
Route::get('/knowledge_base', [KnowledgeBaseController::class, 'create'])->name('knowledge_base.create');
Route::post('/knowledge_base', [KnowledgeBaseController::class, 'store'])->name('knowledge_base.store');
