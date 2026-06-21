@extends('layouts.admin')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Return Alat
            </h2>

            <p class="text-muted mb-0">
                Approval pengembalian alat customer
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th>Booking</th>
                            <th>Customer</th>
                            <th>Alat</th>
                            <th>Qty</th>
                            <th>Status Return</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                            <tr>

                                <td>

                                    #{{ $booking->booking_code }}

                                </td>

                                <td>

                                    {{ $booking->user->name ?? '-' }}

                                </td>

                                <td>

                                    {{ $booking->equipment->name ?? '-' }}

                                </td>

                                <td>

                                    {{ $booking->quantity }}

                                </td>

                                <td>

                                    @if($booking->return_status == 'pending')

                                        <span class="badge bg-warning text-dark">

                                            Pending

                                        </span>

                                    @elseif($booking->return_status == 'returned')

                                        <span class="badge bg-success">

                                            Returned

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($booking->return_status == 'pending')

                                        <form
                                            action="{{ route('admin.return.approve',$booking->id) }}"
                                            method="POST">

                                            @csrf

                                            <button
                                                class="btn btn-success btn-sm">

                                                Approve Return

                                            </button>

                                        </form>

                                    @else

                                        <button
                                            class="btn btn-secondary btn-sm"
                                            disabled>

                                            Selesai

                                        </button>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    Belum ada request return

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection