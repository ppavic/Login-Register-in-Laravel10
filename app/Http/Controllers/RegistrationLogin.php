<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Korisnici;
use Illuminate\Support\Facades\Hash;


class RegistrationLogin extends Controller
{
    /**
     * controler koji vraća view za login.
     */
    public function loginView():View{
        return view('login.index');
    }

    /**
     * ova metoda ne stvara View nego s login stranice
     * preko request-a, pokupljenik podataka s login forme, 
     * provjerava dali je korisnik u bazi
     * te dali je uneseni password odgovarajuć s onim u bazi
     * Nakon toga radi redirect na ostatak app-a.
     */
    public function performLogin(Request $request){
        /**
         * validacija podataka s forme
         */
        $request->validate(
            [
                'email'=> 'required',
                'password'=>'required'
            ]
            );
        /**
         * provjera s bazom dali postoji korisnik s navedenim email-om
         */
        try {
            $user = Korisnici::where('email', '=', $request->email)->get();
          


            /**
             * provjera dali je u bazi pronađen korisnik ili ne
             * ukoliko je, provjerit ćemo dali je password uredu
             * ukoliko nije pronađen, vratiti ćemo poruku da korisnik s navedenim emailom ne postoji
             */
            

             /**
              *get iz rada 41 vraća collection https://laravel.com/docs/10.x/collections
              * pročitati, nije više associjativni niz 
              */
             if(!empty($user)){

                // korisnik je pronađen
                // provjera passworda
                // iz gornjeg query-a se vidi da su došli svi podaci
                // query bi bio: SELECT * FROM korisnik where email = <ono_sto_je doslo preko requesta sa stranice login i polja email (korisnikov email)>
                if(Hash::check($request->password, $user->first()->password)){

                    // ako je i ovo prošlo ok, odnosno da je upisani i password u bazi jednak...
                    // ruta goAhead nije štićena, to se lako provjeri da u browser upišem localhost:8000/dalje na samom početku aplikacije
                    return redirect()->route('goAhead')->with(['ime'=>$user->first()->ime, 'prezime'=>$user->first()->prezime ]);
                }
                
                /**
                 * ako su provjera usera, njegovog emaila i pass-a pale provjeru
                 * redirect na stranicu logina s porukom.
                 */
                return redirect()->route('login.index')->with('error', 'Pogrešna lozinka ili email, pokušajte ponovno.');
    
             }

        } catch (\Exception $e) {

            return redirect()->route('login.index')->with('error', 'Pgreška prilikom izvođenja programa, korisnik ne postoji.'. $e->getMessage());
        }
    }

    /**
     * ovo je metoda koja samo vrać view za registraciju
     */
    public function registrationView(): View{
        return view('registracija.index');
    }

    /**
     * ovo je metoda koja radi login.
     * validacija unesenih podataka 
     * usporedba passworda s bazom i Hashiranim pasvordom
     * redirekcija na login stranicu s porukom da smo 
     * se uspješno registrirali.
     */
    public function preformRegistration(Request $request){

        /**
         * validacija podataka unesenih za registraciju
         */

         $request->validate(
            [
                'ime'=>'required',
                'prezime'=>'required',
                'email'=>'required|unique:korisnici',
                'pon_email'=>'required|same:email',
                'password' => 'required',
                'pon_password' => 'required|same:password'
            ]
            );
        
            /**
             * ako je validacija prošla
             * dodajemo kroz model korisnika u bazu.
             */
        Korisnici::create(
            [
                'ime'=>$request->ime,
                'prezime'=>$request->prezime,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
                
            ]
            );
        //redirekcija na stranicu za login s porukom da je prošlo sve ok i da se korisnik pokuša ulogirati.
        return redirect()->route('login.index')->with('success', 'Uspješno ste se registrirali. Moli vas da pokušate napraviti login.');
    }

    /**
     * Nakon provjere šaljemo korisnika na stranicu "dalje.blade.php"
     * To je bilokakav view
     */

     public function goAhead():View{
        return view('dalje');
     }
}
