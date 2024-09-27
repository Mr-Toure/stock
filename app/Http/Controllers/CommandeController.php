<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Famille;
use App\Models\Instock;
use App\Models\Commande;
use App\Models\Typefour;
use App\Models\Fourniture;
use App\Models\Fournisseur;
use App\Models\Bonlivraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CommandeController
 * @package App\Http\Controllers
 */
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::where('status', 0)->orderBy('created_at', 'desc')->paginate();

        return view('commandes.index', compact('commandes'))
            ->with('i', (request()->input('page', 1) - 1) * $commandes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commande = new Commande();
        $familles = Famille::pluck('libelle', 'id');
        $fournisseurs = Fournisseur::pluck('name', 'id');
        $fours = Fourniture::with('typefour', 'famille');
        $display_step1 = 'true';
        $display_step2 = 'd-none';
        return view('commandes.create', compact('commande', 'familles', 'fournisseurs', 'fours', 'display_step1', 'display_step2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        if(request('step') == 1){
            $_SESSION['famille_id'] = request('famille_id');
            $_SESSION['fournisseur_id'] = request('fournisseur_id');
            $commande = new Commande();
            $familles = Famille::pluck('libelle', 'id');
            $fournisseurs = Fournisseur::pluck('name', 'id');
            $fournitures = Fourniture::with('typefour.famille')->get();
            foreach ($fournitures as $fourniture) {
                //dd(request('famille_id'));
                if($fourniture?->typefour?->famille?->id == request('famille_id')){
                    $fours[] = $fourniture;
                }
                //dump($fourniture->typefour->famille->id == request('famille_id');
            }
            //dd($fournisseurs);
            //dd($fours);
            $display_step2 = '';
            $display_step1 = 'd-none';
            return view('commandes.create', compact('commande', 'familles', 'fournisseurs', 'fours', 'display_step1', 'display_step2'));
        }elseif(request('step') == 2){
            //dd(request()->all());
            DB::transaction(function () use ($request): void {
                $commande = Commande::create([
                    "libelle" => "COMMANDE DU " . date("d-m-Y"),
                    "fournisseur_id" =>  $_SESSION['fournisseur_id'],
                    "famille_id" =>  $_SESSION['famille_id'],
                    "user_id" =>  Auth::user()->id,
                    "date_com" =>  now(),
                ]);

                if($commande){
                    for ($i=0; $i < count(request('fourniture_id')) ; $i++) {
                        $commande->fournitures()->attach(request('fourniture_id')[$i], ['qte' => request('qte')[$i]]);
                    }
                }
            });
        }else{
            redirect()->route('/');
        }
        /*  request()->validate(Commande::$rules);

        $commande = Commande::create($request->all());*/
        return redirect()->route('commandes.index')
        ->with('success', 'Commande created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande = Commande::find($id);
        //dd( $commande->fournitures()->whereQte(50));
        return view('commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function livraison(Commande $commande)
    {
        return view('commandes.edit', compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Commande $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        // Validation des données de la requête
        $request->validate([
            'liv_qte' => 'required|array',
            'liv_qte.*' => 'required|integer|min:1', // Vérifiez que chaque quantité est valide
        ]);

        DB::transaction(function () use ($request, $commande): void {
            // Création d'un bon de livraison
            $livraison = Bonlivraison::create([
                'libelle' => 'LIVRAISON DU ' . now()->format('d-m-Y'),
                'date_liv' => now(),
                'status' => 1,
                'commande_id' => $commande->id,
                'user_id' => Auth::id(), // Utilisez Auth::id() pour simplifier
            ]);

            // Traitement des fournitures
            foreach ($commande->fournitures as $i => $fourniture) {
                // Vérification de la quantité livrée
                $quantiteLivree = $request->input('liv_qte.' . $i, 0);

                // Attacher la fourniture avec la quantité
                $livraison->fournitures()->attach($fourniture->id, ['qte' => $quantiteLivree]);

                // Mettre à jour ou créer l'entrée en stock
                Instock::updateOrCreate(
                    ['fourniture_id' => $fourniture->id],
                    ['qte' => DB::raw('qte + ' . (int)$quantiteLivree)]
                );
            }

            // Mettre à jour le statut de la commande
            $commande->status = 1;
            $commande->save();
        });

        /* request()->validate(Commande::$rules);

        $commande->update($request->all()); */

        return redirect()->route('commandes.index')
            ->with('success', 'Commande livrer avec success');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $commande = Commande::find($id)->delete();

        return redirect()->route('commandes.index')
            ->with('success', 'Commande deleted successfully');
    }
}
