@extends('user.layout.app')

@section('containt')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-8 mx-auto py-4">
                    <div class="card">
                        <div class="card-body">
                           
                            @if(Auth::user()->is_active == 0)
                                <h2 class=""> Welcome <span class="px-3 text-success"> {{Auth::user()->name}}</span></h2>
                                <p class="card-title">
                                    Hi ! <code>{{Auth::user()->name}}</code> Your acount is painding ! Please wait Activate your acount.
                                </p> 
                            @else
                                <p class="card-title">
                                    Hi ! <code> {{Auth::user()->name}} </code> Your acount is Active.
                                </p> 
                            @endif
                            

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection