@extends('layouts.app')

@section('content')
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Make Payment</div>
                 <div class="card-body">
                     <form action="" id="paymentForm" method="GET">
                         @csrf
                      
                         @error('title')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="title">title</label>
                         <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror "><br>
                         
                         @error('email')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="email">email</label>
                         <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror "><br>

                         @error('amount')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="amount">amount</label>
                         <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror "><br>

                         <label for="">ClassRoom</label><br>
                         <select name="my_class_id" id="my_class_id" class="form-control">
                             @foreach($myclasses as $myclass)
                               <option value="{{ $myclass->id}}">{{$myclass->name}}</option>
                             @endforeach
                         </select>
                         <br>

                        @error('description')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="description">Description</label><br>
                         <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror "><br>

                         @error('year')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                         <label for="year">Year</label>
                         <input type="date" name="year" id="year" class="form-control @error('year') is-invalid @enderror "><br>

                         <div class="form-submit">
                           <button type="submit" onclick="payWithPaystack(event)"> Pay </button>
                         </div>
                        <br>
                        
                     </form>
                     <script src="https://js.paystack.co/v1/inline.js"></script> 
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                     <script>
                          const paymentForm = document.getElementById('paymentForm');
                            paymentForm.addEventListener("submit", payWithPaystack, false);
                             function payWithPaystack(e) {
                               e.preventDefault();
                               
                                 let handler = PaystackPop.setup({
                                  key: 'pk_test_3e1b9b1317b6f87c9da980a162f03fef22492f0e', // Replace with your public key
                                   email: document.getElementById("email").value,
                                   amount: document.getElementById("amount").value * 100,
                                   ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                   // label: "Optional string that replaces customer email"
                                   onClose: function(){
                                    alert('Window closed.');
                                  },
                                    callback: function(response){
                                     let reference =  response.reference;
                                    //alert(message);
                                    //verify payment
                                    $.ajax({
                                        type: 'GET',
                                        url: "{{ URL::to('verify-payment') }}/"+ reference,
                                        success: function (response) {
                                          if(response.status == true) {
                                            $('form').predend('
                                            <h2>response.message</h2>');
                                          }
                                          console.log(response);
                                        // the transaction status is in response.data.status
                                         }else{
                                          $('form').predend('
                                            <h2>failed too qualify</h2>');
                                         }
                                       });
                              }
                           });
                                      handler.openIframe();
                               }

                     </script>
           </div>
       </div>
   </div>
@endsection
