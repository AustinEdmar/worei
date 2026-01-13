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
        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // referência ao post
            $table->string('image_path'); // caminho da imagem
            $table->string('caption')->nullable(); // legenda opcional
            $table->integer('order')->default(0); // posição da imagem (opcional)
            $table->timestamps();

            // Relacionamento com posts
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade'); // apaga imagens quando o post for removido
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_images');
    }
};
