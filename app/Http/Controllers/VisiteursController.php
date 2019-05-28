<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visiteur;
use App\Sexe;
use App\Classe;
use App\Province;
use App\Commune;
use App\Division;
use App\Service;
use App\Demande;
use App\Commandement;
use App\CommuneLocal;
use App\Pay;
use App\ServiceExt;
use App\Statut;
use App\Theme;
use App\Type;

class VisiteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visiteurs.index')
                                    ->with('visiteurs' , Visiteur::all());
                                   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visiteurs.create')
                                     ->with('sexes' , Sexe::all())
                                     ->with('classes' , Classe::all())
                                     ->with('pays' , Pay::all())
                                     ->with('serviceexts' , ServiceExt::all())
                                     ->with('status' , Statut::all())
                                     ->with('themes' , Theme::all())
                                     ->with('types' , Type::all())
                                     ->with('provinces' , Province::pluck("provinceFr","id"))
                                     ->with('divisions' , Division::pluck("nomDivisionFr","id"))
                                     ->with('commandements' , Commandement::pluck("commandementFr","id"));
    }

    /**              
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'numCIN' => 'required',
            'nomAr' => 'required',
            'prenomAr' => 'required',
            'prenomFR' => 'required',
            'nomFR' => 'required'
            
          ]);

          Visiteur::create([
            'nomAr' => $request->nomAr,
            'prenomAr' => $request->prenomAr,
            'nomFR' => $request->nomFR,
            'prenomFR' => $request->prenomFR,
            'numCIN' => $request->numCIN,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            'sexe_id' => $request->sexe,
            'classe_id' => $request->classe,
            'pay_id' => $request->pay,
            'commune_id' => $request->commune,
          ]);
          Demande::create([

            'numOrdre' => $request->numOrdre,
            'objet' => $request->objet,
            'dateVisite' => $request->dateVisite,
            'heurEntree' => $request->heurEntree,
            'heurSortie' => $request->heurSortie,
            'theme_id' => $request->theme,
            'statu_id' => $request->statu,
            'type_id' => $request->type,
            'division_id' => $request->division,
            'service_id' => $request->service,
            'commune_id' => $request->communeLocal,
            'sExt_id' => $request->sExt,
            'remarque' => $request->remarque,
            'serviceSuppl' => $request->serviceSuppl,
            'commandement_id' => $request->commandement,
            'nbrVisiteur' => $request->nbrVisiteur,
           
        ]);

        
          return redirect(route('visiteurs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visiteur $visiteur , Demande $demande)
    {
        return view('visiteurs.create')
                                ->with('visiteur' , $visiteur ,'demande' , $demande)
                              
                                ->with('sexes' , Sexe::all())
                                ->with('classes' , Classe::all())
                                ->with('pays' , Pay::all())
                                ->with('serviceexts' , ServiceExt::all())
                                ->with('status' , Statut::all())
                                ->with('themes' , Theme::all())
                                ->with('types' , Type::all())
                                ->with('provinces' , Province::pluck("provinceFr","id"))
                                ->with('divisions' , Division::pluck("nomDivisionFr","id"))
                                ->with('commandements' , Commandement::pluck("commandementFr","id"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visiteur $visiteur, Demande $demande)
    {
     
        $this->validate($request,[
            'numCIN' => 'required',
            'nomAr' => 'required',
            'prenomAr' => 'required',
            'prenomFR' => 'required',
            'nomFR' => 'required'
            
          ]);
        

        $visiteur->update([

            'nomAr' => $request->nomAr,
            'prenomAr' => $request->prenomAr,
            'nomFR' => $request->nomFR,
            'prenomFR' => $request->prenomFR,
            'numCIN' => $request->numCIN,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'dateNaissance' => $request->dateNaissance,
            'sexe_id' => $request->sexe,
            'classe_id' => $request->classe,
            'pay_id' => $request->pay,
            'commune_id' => $request->commune,
            

        ]);

        $demande->update([

            'numOrdre' => $request->numOrdre,
            'objet' => $request->objet,
            'dateVisite' => $request->dateVisite,
            'heurEntree' => $request->heurEntree,
            'heurSortie' => $request->heurSortie,
            'theme_id' => $request->theme,
            'statu_id' => $request->statu,
            'type_id' => $request->type,
            'division_id' => $request->division,
            'service_id' => $request->service,
            'commune_id' => $request->communeLocal,
            'sExt_id' => $request->sExt,
            'remarque' => $request->remarque,
            'serviceSuppl' => $request->serviceSuppl,
            'commandement_id' => $request->commandement,
            'nbrVisiteur' => $request->nbrVisiteur,
           
        ]);
        
        
        


        return redirect(route('visiteurs.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCommunes($id) {
        
        $communes = Commune::where("province_id",$id)->pluck("nomCommuneFr","id");
            
        return json_encode($communes);

    }

    public function getServices($id) {

        $services = Service::where("division_id",$id)->pluck("nomServiceFr","id");

        return json_encode($services);

        //$services = Service::where('division_id',$id)->get();
        //return response()->json($services); 

    }

    public function getCommandements($id) {
        
        $communeslocal = CommuneLocal::where("commandement_id",$id)->pluck("nomCommuneFr","id");
            
        return json_encode($communeslocal);

    }
    
    
}
