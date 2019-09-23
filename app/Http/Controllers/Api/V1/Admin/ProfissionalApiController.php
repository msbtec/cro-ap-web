<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProfissionalRequest;
use App\Http\Requests\UpdateProfissionalRequest;
use App\Http\Resources\Admin\ProfissionalResource;
use App\Profissional;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfissionalApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('profissional_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$retorno = Profissional::all();

        $retorno = Profissional::whereNotNull('nome')->with(['categoria', 'municipio', 'especialidades', 'habilitacoes'])->orderBy('nome')->get();
        
        $retorno = $retorno->toArray();

        $retorno = $this->utf8_converter($retorno);

        return $retorno;
    }

    public function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
        //if(!mb_detect_dcoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        //}
    });

    return $array;
    }

    public function carteirinha_show($id) {

        return view('admin.base64.teste');

    }

    public function getCarteirinha($id){

        $imagem = imagecreatefrompng("clubecro-embranco.png");
        $cor = imagecolorallocate( $imagem, 0, 0, 0 );
        $nome = "Fulano de Tal";
        //imagestring( $imagem, 50, 500, 515, $nome, $cor );
 
        ImageTTFText ($imagem, 20, 0, 10, 40, $black, 'courbi', 'The Courier TTF font'); 
        $img = imagepng( $imagem, NULL, 9 );
        $img_ret = base64_encode($img);

    
        return view('admin.base64.teste')->with('img_b64',$img_ret);

        /*return Response::stream(function() use ($image) {
                        echo $image;
                        }, 200, array('Content-Type:image/png'));*/



    }


    public function store(StoreProfissionalRequest $request)
    {
        $profissional = Profissional::create($request->all());
        $profissional->categoria()->sync($request->input('categoria', []));
        $profissional->municipio()->sync($request->input('municipio', []));
        $profissional->especialidades()->sync($request->input('especialidades', []));
        $profissional->habilitacoes()->sync($request->input('habilitacoes', []));

        if ($request->input('foto', false)) {
            $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return (new ProfissionalResource($profissional))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Profissional $profissional)
    {
        //abort_if(Gate::denies('profissional_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfissionalResource($profissional->load(['categoria', 'municipio', 'especialidades', 'habilitacoes']));
    }

    public function update(UpdateProfissionalRequest $request, Profissional $profissional)
    {
        $profissional->update($request->all());
        $profissional->categoria()->sync($request->input('categoria', []));
        $profissional->municipio()->sync($request->input('municipio', []));
        $profissional->especialidades()->sync($request->input('especialidades', []));
        $profissional->habilitacoes()->sync($request->input('habilitacoes', []));

        if ($request->input('foto', false)) {
            if (!$profissional->foto || $request->input('foto') !== $profissional->foto->file_name) {
                $profissional->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($profissional->foto) {
            $profissional->foto->delete();
        }

        return (new ProfissionalResource($profissional))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Profissional $profissional)
    {
        abort_if(Gate::denies('profissional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profissional->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
