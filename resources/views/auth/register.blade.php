@extends('layouts.app')

@section('content')


<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('logo1.png') }}" alt="">
                                <span class="d-none d-lg-block">Création de compte</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Nouveau compte</h5>
                                    <p class="text-center small">Entrez vos informations personnelles</p>
                                </div>


                                <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                                    @csrf

                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Votre nom</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Entrez votre nom svp</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Votre Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Entrez une adresse mail valide</div>
                                    </div>



                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Entrer votre mot de passe!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirmer votre mot de passe</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                        <div class="invalid-feedback">Entrer le mot de passe de confirmation!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">Je suis d'accord et j'accepte les <a href="#">termes et conditions</a></label>
                                            <div class="invalid-feedback">Vous devez accepter avant de soumettre.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Créer un compte</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Vous avez déjà un compte? <a href="{{ route('login') }}">Connexion</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection
