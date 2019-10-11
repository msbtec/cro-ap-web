<?php

Route::group(['namespace' => 'Site','as' => 'site.'],function(){
    Route::get('/','HomeController@home')->name('home');
    Route::post('/contato','HomeController@send')->name('contact.send');

    Route::get('/schedule/details/{schedule}','ScheduleController@showSchedule');
    Route::get('noticia/{slug}','HomeController@noticia')->name('noticia');
});

View::composer(['*'],function ($view){
    $view->with('total_contact_all',\App\Contact::whereTrash(false)->get());
    $view->with('total_contact_read',\App\Contact::whereStatus(true)->whereTrash(false)->get());
    $view->with('total_contact_noread',\App\Contact::whereStatus(false)->whereTrash(false)->get());
    $view->with('total_contact_trash',\App\Contact::whereTrash(true)->get());

    $view->with('total_complaint_all',\App\Complaint::whereTrash(false)->get());
    $view->with('total_complaint_read',\App\Complaint::whereStatus(true)->whereTrash(false)->get());
    $view->with('total_complaint_noread',\App\Complaint::whereStatus(false)->whereTrash(false)->get());
    $view->with('total_complaint_trash',\App\Complaint::whereTrash(true)->get());
});

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

    // Slides
    Route::resource('slide', 'SlidesController');

    // Vídeos
    Route::resource('video', 'VideoController');

    // Agenda
    Route::resource('schedule', 'ScheduleController');

    // Transparência
    Route::resource('transparency','TransparencyController');
    Route::resource('typetransparency','TypeTransparencyController');
    Route::resource('filetransparency','FileTransparencyController');

    //CONTATOS
    Route::get('contact/all','ContactController@listAll')->name('contact.all');
    Route::get('contact/read','ContactController@listRead')->name('contact.read');
    Route::get('contact/noread','ContactController@listNoRead')->name('contact.noread');
    Route::get('contact/trash','ContactController@listTrash')->name('contact.trash');
    Route::get('contact/show/{id}','ContactController@show')->name('contact.show');
    Route::get('contact/show/trash/{id}','ContactController@showtrash')->name('contact.show-trash');
    Route::get('contact/trash/{id}','ContactController@trash')->name('contact.trashing');
    Route::get('contact/notrash/{id}','ContactController@notrash')->name('contact.notrashing');
    Route::get('contact/delete/{contact}','ContactController@destroy')->name('contact.destroy');

    //DENUNCIAS
    Route::get('complaint/all','ComplaintController@listAll')->name('complaint.all');
    Route::get('complaint/read','ComplaintController@listRead')->name('complaint.read');
    Route::get('complaint/noread','ComplaintController@listNoRead')->name('complaint.noread');
    Route::get('complaint/trash','ComplaintController@listTrash')->name('complaint.trash');
    Route::get('complaint/show/{id}','ComplaintController@show')->name('complaint.show');
    Route::get('complaint/show/trash/{id}','ComplaintController@showtrash')->name('complaint.show-trash');
    Route::get('complaint/trash/{id}','ComplaintController@trash')->name('complaint.trashing');
    Route::get('complaint/notrash/{id}','ComplaintController@notrash')->name('complaint.notrashing');
    Route::get('complaint/delete/{contact}','ComplaintController@destroy')->name('complaint.destroy');
});
