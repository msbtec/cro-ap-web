<?php


//Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
  Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
  
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');
    Route::post('user', 'UsersApiController@getDados');

    // Noticia
    Route::post('noticia/media', 'NoticiasApiController@storeMedia')->name('noticia.storeMedia');
    Route::apiResource('noticia', 'NoticiasApiController');
    Route::get('noticias/{pag}', 'NoticiasApiController@getNoticias');
    Route::get('noticias_home', 'NoticiasApiController@index_home');
    
    // Eventos
    Route::post('eventos/media', 'EventosApiController@storeMedia')->name('eventos.storeMedia');
    Route::apiResource('eventos', 'EventosApiController');
    Route::get('eventos_home', 'EventosApiController@index_app');

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
    Route::get('carteirinha/{id}','ProfissionalApiController@getCarteirinha');
    Route::get('carteirinha_show/{id}','ProfissionalApiController@carteirinha_show');

    // Categoriaprofissionals
    Route::apiResource('categoria-profissionals', 'CategoriaProfissionalApiController');

    // Municipios
    Route::apiResource('municipios', 'MunicipioApiController');

        // Denuncia
    Route::apiResource('denuncia', 'DenunciaApiController');

    // Nota
    Route::post('nota/media', 'NotaApiController@storeMedia')->name('nota.storeMedia');
    Route::apiResource('nota', 'NotaApiController');

    // Mensagems
    Route::apiResource('mensagem', 'MensagemApiController');
    
});
