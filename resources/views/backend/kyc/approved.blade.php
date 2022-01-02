@extends('backend.layout.app')

@section('title') Kyc @endsection

@section('css')

<style>


</style>
    
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title"> Kyc List</h4>
                {{-- <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
              </div> --}}
            </div>

            <div class="card-body">

                <div class="table-responsive ">
                    <table id="example2" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Sr.no</th>

                            </tr>
                        </thead>

                    </table>
                </div>


            </div>

        </div>


    </div>


</div>
    
@endsection


@section('js')

    
@endsection