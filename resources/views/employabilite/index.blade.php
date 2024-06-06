
<x-app-layout>
                  <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Employabilite</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>type contrat</th>
                                                        <th>genre contrat</th>
                                                        <th>nom entreprise</th>
                                                        <th>periode</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($employabilites as $employabilite)
                                                    <tr>
                                                        <td>{{ $employabilite->name}}</td>
                                                        <td>{{ $employabilite->type_contrat}}</td>
                                                        <td>{{ $employabilite->genre_contrat}}</td>
                                                        <td>{{ $employabilite->nomboite}}</td>
                                                        <td>{{ $employabilite->periode}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                                <a  href="/ajouter" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    Ajouter
                                                </a>

                                        </div>
                                    </div>
                                </div>






                      </div>

 </x-app-layout>
