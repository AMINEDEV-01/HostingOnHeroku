@extends('layouts.app')

@section('title', 'Edit Foret')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier Foret</h1>
        <a href="{{route('forets.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit foret</h6>
        </div>
        <form method="POST" action="{{route('forets.update', ['foret' => $foret->id])}}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group row">

                    <!-- BEGINING -->

    
                    {{-- region_anef --}}
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>region_anef</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('region_anef') is-invalid @enderror" 
                            id="examplEprogramme"
                            placeholder="region_anef" 
                            name="region_anef" 
                            value="{{ old('region_anef') ? old('region_anef') : $foret->region_anef}}">

                        @error('region_anef')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- dpef_anef --}}
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>dpef_anef</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('dpef_anef') is-invalid @enderror" 
                            id="examplEdpef"
                            placeholder="dpef_anef" 
                            name="dpef_anef" 
                            value="{{ old('dpef_anef') ? old('dpef_anef') : $foret->dpef_anef }}">

                        @error('dpef_anef')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- ccdrf --}}
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>ccdrf</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('ccdrf') is-invalid @enderror" 
                            id="examplEccdrf"
                            placeholder="ccdrf" 
                            name="ccdrf" 
                            value="{{ old('ccdrf') ? old('ccdrf') : $foret->ccdrf }}">

                        @error('ccdrf')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- secteur --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>secteur</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('secteur') is-invalid @enderror" 
                            id="examplEsecteur"
                            placeholder="secteur" 
                            name="secteur" 
                            value="{{ old('secteur') ? old('secteur') : $foret->secteur }}">

                        @error('secteur')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- foret_ou_perimetre --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>foret_ou_perimetre</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('foret_ou_perimetre') is-invalid @enderror" 
                            id="examplEforet_ou_perimetre"
                            placeholder="foret_ou_perimetre" 
                            name="foret_ou_perimetre" 
                            value="{{ old('foret_ou_perimetre') ? old('foret_ou_perimetre') : $foret->foret_ou_perimetre }}">

                        @error('foret_ou_perimetre')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- statut_juridique --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>statut_juridique</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('statut_juridique') is-invalid @enderror" 
                            id="examplEstatut"
                            placeholder="statut_juridique" 
                            name="statut_juridique" 
                            value="{{ old('statut_juridique') ? old('statut_juridique') : $foret->statut_juridique }}">

                        @error('statut_juridique')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- commune --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>commune</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('commune') is-invalid @enderror" 
                            id="examplEcommune"
                            placeholder="commune" 
                            name="commune" 
                            value="{{ old('commune') ? old('commune') : $foret->commune }}">

                        @error('commune')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- serie --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>serie</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('serie') is-invalid @enderror" 
                            id="examplEserie"
                            placeholder="serie" 
                            name="serie" 
                            value="{{ old('serie') ? old('serie') : $foret->serie }}">

                        @error('serie')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- parcelle --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>parcelle</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('parcelle') is-invalid @enderror" 
                            id="examplEparcelle"
                            placeholder="parcelle" 
                            name="parcelle" 
                            value="{{ old('parcelle') ? old('parcelle') : $foret->parcelle }}">

                        @error('parcelle')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    {{-- strate --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>strate</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('strate') is-invalid @enderror" 
                            id="examplEstrate"
                            placeholder="strate" 
                            name="strate" 
                            value="{{ old('strate') ? old('strate') : $foret->strate }}">

                        @error('strate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- annee --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>annee</label>
                        <input 
                            type="number" 
                            class="form-control form-control-foret @error('annee') is-invalid @enderror" 
                            id="examplEannee"
                            placeholder="annee" 
                            name="annee" 
                            value="{{ old('annee') ? old('annee') : $foret->annee }}">

                        @error('annee')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- essence --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>essence</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('essence') is-invalid @enderror" 
                            id="examplEessence"
                            placeholder="essence" 
                            name="essence" 
                            value="{{ old('essence') ? old('essence') : $foret->essence }}">

                        @error('essence')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- intervention --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>intervention</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('intervention') is-invalid @enderror" 
                            id="examplEintervention"
                            placeholder="intervention" 
                            name="intervention" 
                            value="{{ old('intervention') ? old('intervention') : $foret->intervention }}">

                        @error('intervention')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- details_intervention --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span></span>details_intervention</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('details_intervention') is-invalid @enderror" 
                            id="examplEdetails_intervention"
                            placeholder="details_intervention" 
                            name="details_intervention" 
                            value="{{ old('details_intervention') ? old('details_intervention') : $foret->details_intervention }}">

                    </div>

                    {{-- unite --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>unite</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('unite') is-invalid @enderror" 
                            id="examplEunite"
                            placeholder="unite" 
                            name="unite" 
                            value="{{ old('unite') ? old('unite') : $foret->unite }}">

                        @error('unite')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- physique --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>physique</label>
                        <input 
                            type="text" 
                            class="form-control form-control-foret @error('physique') is-invalid @enderror" 
                            id="examplEphysique"
                            placeholder="physique" 
                            name="physique" 
                            value="{{ old('physique') ? old('physique') : $foret->physique }}">

                        @error('physique')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>



                    {{-- observation --}}
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span></span>observation</label>
                        <!-- <input 
                            type="text" 
                            class="form-control form-control-foret @error('observation') is-invalid @enderror" 
                            id="examplEobservation"
                            placeholder="observation" 
                            name="observation" 
                            value="{{ old('observation') }}"> -->

                        <textarea class="form-control form-control-foret" id="examplEobservation" rows="3" name="observation" 
                            >{{ old('observation') ? old('observation') : $foret->observation }}</textarea>

                       
                    </div>

                    
                   <!--END  -->
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Modifier</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('forets.index') }}">Annuler</a>
            </div>
        </form>
    </div>

</div>

@include('common.footer')
@endsection



