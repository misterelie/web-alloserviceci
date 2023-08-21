<?php

namespace App\Http\Controllers\Creat;

use App\Http\Controllers\Controller;
use App\Models\Accompagnement;
use App\Models\Article;
use App\Models\Beverage;
use App\Models\BeverageProduct;
use App\Models\Category;
use App\Models\Commande;
use App\Models\CommandeAccompagnement;
use App\Models\CommandePlat;
use App\Models\DemandePersonnel;
use App\Models\Fournisseur;
use App\Models\Menus;
use App\Models\MenusPlat;
use App\Models\OperationStock;
use App\Models\Permission;
use App\Models\Personnel;
use App\Models\Plat;
use App\Models\Role;
use App\Models\RoleMenus;
use App\Models\RolePermission;
use App\Models\RoleUser;
use App\Models\SortieStockProduit;
use App\Models\Table;
use App\Models\User;
use App\Services\Requetes\General;
use Illuminate\Support\Str;
use Image as InterventionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Operator;

class CreatController extends Controller
{
    public function modalUser()
    {
        return view('back.create.user');
    }

    public function storeUser(Request $request)
    {
        $user_email = User::where('email',$request->email)->first();
        if(is_null($user_email)){
            if (request()->file('image')) {
                $img = request()->file('image');
                $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
                $sourceimg = $img;
                $targetimg = 'back/images/avatar/' .$image;
                InterventionImage::make($sourceimg)->fit(80, 80)->save($targetimg);
            }
            
            $user = User::create([
                'slug' => Str::slug(Auth::user()->name.'-'.rand(00001, 99999).'-'.$request->last_name),
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'role_user' => $request->role_user,
                'password' => Hash::make($request['password']),
                'mdp' => $request->password,
                'photo_profile' => $image ?? '1.png'
            ]);

            return redirect()->route('utilisateur.index')->with('message', 'Utilisateur enregistée avec succès !');
        }
        else{
            return redirect()->back()->with('msg', 'Désolé le mail existe déjà !');
        }
    }
    public function modalMenusPlat()
    {
        return view('back.create.menus-plat');
    }

    public function storeMenusPlat(Request $request)
    {
        if(request()->hasFile('image')){
            $img = request()->file('image');
            $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
            $source = $img;
            $target = 'back/images/menus-plat/' .$image;
            //dd($source, $target);
            InterventionImage::make($source)->fit(87, 87)->save($target);
        }

        $menus = MenusPlat::create([
            'slug' => "Restaurant".Str::slug(Hash::make($request->token ),"-".$request->libelle),
            'libelle' => $request->libelle,
            'image' => $image ?? 'menus.jpg',
            'description' => $request->description
          ]);

        return redirect()->route('menus')->with('message', 'Menus enregisté avec succès !');

    }

    public function modalPlat()
    {
        $menus = MenusPlat::all();
        return view('back.create.plat',compact('menus'));
    }

    public function storePlat(Request $request)
    {
        if(request()->hasFile('image')){
            $img = request()->file('image');
            $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
            $source = $img;
            $target = 'back/images/plat/' .$image;
            //dd($source, $target);
            InterventionImage::make($source)->fit(87, 87)->save($target);
        }

        $plat = Plat::create([
            'menus_plat_id' => $request->menus_plat_id,
            'montant' => $request->montant,
            'libelle' => $request->libelle,
            'image' => $image ?? 'plat.jpg',
            'description' => $request->description
        ]);

        return redirect()->route('plat')->with('message', 'Plat enregisté avec succès !');

    }

    public function modalAccompagnement()
    { 
        $plats = Plat::all();
        return view('back.create.accompagnement',compact('plats'));
    }

