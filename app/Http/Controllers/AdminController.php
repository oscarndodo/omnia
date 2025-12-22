<?php

namespace App\Http\Controllers;

use App\Models\Congregacao;
use App\Models\Crente;
use App\Models\Evento;
use App\Models\Grupo;
use App\Models\Oferta;
use App\Models\Sector;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::orderByDesc('id')->paginate(10);
        $activos = User::where("status", true)->count();
        $inactivos = User::where("status", false)->count();

        $sectores = Sector::orderByDesc("id")->paginate();
        $congregacoes = Congregacao::orderByDesc("id")->paginate();

        foreach ($sectores as $item) {
            $item['lider'] = User::find($item->lider);
        }
        return view('admin.config', [
            'users' => $users,
            'activos' => $activos,
            'inactivos' => $inactivos,
            'sectores' => $sectores,
            'congregacoes' => $congregacoes
        ]);
    }
    public function home()
    {
        $total_crentes = Crente::count();
        $total_mulheres = Crente::where("genero", 'Feminino')->count();
        $total_homens = Crente::where("genero", 'Masculino')->count();
        $total_batizados = Crente::where("batizado", true)->count();
        $total_grupos = Grupo::count();

        $ofertas = Oferta::all();
        $total_ofertas = 0.0;
        $total_oferta = 0.0;
        $total_dizimo = 0.0;

        foreach ($ofertas as $item) {
            $total_ofertas += floatval($item['valor']);
            if ($item['tipo'] == "Dizimo") {
                $total_dizimo += floatval($item['valor']);
            } else {
                $total_oferta += floatval($item['valor']);
            }
        }


        /*
            |--------------------------------------------------------------------------
            | DISTRIBUIÇÃO POR FAIXA ETÁRIA (BASEADO EM DATA DE NASCIMENTO)
            |--------------------------------------------------------------------------
        */
        $faixas = [
            '0-12'  => [0, 12],
            '13-18' => [13, 18],
            '19-25' => [19, 25],
            '26-35' => [26, 35],
            '36-45' => [36, 45],
            '46-55' => [46, 55],
            '56-65' => [56, 65],
            '66-75' => [66, 75],
            '75+'   => [76, 150],
        ];

        $homens = [];
        $mulheres = [];

        foreach ($faixas as $range) {

            $dataMin = now()->subYears($range[1])->startOfYear();
            $dataMax = now()->subYears($range[0])->endOfYear();

            $homens[] = Crente::whereBetween('data_nascimento', [$dataMin, $dataMax])
                ->where('genero', 'Masculino')
                ->count();

            $mulheres[] = Crente::whereBetween('data_nascimento', [$dataMin, $dataMax])
                ->where('genero', 'Feminino')
                ->count();
        }

        /*
|--------------------------------------------------------------------------
| REGISTO DE CRENTES POR MÊS (created_at)
|--------------------------------------------------------------------------
*/
        $ano = now()->year;

        $meses = [];
        $registosMensais = [];

        foreach (range(1, 12) as $mes) {

            $meses[] = Carbon::create(null, $mes, 1)->translatedFormat('M');

            $registosMensais[] = Crente::whereYear('created_at', $ano)
                ->whereMonth('created_at', $mes)
                ->count();
        }


        return view('admin.home', [
            "total_crentes" => $total_crentes,
            "total_mulheres" => $total_mulheres,
            "total_homens" => $total_homens,
            "total_batizados" => $total_batizados,
            "total_grupos" => $total_grupos,
            "total_ofertas" => $total_ofertas,
            "total_oferta" => $total_oferta,
            "total_dizimo" => $total_dizimo,
            "homens" => $homens,
            "mulheres" => $mulheres,
            'meses' => $meses,
            'registosMensais' => $registosMensais,

        ]);
    }


    public function crentes()
    {
        $crentes = Crente::orderByDesc('id')->paginate();
        return view('admin.crentes', ['crentes' => $crentes]);
    }
    public function novoCrente(Request $request)
    {
        if ($request->method() == "GET") {
            $grupos = Grupo::all();
            return view('admin.crente-novo', ['grupos' => $grupos]);
        }

        $data = $request->all();
        // dd($data);
        $grupo = Grupo::find($data['grupo']);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo familiar inválido!"]);
        }
        $grupo->crentes()->create($data);
        return Redirect::route('admin.crentes')->withErrors(['success' => "Crente criado com sucesso!"]);
    }


    public function grupos()
    {
        $users = User::all();
        $congregacoes = Congregacao::all();
        $grupos = Grupo::orderByDesc('id')->paginate();

        foreach ($grupos as $item) {
            $item['lider'] = User::find($item->lider);
            $item['congregacao'] = Congregacao::find($item->congregacao_id);
        }

        return view('admin.grupos', [
            'users' => $users,
            'congregacoes' => $congregacoes,
            'grupos' => $grupos
        ]);
    }

    public function novoGrupo(Request $request)
    {
        $data = $request->validate([
            "nome" => "required",
            "lider" => "required",
            "congregacao" => "required",
            "endereco" => "required"
        ]);

        $user = User::find($data['lider']);
        $data['lider'] = $user['id'];

        $congregacao = Congregacao::find($data['congregacao']);
        if ($congregacao == null) {
            return Redirect::back()->withErrors(['error' => "Congregação invalida!"]);
        }
        $lider = User::find($data['lider']);
        if ($lider == null) {
            return Redirect::back()->withErrors(['error' => "Líder invalido!"]);
        }
        $congregacao->grupos()->create($data);

        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }

    public function novoEvento(Request $request)
    {
        $data = $request->validate([
            "grupo_id" => "required",
            "titulo" => "required|string",
            "data" => "required|date",
            "descricao" => "nullable|string",
            "local" => "nullable|string",
            "tipo" => "nullable|string",
            "inicio" => "nullable|string",
            "termino" => "nullable|string",
        ]);


        $grupo = Grupo::find($data['grupo_id']);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo familiar inválido!"]);
        }
        $evento = $grupo->eventos()->create($data);
        foreach ($grupo->crentes as $item) {
            $evento->presenca()->create([
                "crente_id" => $item['id'],
                'status' => false
            ]);
        }
        return Redirect::back()->withErrors(['success' => "Evento criado com sucesso!"]);
    }

    public function grupo($id)
    {
        $grupo = Grupo::findOrFail($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        return view('admin.grupo.home', ['grupo' => $grupo]);
    }

    public function evento($id, $evento_id)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }

        $presentes = $evento->presenca()->count() + $evento->visitas()->count();
        $presenca = $evento->presenca()->orderByDesc("id")->paginate();
        foreach ($presenca as $item) {
            $item['data'] = $grupo->crentes()->find($item['crente_id']);
        }

        $total_ofertas = 0.0;
        foreach ($evento->ofertas as $item) {
            $total_ofertas += floatval($item['valor']);
            $item['crente'] = $grupo->crentes()->find($item['crente_id']);
            // dd($item->toArray());
        }

        return view('admin.grupo.evento', [
            'evento' => $evento,
            'presentes' => $presentes,
            'total_ofertas' => $total_ofertas,
            'presenca' => $presenca
        ]);
    }
    public function eventoDelete($id, $evento_id)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }
        $evento->ofertas()->delete();
        $evento->visitas()->delete();
        $evento->presenca()->delete();
        $evento->delete();
        return Redirect::back()->withErrors(['success' => "Evento eliminado!"]);
    }

    public function marcarPresenca($id, $evento_id, $crente_id)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }
        $crente = $evento->presenca()->find($crente_id);
        if ($crente == null) {
            return Redirect::back()->withErrors(['error' => "Crente não encontrado!"]);
        }
        $crente->status = !$crente->status;
        $crente->save();
        return Redirect::back()->withErrors(['success' => "Presenca alterada!"]);
    }

    public function oferta($id, $evento_id, Request $request)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }

        $data = $request->all();

        $crente = $evento->presenca()->find($data['crente_id']);
        // dd($data, $evento->presenca);
        if ($crente == null) {
            return Redirect::back()->withErrors(['error' => "Crente não encontrado!"]);
        }
        $evento->ofertas()->create($data);
        return Redirect::back()->withErrors(['success' => "Oferta realizada!"]);
    }
    public function ofertaDelete($id, $evento_id, $oferta_id)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }
        $oferta = $evento->ofertas()->find($oferta_id);
        if ($oferta == null) {
            return Redirect::back()->withErrors(['error' => "Oferta não encontrada!"]);
        }
        $oferta->delete();
        return Redirect::back()->withErrors(['success' => "Oferta eliminada!"]);
    }

    public function visita($id, $evento_id, Request $request)
    {
        $grupo = Grupo::find($id);
        if ($grupo == null) {
            return Redirect::back()->withErrors(['error' => "Grupo não encontrado!!"]);
        }
        $evento = $grupo->eventos()->find($evento_id);
        if ($evento == null) {
            return Redirect::back()->withErrors(['error' => "Evento não encontrado!"]);
        }

        $data = $request->all();

        $evento->visitas()->create($data);
        return Redirect::back()->withErrors(['success' => "Visitante cadastrado!"]);
    }

    public function eventos()
    {
        $eventos = Evento::orderByDesc('id')->paginate();
        return view('admin.eventos', ['eventos' => $eventos]);
    }

    public function batizados()
    {
        $batizados = Crente::where("batizado", true)->orderByDesc('id')->paginate();
        return view('admin.batizados', ['batizados' => $batizados]);
    }

    public function dizimistas()
    {
        $dizimistas = Oferta::where('tipo', 'dizimo')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->orderByDesc('id')
            ->paginate();

        foreach ($dizimistas as $item) {
            $item['data'] = Crente::find($item->crente_id);
        }

        return view('admin.dizimistas', [
            'dizimistas' => $dizimistas
        ]);
    }

    public function config()
    {
        $users = User::orderByDesc('id')->paginate(10);
        $activos = User::where("status", true)->count();
        $inactivos = User::where("status", false)->count();

        $sectores = Sector::orderByDesc("id")->paginate();
        $congregacoes = Congregacao::orderByDesc("id")->paginate();

        foreach ($sectores as $item) {
            $item['lider'] = User::find($item->lider);
        }
        return view('admin.config', [
            'users' => $users,
            'activos' => $activos,
            'inactivos' => $inactivos,
            'sectores' => $sectores,
            'congregacoes' => $congregacoes
        ]);
    }

    public function novoUsuario(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3',
            'phone' => 'nullable|string|min:9',
            'role' => 'required|string'
        ]);

        $data['password'] = "123456"; // Default password, should be changed later

        User::class::create($data);
        return Redirect::route('admin.config');
    }
    public function usuarioStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return Redirect::route('admin.config');
    }

    public function novoSector(Request $request)
    {
        $data = $request->validate([
            "nome" => "required",
            "lider" => "required"
        ]);
        $user = User::find($data['lider']);
        $data['lider'] = $user['id'];

        Sector::create($data);
        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }

    public function novaCongregacao(Request $request)
    {
        $data = $request->all();

        $sector = Sector::find($data['sector_id']);
        if ($sector == null) return Redirect::back()->withErrors(['error' => "Sector invalido!"]);
        $congregacao = $sector->congregacoes()->create($data);
        return Redirect::back()->withErrors(['success' => "Sector criado com sucesso!"]);
    }
}
