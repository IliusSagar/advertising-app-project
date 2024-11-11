@extends('master.frontend')

@section('content')

<div class="card p-3 shadow ">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                @php 
                  $user = Auth::user();
                @endphp

                <div class="card p-3 shadow">
                

                <div class="row">

                <div class="col-md-4">
               <h4>Account</h4><hr style="width: 100%;" >
                </div>
                <div class="col-md-8">
               <h4>Request Membership</h4> <hr style="width: 100%;" >
                </div>

                
                    <div class="col-md-4">
                        
                    @include('frontend.layouts.list')
                    </div>
                    <div class="col-md-8">
                   
                   <div class="card p-3">
                   <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
                            <center>
                                

                                @php 
                                $memData = DB::table('memberships')->latest('id')->first();
                            @endphp
                            
                            @if($memData && $memData->status == 0)
                                <button type="button" class="btn btn-warning" style="color: #fff;">Pending Membership!</button>
                            @elseif($memData && $memData->status == 1)
                                <button type="button" class="btn btn-success" style="color: #fff;">Approved Membership!</button>
                            @else
                                <p>Request For Premium Membership.</p>
                                <form action="{{ route('request.membership.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                            
                                    <button type="submit" class="btn btn-success" style="color: #fff;">Request Membership!</button>
                                </form>
                            @endif
                            

                                
                            </center>
                        </div>
                   </div>
                   
               
                    </div>
                </div>
                </div>

            </div>
           
        </div>


        
        </div>
    </div>

@endsection