    public function storeAccompagnement(Request $request)
    {
        // if(request()->hasFile('image')){
        //     $img = request()->file('image');
        //     $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
        //     $source = $img;
        //     $target = 'back/images/accompagnement/' .$image;
        //     //dd($source, $target);
        //     InterventionImage::make($source)->fit(87, 87)->save($target);
        // }

        $accompagnement = Accompagnement::create([
            'plat_id' => $request->plat_id,
            'montant' => $request->montant,
            'libelle' => $request->libelle,
            'description' => $request->description
        ]);

        return redirect()->route('accompagnement')->with('message', 'Accompagnement enregisté avec succès !');

    }

    public function modalTable()
    {
        return view('back.create.table');
    }

    public function storeTable(Request $request)
    {

        $table = Table::create([
            'nombre_place' => $request->nombre_place,
            'libelle' => $request->libelle,
            'description' => $request->description
        ]);

        return redirect()->route('table')->with('message', 'Table enregistée avec succès !');

    }

    public function creatCommande()
    {
        $tables = Table::all(); 
        $menus = MenusPlat::all();
        $accompagnements = Accompagnement::all();
        $plats = (new General)->platIs_visible();
        if ($plats->count('id') == 0) {
            session()->flash('msg', 'Pas de plats');
            return redirect()->back();
        }
        $beverages = Beverage::has('IsQuantityOperationStock')->get();
        return view('back.create.commande',compact('tables','menus','accompagnements',
                'plats','beverages'));
    }

    public function storeCommande(Request $request)
    {
       //dd($request);
        $validat = $request->validate([
            'table_id' => 'required', 
            'nombre_place' => 'required|integer',
            'plat_id' => 'required',
            'quantite_plat' => 'required'
        ],
        [
            'table_id.required' => 'Veuillez selectionner une table',
            'nombre_place.required' => 'Veuillez definir nombre de place',
            'plat_id.required' => 'Veuillez selectionner un plat',
            'quantite_plat.required' => 'Veuillez definir la quantité',
        ]);
        $commande = new Commande();
        $commande->user_id = Auth::user()->id;
        $commande->table_id = $request->table_id;
        $commande->nombre_place = $request->nombre_place;
        $commande->slug = Str::slug(Auth::user()->name.'-'.rand(00001, 99999).'-');
        $commande->montant = '0';
        $commande->type_commande = 'Commande';
        $commande->etat = 0;
        $commande->save();
      
        if(!is_null($request->plat_id) && count($request->plat_id)){
            for($i=0; $i < count($request->plat_id);$i++)
            {
                $plat = Plat::find($request->plat_id[$i]);
                if(!empty($request->quantite_plat[$i]) && !is_null($request->quantite_plat[$i])){
                    CommandePlat::create([
                        'montant' => ($plat->montant*$request->quantite_plat[$i]),
                        'commande_id' => $commande->id,
                        'prix' => $plat->montant,
                        'quantite' => $request->quantite_plat[$i],
                        'plat_id' => $request->plat_id[$i]
                    ]);
                }
                
            }
        }

        if(!is_null($request->accompagnement_id) && count($request->accompagnement_id)){
            for($i=0; $i < count($request->accompagnement_id);$i++)
            {
                $accompagnement = Accompagnement::find($request->accompagnement_id[$i]);
                if(!empty($request->quantite_acp[$i]) && !is_null($request->quantite_acp[$i])){
                    CommandeAccompagnement::create([
                        'montant' => ($accompagnement->montant*$request->quantite_acp[$i]),
                        'commande_id' => $commande->id,
                        'prix' => $accompagnement->montant,
                        'quantite' => $request->quantite_acp[$i],
                        'accompagnement_id' => $request->accompagnement_id[$i]
                    ]);
                }
                
            }
        }
        if(!is_null($request->beverage_id)){
            for($i=0; $i < count($request->beverage_id);$i++)
            {
                $beverage = Beverage::find($request->beverage_id[$i]);
                $qte = $request->quantite_beverage[$i] ?? 1;
                $response = $this->getIsQuatityBeverage($beverage->id,$qte);
                if($response){
                    BeverageProduct::create([
                        'montant' => ($beverage->prix_vente*$qte),
                        'commande_id' => $commande->id,
                        'prix' => $beverage->prix_vente,
                        'quantite' => $qte,
                        'beverage_id' => $request->beverage_id[$i]
                    ]);
                }
                
            }
        }
        // cacul sum commande 
        $sum = $commande->CommandePlats->sum('montant') ?? 0 + $commande->CommandeAccompagnements->sum('montant') ?? 0 + $commande->BeverageProduct->sum('montant') ?? 0;
        if($sum){
            $commande->Update([
                'montant' => $sum 
            ]);
        }

        return redirect()->route('commande.enttente')->with('message', 'Commande enregistée avec succès !');

    }

    public function findAllPlat(Request $request)
    {
        $allPlat = Plat::all();
        return response()->json($allPlat);
    }
    
    public function findAllAcp(Request $request)
    {
        $allAcp = Accompagnement::all();
        return response()->json($allAcp);
    }

    public function findAllBeverage(Request $request)
    {
        $allBeverage = Beverage::all();
        return response()->json($allBeverage);
    }

    public function modalRole()
    {
        return view('back.create.role');
    }
    public function storeRole(Request $request)
    {
        $right = Role::create([
            'libelle' => $request->libelle,
            'description' => $request->description
          ]);

        return redirect()->route('utilisateur.role')->with('message', 'Rôle enregisté avec succès !');

    }

    public function atributionMenusPermission($id)
    {
        $role = Role::find($id);
        $menus = Menus::all(); 
        return view('back.utilisateur.attribution',compact('role','menus'));

    }

    public function storeAtributionMenusPermission(Request $request, $id)
    {
        //dd($request->all());
        $role = Role::find($id);
        $menus = RoleMenus::where('role_id',$role->id)
                                ->get();
        foreach($menus as $menu){
            $menu->delete();
        }
        $permissions = RolePermission::where('role_id',$role->id)
                                ->get();
        foreach($permissions as $permission){
            $permission->delete();
        }
        if(!is_null($request->menus)){
            for($i=0; $i < count($request->menus);$i++)
            {
                $menus = Menus::find($request->menus[$i]);
                $roleMenu = RoleMenus::where('role_id',$role->id)
                                ->where('menus_id',$menus->id)
                                ->first();
                if(is_null($roleMenu)){
                    RoleMenus::create([
                        'role_id' => $role->id,
                        'menus_id' => $menus->id,
                        'libelle' => $menus->libelle
                    ]);
                }
            }
            if(!is_null($request->permission)){
                for($i=0; $i < count($request->permission);$i++)
                {
                    $getPermission = Permission::find($request->permission[$i]);
                    $permission = RolePermission::where('role_id',$role->id)
                                    ->where('permission_id',$getPermission->id)
                                    ->first();
                    if(is_null($permission)){
                        RolePermission::create([
                            'role_id' => $role->id,
                            'permission_id' => $getPermission->id,
                            'libelle' => $getPermission->libelle
                        ]);
                    }
                    
                }
            }
            return redirect()->route('utilisateur.role')->with('message', 'Permission attribuée(s) avec succès !');
        }
        else{
            return redirect()->back()->with('msg', 'Veuillez selectionner une permission !');
        }
    }

    public function findAllUser(Request $request)
    {
        $allUser = User::OrderBy('id','desc')->where('deleted',0)->get();
        return response()->json($allUser);
    }

    public function editeRoleUser($slug)
    {
        $roles = Role::all();
        $user = User::where('slug',$slug)->first();
        return view('back.utilisateur.update-role-user',compact('roles','user'));
    }

