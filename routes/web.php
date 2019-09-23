<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Noticia
    Route::delete('noticia/destroy', 'NoticiasController@massDestroy')->name('noticia.massDestroy');
    Route::post('noticia/media', 'NoticiasController@storeMedia')->name('noticia.storeMedia');
    Route::resource('noticia', 'NoticiasController');

    // Eventos
    Route::delete('eventos/destroy', 'EventosController@massDestroy')->name('eventos.massDestroy');
    Route::post('eventos/media', 'EventosController@storeMedia')->name('eventos.storeMedia');
    Route::resource('eventos', 'EventosController');

    // Informacos
    Route::delete('informacos/destroy', 'InformacoesController@massDestroy')->name('informacos.massDestroy');
    Route::post('informacos/media', 'InformacoesController@storeMedia')->name('informacos.storeMedia');
    Route::resource('informacos', 'InformacoesController');

    // Categoria
    Route::delete('categoria/destroy', 'CategoriaController@massDestroy')->name('categoria.massDestroy');
    Route::resource('categoria', 'CategoriaController');

    // Parceiros
    Route::delete('parceiros/destroy', 'ParceiroController@massDestroy')->name('parceiros.massDestroy');
    Route::resource('parceiros', 'ParceiroController');

    // Habilitacaos
    Route::delete('habilitacaos/destroy', 'HabilitacaoController@massDestroy')->name('habilitacaos.massDestroy');
    Route::resource('habilitacaos', 'HabilitacaoController');

    // Especialidades
    Route::delete('especialidades/destroy', 'EspecialidadeController@massDestroy')->name('especialidades.massDestroy');
    Route::resource('especialidades', 'EspecialidadeController');

    // Profissionals
    Route::delete('profissionals/destroy', 'ProfissionalController@massDestroy')->name('profissionals.massDestroy');
    Route::post('profissionals/media', 'ProfissionalController@storeMedia')->name('profissionals.storeMedia');
    Route::resource('profissionals', 'ProfissionalController');

    // Categoriaprofissionals
    Route::delete('categoria-profissionals/destroy', 'CategoriaProfissionalController@massDestroy')->name('categoria-profissionals.massDestroy');
    Route::resource('categoria-profissionals', 'CategoriaProfissionalController');
            
    // Municipios
    Route::delete('municipios/destroy', 'MunicipioController@massDestroy')->name('municipios.massDestroy');
    Route::resource('municipios', 'MunicipioController');



        // Denuncia
    Route::delete('denuncia/destroy', 'DenunciaController@massDestroy')->name('denuncia.massDestroy');
    Route::resource('denuncia', 'DenunciaController');

    // Nota
    Route::delete('nota/destroy', 'NotaController@massDestroy')->name('nota.massDestroy');
    Route::post('nota/media', 'NotaController@storeMedia')->name('nota.storeMedia');
    Route::resource('nota', 'NotaController');

    // Mensagems
    Route::delete('mensagems/destroy', 'MensagemController@massDestroy')->name('mensagems.massDestroy');
    Route::resource('mensagems', 'MensagemController');
});
