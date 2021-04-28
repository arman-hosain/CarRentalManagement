@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Car Brand</th>
                    <th scope="col">Car Model</th>

                    <th scope="col">Customer name</th>
                    <th scope="col">Customer NID</th>

                    <th scope="col">email</th>
                   
                    <th scope="col">Rent Time</th>
                    <th scope="col">price to pay(BDT)</th>
                    <th scope="col">payment status</th>
                    <th></th>

                   

                </tr>
            </thead>
            <tbody>





                @foreach ($carBooking as $book)


                    <tr>
                        <td>{{ $book->brand}}</td>
                        <td>{{ $book->model}}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->customer_NID }}</td>
                        <td>{{ $book->email }}</td>
                        <td>{{ $book->rent_time }}</td>
                        <td>{{ $book->price }}</td>
                        @if($book->payment_status=="unpaid")
                        <td> <span class="badge badge-danger text-wrap" style="width: 5rem;"> {{ $book->payment_status }}</span></td>
                        @else
                        <td> <span class="badge badge-success text-wrap" style="width: 5rem;"> {{ $book->payment_status }}</span></td>
                        @endif
                        
                        @if (Auth::user()->role == 1)

                        

                            <td>
                                <a class="btn btn-app" href="{{route('cars.paymentUpdate',$book->id)}}"> <button type="button" class="btn btn-success">change
                                    status</button> </a>
                            
                            </td>
                          @endif

                    </tr>
                @endforeach


            </tbody>
        </table>


    </div>
@endsection