    public function updateRoleUser(Request $request)
    {
        
        if(!is_null($request->role_id)){
            $role = Role::find($request->role_id);
            $user_role = RoleUser::where('user_id',$request->user_id)
                                    ->first();
            if(is_null($user_role)){
                RoleUser::create([
                    'libelle' => $role->libelle,  
                    'user_id' => $request->user_id,
                    'role_id' => $role->id,
                ]);
            }else{
                $user_role->Update([
                    'libelle' => $role->libelle,  
                    'user_id' => $request->user_id,
                    'role_id' => $role->id,
                ]);
            }
        }

        return redirect()->route('utilisateur.index')->with('message', 'Opération effectuée avec succès !');
    }

    public function creatPersonnel()
    {
        return view('back.create.personnel');
    }

    public function storePersonnel(Request $request)
    {
        $personnel = new Personnel();
        $personnel->user_id = Auth::user()->id;
        $personnel->fonction =$request['fonction'];
        $personnel->salaire =$request['salaire'];
        $personnel->name =$request['name'];
        $personnel->prenom =$request['prenom'];
        $personnel->slug = Str::slug("$request->_token"."$request->name");
        $personnel->tel =$request['tel'];
        $personnel->service =$request['service'];
        $personnel->email =$request['email'];
        $personnel->adresse =$request['adresse'];
        $personnel->nmbre_enfant =$request['nmbre_enfant'];
        $personnel->type_piece =$request['type_piece'];
        $personnel->num_piece =$request['num_piece'];
        $personnel->birthplace =$request['birthplace'];
        $personnel->birthday =$request['birthday'];
        $personnel->commune =$request['commune'];
        $personnel->civilite =$request['civilite'];
        $personnel->nationalite =$request['nationalite'];
        $personnel->observation =$request['observation'];
        $personnel->save();

    	session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->route('personnel.index');
    }

    public function creatPermission()
    {
        $personnels = Personnel::all();
        $date_debut = \Carbon\Carbon::now()->addDays(2);
        return view('back.create.permission',compact('date_debut','personnels'));
    }

    public function storePermission(Request $request)
    {
        $date_debut= \Carbon\Carbon::parse($request->date_debut);
        $date_fin= \Carbon\Carbon::parse($request->date_fin);
        $days = $date_debut->diffInDays($date_fin);
        $days = $days + 1;
        $permission = new DemandePersonnel();
        $permission->user_id = Auth::user()->id;
        $permission->personnel_id = $request['personnel_id'];
        $permission->type_demande = 'Permission';
        $permission->motif = $request['motif'];
        $permission->date_debut = $request['date_debut'];
        $permission->date_fin = $request['date_fin'];
        $permission->heure_depart = $request['heure_depart'];
        $permission->heure_fin = $request['heure_fin'];
        $permission->deductif = $request['deductif'];
        $permission->nombre_jour = $days;
        $permission->save();

    	session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->route('personnel.permission');
    }

    public function creatConge()
    {
        $personnels = Personnel::all();
        return view('back.create.conge',compact('personnels'));
    }

    public function storeConge(Request $request)
    {
        $date_debut= \Carbon\Carbon::parse($request->date_debut);
        $date_fin= \Carbon\Carbon::parse($request->date_fin);
        $days = $date_debut->diffInDays($date_fin);
        $days = $days + 1;
        $permission = new DemandePersonnel();
        $permission->user_id = Auth::user()->id;
        $permission->personnel_id = $request['personnel_id'];
        $permission->type_demande = 'Conge';
        $permission->motif = $request['motif'];
        $permission->observation = $request['observation'];
        $permission->date_debut = $request['date_debut'];
        $permission->date_fin = $request['date_fin'];
        $permission->heure_depart = $request['heure_depart'];
        $permission->heure_fin = $request['heure_fin'];
        $permission->nombre_jour = $days;
        $permission->save();

    	session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->route('personnel.conge');
    }

    public function creatFournisseur()
    {
        return view('back.create.fournisseur');
    } 

    public function storeFournisseur(Request $request)
    {
        Fournisseur::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug("$request->_token".$request->name, "-"),
            'tel' => $request->tel,
            'type' => $request->type,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'observation' => $request->observation,
            'prestation' => $request->prestation
        ]);
        session()->flash('message','Fournisseur créé avec succès !');
        return redirect()->route('fournisseur.index');
    }

    public function modalCategory()
    {
        return view('back.create.category');
    } 

    public function storeCategory(Request $request)
    {
        Category::create([
            'libelle' => $request->libelle,
            'description' => $request->description
        ]);
        session()->flash('message','Catégorie créé avec succès !');
        return redirect()->route('stock.categorie');
    }

    public function modalArticle()
    {
        $categories = Category::all();
        return view('back.create.article',compact('categories'));
    }

    public function storeArticle(Request $request)
    {
        if (request()->file('image')) {
	        $img = request()->file('image');
            $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
            $sourceimg = $img;
            $targetimg = 'back/images/articles/' .$image;
            InterventionImage::make($sourceimg)->fit(203, 135)->save($targetimg);
        }else{
            $image = 'default.jpg'; 
        }

        Article::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'libelle' => $request->libelle,
            'slug' => "Restaurant".Str::slug(Hash::make($request->token ),"-".$request->libelle),
            'prix_achat' => $request->prix_achat,
            'obeservation' => $request->obeservation,
            'image' => $image,
        ]);
    	session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->back();
    }

    public function modalBeverage()
    {
        return view('back.create.beverage');
    }

    public function storeBeverage(Request $request)
    {
        if (request()->file('image')) {
	        $img = request()->file('image');
            $image = md5($img->getClientOriginalExtension().time()).".".$img->getClientOriginalExtension();
            $sourceimg = $img;
            $targetimg = 'back/images/beverage/' .$image;
            InterventionImage::make($sourceimg)->fit(800, 800)->save($targetimg);
        }else{
            $image = 'default.jpg'; 
        }

        Beverage::create([
            'user_id' => Auth::user()->id,
            'libelle' => $request->libelle,
            'slug' => Str::slug("$request->_token".$request->libelle),
            'prix_achat' => $request->prix_achat,
            'prix_vente' => $request->prix_vente,
            'obeservation' => $request->obeservation,
            'image' => $image,
        ]);
    	session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->back();
    }

    public function findArticle(Request $request)
    {
        $article = Article::where('id', '=', $request->id)->first();
        return response()->json($article);
    }
    public function findBeverage(Request $request)
    {
        $beverage = Beverage::where('id', '=', $request->id)->first();
        return response()->json($beverage);
    }

    public function creatApprovisionnement()
    {
        $articles = Article::all();
        $fournisseurs = Fournisseur::all();
        return view('back.create.approvisionnement',compact('articles','fournisseurs'));
    }

    public function storeApprovisionnement(Request $request)
    {
        $article = Article::find($request->article_id);
        $montant = ($article->prix_achat*$request->quantite);
        $remise = 0;
        if($request->remise){
            $remise = $request->remise;
        }
        OperationStock::create([
            'user_id' => Auth::user()->id,
            'slug' => Str::slug("$request->_token".$request->libelle),
            'article_id' => $request->article_id,
            'fournisseur_id' => $request->fournisseur_id,
            'type_operation' => 'Opprovisionnement',
            'quantite_approv' => $request->quantite,
            'quantite_reste' => $request->quantite,
            'remise' => $remise,
            'tva' => $request->tva,
            'montant' => ($montant - $remise),
            'obeservation' => $request->obeservation
        ]);
      
        session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->route('stock.apprivisionnement');
    	
    }

    public function creatApprovisionnementBeverage()
    {
        $beverages = Beverage::all();
        $fournisseurs = Fournisseur::all();
        return view('back.create.approvisionnement-beverage',
        compact('beverages','fournisseurs'));
    }

    public function storeApprovisionnementBeverage(Request $request)
    {
        $beverage = Beverage::find($request->beverage_id);
        $montant = ($beverage->prix_achat*$request->quantite);
        $remise = 0;
        if($request->remise){
            $remise = $request->remise;
        }
        OperationStock::create([
            'user_id' => Auth::user()->id,
            'slug' => Str::slug("$request->_token".$request->libelle),
            'beverage_id' => $request->beverage_id,
            'fournisseur_id' => $request->fournisseur_id,
            'type_operation' => 'Opprovisionnement',
            'quantite_approv' => $request->quantite,
            'quantite_reste' => $request->quantite,
            'remise' => $remise,
            'tva' => $request->tva,
            'montant' => ($montant - $remise),
            'obeservation' => $request->obeservation
        ]);
      
        session()->flash('message', 'Opération effectuée avec succès');
        return redirect()->route('stock.apprivisionnement-beverage');
    	
    }

    public function approuvArticle($slug)
    {
        $article = Article::where('slug',$slug)->first();
        if(!$article){
            session()->flash('error', 'Pas de données');
            return redirect()->back();
        }
        $fournisseurs = Fournisseur::all();
        return view('back.create.approv-article',
        compact('article','fournisseurs'));
    }

    public function approuvBeverage($slug)
    {
        $beverage = Beverage::where('slug',$slug)->first();
        if(!$beverage){
            session()->flash('error', 'Pas de données');
            return redirect()->back();
        }
        $fournisseurs = Fournisseur::all();
        return view('back.create.approv-beverage',
        compact('beverage','fournisseurs'));
    }

    public function creatSortieStock()
    {
        $menus = MenusPlat::all();
        $articles = Article::all();
        $sortie = OperationStock::where('type_operation','Sortie')
                        ->where('user_id',Auth::user()->id)
                        ->where('montant',0)->first();
        return view('back.create.sortie-stock',compact('menus','articles','sortie'));
    }

    public function checkQuatite(Request $request)
    {
        $Qte = $request->Qte;
        $article_id = $request->id;
        $response = $this->getIsQuatity($article_id,$Qte);
        return response()->json($response);
    }

    public function storeSortieStock(Request $request)
    {
        $sortie = OperationStock::where('type_operation','Sortie')
                    ->where('user_id',Auth::user()->id)
                    ->where('montant',0)->first();
        $montant = $request->prix*$request->quantite;
        if($sortie){ 
            SortieStockProduit::create([
                'article_id' => $request->article_id,
                'operation_stock_id' => $sortie->id,
                'prix' => $request->prix,
                'quantite' => $request->quantite,
                'montant' => $montant
            ]);
        }else{
            $sortie = new OperationStock();
            $sortie->user_id = Auth::user()->id;
            $sortie->menus_plat_id = $request->menus_plat_id;
            $sortie->motif_sortie = $request->motif;
            $sortie->type_operation = 'Sortie';
            $sortie->slug = Str::slug(Auth::user()->name.'-'.$request->motif);
            $sortie->montant = 0;
            $sortie->save();

            SortieStockProduit::create([
                'article_id' => $request->article_id,
                'operation_stock_id' => $sortie->id,
                'prix' => $request->prix,
                'quantite' => $request->quantite,
                'montant' => $montant
            ]);
        }
        return redirect()->back()->with('message', 'Article ajouté avec succès !');
        
    }

    public function confirmSortieStock($id)
    {
        $sortie = OperationStock::find($id);
        if(!is_null($sortie)){
    
            $sortie->update([   
                'montant' => $sortie->SortieStockProduit->sum('montant'),
            ]);

            $sortie = OperationStock::where('type_operation','Sortie')
                ->where('user_id',Auth::user()->id)
                ->where('montant',0)->get();
            foreach ($sortie as $key) {
                $key->delete();
            } 
            return redirect()->route('stock.sortie')->with('message', 'Sortie de stock enregistrée avec succès !');  
        }
        else{
            session()->flash('message','Pas de donné!');
            return redirect()->back();
        }
    }

}
