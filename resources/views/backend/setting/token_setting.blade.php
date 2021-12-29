@extends('backend.layout.app')

@section('title') Token Setting @endsection

@section('content')

<div class="row">
<div class=" col-lg-12">

<div class="card">

<div class="card-header">
    <h4 class="card-title"> Token Setting </h4>

</div>

<div class="card-body">

<form action="{{route('token-setting.post')}}" method="post"> 

@csrf



<div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Minimum Token Amount</label>
     
   <div class="col-sm-8">

     <input type="number" class="form-control" name="set_min_token_amount" value="{{ set_minimum_token_amount('value') }}" placeholder="Set Minimum Token Amount">
                                           
    </div>

    

 </div>

<div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Bonus 1 Percentage/Amount</label>
     
   <div class="col-sm-4">

     <input type="number" class="form-control" name="set_bonus_percentage1" value="{{ set_bonus_percentage1('value') }}" placeholder=" Set Bonus Percentage" pattern="[0-9]">
                                           
    </div>

    <div class="col-sm-4">

    <input type="number" class="form-control" name="set_bonus_amount1" value="{{ set_bonus_amount1('value') }}" placeholder=" Set Bonus Amount" pattern="[0-9]" >
                                      
    </div>

 </div>


 <div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Bonus 2 Percentage/Amount</label>
     
   <div class="col-sm-4">

     <input type="number" class="form-control" name="set_bonus_percentage2" value="{{ set_bonus_percentage2('value') }}" placeholder=" Set Bonus Percentage" pattern="[0-9]">
                                           
    </div>

    <div class="col-sm-4">

    <input type="number" class="form-control" name="set_bonus_amount2" value="{{ set_bonus_amount2('value') }}" placeholder=" Set Bonus Amount" pattern="[0-9]">
                                      
    </div>

 </div>


 <div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Bonus 3 Percentage/Amount</label>
     
   <div class="col-sm-4">

     <input type="number" class="form-control" name="set_bonus_percentage3" value="{{ set_bonus_percentage3('value') }}" placeholder=" Set Bonus Percentage" pattern="[0-9]">
                                           
    </div>

    <div class="col-sm-4">

    <input type="number" class="form-control" name="set_bonus_amount3" value="{{ set_bonus_amount3('value') }}" placeholder=" Set Bonus Amount" pattern="[0-9]">
                                      
    </div>

 </div>

 <div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Bonus 4 Percentage/Amount</label>
     
   <div class="col-sm-4">

     <input type="number" class="form-control" name="set_bonus_percentage4" value="{{ set_bonus_percentage4('value') }}" placeholder=" Set Bonus Percentage" pattern="[0-9]">
                                           
    </div>

    <div class="col-sm-4">

    <input type="number" class="form-control" name="set_bonus_amount4" value="{{ set_bonus_amount4('value') }}" placeholder=" Set Bonus Amount" pattern="[0-9]">
                                      
    </div>

 </div>


 <div class="form-group row">
  <label class="col-sm-4 col-form-label">Set Bonus 5 Percentage/Amount</label>
     
   <div class="col-sm-4">

     <input type="number" class="form-control" name="set_bonus_percentage5" value="{{ set_bonus_percentage5('value') }}" placeholder=" Set Bonus Percentage" pattern="[0-9]">
                                           
    </div>

    <div class="col-sm-4">

    <input type="number" class="form-control" name="set_bonus_amount5" value="{{ set_bonus_amount5('value') }}" placeholder=" Set Bonus Amount" pattern="[0-9]">
                                      
    </div>

 </div>


 


 <div class="form-group row">
    <div class="col-sm-10 text-center">
    <button type="submit" class="btn btn-primary">Update</button>
   </div>
  </div>


</form>


</div>

</div>




</div>



@endsection