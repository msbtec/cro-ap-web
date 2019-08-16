<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Noticia
    Route::post('noticia/media', 'NoticiasApiController@storeMedia')->name('noticia.storeMedia');
    Route::apiResource('noticia', 'NoticiasApiController');

    // Eventos
    Route::post('eventos/media', 'EventosApiController@storeMedia')->name('eventos.storeMedia');
    Route::apiResource('eventos', 'EventosApiController');

    // Informacos
    Route::post('informacos/media', 'InformacoesApiController@storeMedia')->name('informacos.storeMedia');
    Route::apiResource('informacos', 'InformacoesApiController');

    // Categoria
    Route::apiResource('categoria', 'CategoriaApiController');

    // Parceiros
    Route::apiResource('parceiros', 'ParceiroApiController');

    // Habilitacaos
    Route::apiResource('habilitacaos', 'HabilitacaoApiController');

    // Especialidades
    Route::apiResource('especialidades', 'EspecialidadeApiController');

    // Profissionals
    Route::post('profissionals/media', 'ProfissionalApiController@storeMedia')->name('profissionals.storeMedia');
    Route::apiResource('profissionals', 'ProfissionalApiController');

    // Categoriaprofissionals
    Route::apiResource('categoria-profissionals', 'CategoriaProfissionalApiController');

    // Municipios
    Route::apiResource('municipios', 'MunicipioApiController');
});
