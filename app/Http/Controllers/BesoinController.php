<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Famille;
//use Barryvdh\DomPDF\PDF;
use App\Models\Instock;
use App\Models\Service;
use App\Models\Typefour;
use App\Models\Direction;
use App\Models\Fourniture;
use App\Models\Ssdirection;
use App\Models\Bonreception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BesoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connexion()
    {
        return view('besoin.auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $besoins = Bonreception::whereNotIn('status', [500, 100])->get();
        //dd($besoins);
        return view('besoin.index', compact('besoins'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approbation()
    {
        $besoins = Bonreception::whereIn('status', [400])->get();
        //dd($besoins);
        return view('besoin.approbation', compact('besoins'));
    }

    public function show($id)
    {
        $besoin = Bonreception::whereId($id)->first();
        //dd($besoin);
        return view('besoin.show', compact('besoin'));
    }

    public function sended(Request $request, $id){
        $besoin = Bonreception::whereId($id)->first();

        if($request->qte_send != null){

            foreach ($besoin->fournitures as $i => $fourniture){
                //dd($fourniture->id, $request->qte_send);
                $besoin->fournitures()->updateExistingPivot(['fourniture_id'=>$fourniture->id],['sent' => $request->qte_send[$i]]);
            }
            
            $besoin->treatBy = Auth::user()->id;
            $besoin->treated_at = now();
            $besoin->status = 400; //valider par le service informatique
            $besoin->update();
            toast('Bravo! Besoin validé','success');
            return redirect()->back();
        }else{
            toast('Pas de quantité disponible','error');
            return redirect()->back();
        }
    }

    public function home()
    {
        if (session('guest')) {
            $familles = Famille::all();
            $active = 'home';
            return view('besoin.home', compact('active','familles'));
        }else{
            return $this->logout();
        }
    }

    public function validated(Request $request)
    {
        if (session('guest')) {
            # code...
            //$services = Service::all();
            if(is_numeric($request->category)){
                $types = Typefour::whereFamille_id(intval($request->category))->get();
                if(!$types->isEmpty()){
                    foreach($types as $type){
                        $articles = Fourniture::where('typefour_id',$type->id)->get();
                        $fours = Fourniture::where('typefour_id',$type->id)->get();
                    }

                    $agents = Agent::all();

                    foreach ($articles as $article) {
                        $data[] = [$article->id, $article->designation];
                    }
                    //dd($articles);
                    foreach ( $agents  as $agent) {
                        $surname = $agent->name . ' ' . $agent->surname;
                        $allAgent[] = [$agent->id, $surname];
                    }

                    $data = json_encode($data);
                    $allAgent = json_encode($allAgent);

                    $active = 'home';
                    return view('besoin.validate', compact('active', 'articles', 'agents', 'fours', 'allAgent'));

                }else{
                toast('Cette famille de fourniture n\'existe pas','error');
                return back();
            }
            }else{
                toast('OUPS! Faite un choix','error');
                return back();
            }
        }else{
            return $this->logout();
        }
    }

    public function send(Request $request)
    {
        //dd($request->all());

        $bonReception = Bonreception::create([
            "libelle" => "Besoin du ". date("d-m-Y") ."de_".$request->agent,
            "date_recep" => now(),
            "status" => 100,
            "type" => 100,
            "sender" =>  session('auth')->id,
            "agent_id" =>  $request->agent,
        ]);

        if($bonReception){
            if(request('fourniture_id') === null){
                toast('Error! Vous devez choisir quelque chose','error');
                return redirect()->back();
            }else{
                for ($i=0; $i < count(request('fourniture_id')) ; $i++) {
                    $bonReception->fournitures()->attach(request('fourniture_id')[$i], ['qte' => request('qte')[$i]]);
                }
            }
            
        }

        toast('Bravo! Besoin émit avec success','success');
        return redirect()->route('besoins.current');
    }

    public function current()
    {
        if (session('guest')) {
            $direction = Direction::whereId(session('auth')->id)->first();
            $agents = $direction->fonctions->flatMap->agents;

            return view('besoin.current')->with(['active'=>'current', 'agents'=>$agents]);
        }else{
            return $this->logout();
        }
    }

    public function history()
    {
        if (session('guest')) {
            $direction = Direction::whereId(session('auth')->id)->first();
            $agents = $direction->fonctions->flatMap->agents;

            return view('besoin.history')->with(['active'=>'history', 'agents'=>$agents]);
        }else{
            return $this->logout();
        }
    }

    public function out()
    {
        return $this->logout();
    }

    public function verify(Request $request)
    {
        $code = htmlspecialchars(htmlentities($request->code));
        
        if (Direction::wherePass($code)->count())
        {
            $direction = Direction::wherePass($code)->first();
            $agents = $direction->fonctions->flatMap->agents;
            toast('Bienvenu dans le portail de demande, n\'oubliez pas faire valider votre demande.','info');
            session(['guest' => true, 'auth'=>Direction::wherePass($code)->first(), 'agents'=>$agents, 'vip'=>false]);
            //dd(session('auth'));
            return redirect()->route('besoins.home')->with(['pass'=>false]);
        }

        if (Direction::whereVpass($code)->count())
        {
            $direction = Direction::whereVpass($code)->first();
            $agents = $direction->fonctions->flatMap->agents;
            toast('Bienvenu dans le portail de demande','info');
            session(['guest' => true, 'auth'=>Direction::whereVpass($code)->first(), 'agents'=>$agents, 'vip'=>true]);
            return redirect()->route('besoins.home')->with(['pass'=>true]);
        }
        session(['guest' => false]);
        toast('Votre code n\'est pas correct !','error');

        return back();
    }

    public function accepted($id) {
        $besoin = Bonreception::find($id);
        $besoin->status = 105; //Envoyé pour traitement
        $besoin->save();
        toast('La demande a été validé avec succès','success');
        return redirect()->back();
    }

    public function canceled($id) {
        $besoin = Bonreception::find($id);
        $besoin->status = 500; //Demande refuser
        $besoin->save();
        toast('La demande a été refusé avec succès','danger');
        return redirect()->back();
    }

    public function await($id) {
        $besoin = Bonreception::find($id);
        $besoin->status = 300; //Demande refuser
        $besoin->save();
        toast('La demande a été mise en attente','success');
        return redirect()->back();
    }

    public function terminated($id) {
        $besoin = Bonreception::find($id);
        if($besoin->count() > 1)
        {
            $instock = new Instock();
            foreach ($besoin->fournitures as $i => $fourniture) {
                //dump($fourniture->instock->qte - $fourniture->pivot->qte);
                $instock->updateOrCreate(
                    ["fourniture_id" => $fourniture->id],
                    [
                        "fourniture_id" => $fourniture->id,
                        "qte" =>  $fourniture->instock->qte - $fourniture->pivot->qte
                    ],
                );
                $besoin->status = 200; //Besoin sortie du stock
                $besoin->validated_at = Carbon::now(); //Besoin sortie du stock
                $besoin->save();
                toast('Le Besoin a été traité avec succès','success');
            }
            //dd();
        }else{
            toast('Erreur 200','error');
        }
        return redirect()->back();
    }

    public function generated_pdf($id) {
        $data = Bonreception::whereId($id)->first();
        $pdf = PDF::loadView('pdf.reception',['besoin' =>$data]);

        return $pdf->download('Bon_reception_'.$data->agent->name.'.pdf');
    }


}
