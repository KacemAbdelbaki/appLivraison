<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->string('email_client')->unique();
            $table->string('pwd_client');
            $table->string('tel_client')->nullable();
        });

        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_livreur');
            $table->string('prenom_livreur');
            $table->string('email_livreur')->unique();
            $table->string('pwd_livreur');
            $table->string('tel_livreur')->nullable();
        });

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_resto');
            $table->string('adresse_resto');
            $table->string('email_resto')->unique();
            $table->string('tel_resto')->nullable();
            $table->string('photo_resto')->nullable();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nom_menu');
            $table->string('photo_menu')->nullable();
            $table->foreignId('id_resto')->constrained('restaurants')->onDelete('cascade');
        });

        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string('nom_plat');
            $table->text('description_plat')->nullable();
            $table->decimal('prix_plat', 8, 2);
            $table->string('photo_plat')->nullable();
            $table->foreignId('id_categorie')->constrained('categories')->onDelete('cascade');
            $table->foreignId('id_menu')->constrained('menus')->onDelete('cascade');
            $table->foreignId('id_resto')->constrained('restaurants')->onDelete('cascade');
        });

        Schema::create('supplements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_supplement');
            $table->decimal('prix_supplement', 8, 2);
            $table->string('photo_supplement')->nullable();
            $table->foreignId('id_resto')->constrained('restaurants')->onDelete('cascade');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('desgnation_categorie');
            $table->string('photo_categorie')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('livreurs');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('plats');
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('supplements');
        Schema::dropIfExists('categories');
    }
};
