@extends('layouts.master')

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="card center">
                        <div class="card-header">
                            <h5>Liste des visiteurs</h5>
                            <div class=" add-task-row d-flex justify-content-end">
                                <a class="btn btn-success btn-sm pull-left" href="{{ route('visiteurs.create') }}">ajouter nouveaux visiteurs</a>
                            </div>
                        </div>
                        <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example-2">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                 <th>Prenom</th>
                                               <th>CIN</th>
                                                 <th>Date</th>
                                              <th>Action</th>   
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            @foreach ($visiteurs as $visiteur)
                                            <tr>
                                               
                                                <td class="tabledit-view-mode"><span class="tabledit-span">{{$visiteur->nomFR}}</span>  </td>
                                                <td class="tabledit-view-mode"><span class="tabledit-span">{{$visiteur->prenomFR}}</span>  </td>
                                                <td class="tabledit-view-mode"><span class="tabledit-span">{{$visiteur->numCIN}}</span>  </td>
                                                <td class="tabledit-view-mode"><span class="tabledit-span">{{$visiteur->created_at}}</span>  </td>

                                              <td class="tabledit-view-mode"><span class="tabledit-span">
                                               <form method="POST" action="{{url('visiteur/' .$visiteur->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('visiteurs.edit' , $visiteur->id)}}" class="btn btn-warning"><i class="fas fa-user-edit"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                            </form>
                            </span>  </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            
                    
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    @endsection