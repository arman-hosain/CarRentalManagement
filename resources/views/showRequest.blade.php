@extends('layouts.dashboard')

@section('content')
    <div class="container">

        <table class="table table-dark">
            <thead>
                <tr>

                    <th scope="col">Customer name</th>
                    <th scope="col">NID</th>
                    <th scope="col">Customer email</th>
                    <th scope="col">Car Brand</th>
                    <th scope="col">Message</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Request Status</th>
                
                    

                   

                </tr>
            </thead>
            <tbody>





                @foreach ($showReq as $book)


                    <tr>
                        <td>{{ $book->customer_name }}</td>
                        <td>{{ $book->NID }}</td>
                        <td>{{ $book->email}}</td>
                        <td>{{ $book->car_brand }}</td>

                        <td>{{ $book->message }}</td>
                        <td>{{ $book->request_date }}</td>
                        @if ($book->request_status=="accepted")
                        <td><span class="badge badge-success">{{ $book->request_status }}</span></span></td> 
                        @else
                        <td><span class="badge badge-danger">{{ $book->request_status }}</span></span></td>
                        @endif

                        @if (Auth::user()->role == 1)
                        <td>
                            <a class="btn btn-app" href="{{ route('changeRequestStatus', $book->id) }}"> <button type="button" class="btn btn-success">change
                                status</button> </a>
                        
                        </td>
                        @endif

                    </tr>
                @endforeach


            </tbody>
        </table>


    </div>
@endsection
