@extends('layouts.app')

@section('content')

@php

$equipment = \App\Models\Equipment::find(request('equipment_id'));

@endphp

<div class="container py-5">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <p class="text-uppercase text-warning fw-semibold mb-2">
            TREK Rental
        </p>

        <h1 class="fw-bold display-5">
            Form Penyewaan Alat Berat
        </h1>

        <p class="text-muted">
            Lengkapi data penyewaan untuk melanjutkan proses booking alat berat.
        </p>

    </div>

    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-sm rounded-4">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- TOP --}}
        <div class="bg-dark text-white p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h3 class="fw-bold mb-1">
                        🚜 Booking Penyewaan
                    </h3>

                    <p class="mb-0 opacity-75">
                        Isi detail proyek dan jadwal penyewaan
                    </p>

                </div>

                <div>

                    <span class="badge bg-warning text-dark px-4 py-3 rounded-pill fs-6">

                        {{ $equipment->name }}

                    </span>
                    <div class="mt-2">

                        <span class="badge bg-success px-3 py-2 rounded-pill">

                            Stok tersedia:
                            {{ $equipment->stok }} unit

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- BODY --}}
        <div class="card-body p-5">

            <form action="{{ route('customer.booking.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="equipment_id"
                       value="{{ request('equipment_id') }}">

                {{-- LOKASI --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        📍 Lokasi Proyek
                    </label>

                    <textarea
                        name="project_location"
                        class="form-control rounded-4 shadow-sm p-3"
                        rows="4"
                        placeholder="Masukkan alamat lengkap proyek..."
                        required>{{ old('project_location') }}</textarea>

                </div>

                {{-- PHONE + QUANTITY --}}
                <div class="row g-4 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            📞 Nomor HP
                        </label>

                        <input
                            type="number"
                            name="phone"
                            class="form-control rounded-4 shadow-sm p-3"
                            placeholder="08xxxxxxxxxx"
                            required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
    🚜 Quantity Alat
</label>

<div class="d-flex align-items-center gap-2">

    <button
        type="button"
        class="btn btn-outline-dark"
        id="minus">
        −
    </button>

    <input
        type="number"
        name="quantity"
        id="quantity"
        class="form-control text-center fw-bold"
        value="1"
        min="1"
        max="{{ $equipment->stok }}"
        style="max-width:110px;">

    <button
        type="button"
        class="btn btn-outline-dark"
        id="plus">
        +
    </button>

</div>

<small
    id="stokWarning"
    class="text-danger fw-semibold d-none mt-2">

    Quantity melebihi stok tersedia!

</small>

                    </div>

                </div>

                {{-- DATE --}}
                <div class="row g-4 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            📅 Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            id="start_date"
                            class="form-control rounded-4 shadow-sm p-3"
                            required>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            📅 Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            id="end_date"
                            class="form-control rounded-4 shadow-sm p-3"
                            required>

                    </div>

                </div>

                {{-- OPSIONAL --}}
                <div class="row g-4 mb-5">

                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 shadow-sm h-100">

                            <div class="form-check form-switch mb-3">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="operator_needed"
                                    id="operator_needed">

                                <label class="form-check-label fw-semibold">
                                    👷 Butuh Operator
                                </label>

                            </div>

                            <small class="text-muted">
                                Tambahan operator profesional.
                            </small>

                            {{-- Jumlah Operator --}}
                            <div id="operatorBox" class="mt-3 d-none">

                                <label class="form-label fw-semibold">
                                    Jumlah Operator
                                </label>

                                <div class="d-flex align-items-center gap-2">

                                    <button
                                        type="button"
                                        class="btn btn-outline-dark"
                                        id="operatorMinus">
                                        −
                                    </button>

                                    <input
                                        type="number"
                                        id="operator_quantity"
                                        name="operator_quantity"
                                        class="form-control text-center fw-bold"
                                        value="1"
                                        min="1"
                                        style="max-width:110px;"
                                    >

                                    <button
                                        type="button"
                                        class="btn btn-outline-dark"
                                        id="operatorPlus">
                                        +
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="border rounded-4 p-4 shadow-sm h-100">

                            <div class="form-check form-switch">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="delivery_needed"
                                    id="delivery_needed">

                                <label class="form-check-label fw-semibold">

                                    🚚 Butuh Delivery

                                </label>

                            </div>

                            <small class="text-muted">

                                Alat dikirim ke lokasi proyek.

                            </small>

                        </div>

                    </div>

                </div>

                {{-- RINCIAN --}}
                <div class="bg-light rounded-4 p-4 mb-5 border">

                    <h4 class="fw-bold mb-4">
                        💰 Estimasi Rincian Pembayaran
                    </h4>

                    <table class="table table-borderless align-middle">

                        <tr>
                            <td>Harga Alat / Hari</td>
                            <td class="text-end">
                                Rp {{ number_format($equipment->daily_price,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <td>Durasi</td>
                            <td class="text-end">
                                <span id="durasi">0</span> Hari
                            </td>
                        </tr>

                        <tr>
                            <td>Jumlah Alat</td>
                            <td class="text-end">
                                <span id="qtyDisplay">1</span> Unit
                            </td>
                        </tr>

                        <tr>
                            <td>Biaya Sewa Alat</td>
                            <td class="text-end fw-bold">
                                Rp <span id="sewa">0</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Biaya Operator</td>
                            <td class="text-end">
                                Rp <span id="operatorCost">0</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Biaya Delivery</td>
                            <td class="text-end">
                                Rp <span id="deliveryCost">0</span>
                            </td>
                        </tr>

                        <tr>
                            <td>Subtotal</td>
                            <td class="text-end fw-bold">
                                Rp <span id="subtotal">0</span>
                            </td>
                        </tr>

                        <tr>
                            <td>PPN (11%)</td>
                            <td class="text-end">
                                Rp <span id="tax">0</span>
                            </td>
                        </tr>

                        <tr class="border-top">
                            <td class="fw-bold fs-5">
                                Total Pembayaran
                            </td>

                            <td class="text-end fw-bold fs-4 text-success">
                                Rp <span id="total">0</span>
                            </td>
                        </tr>

                    </table>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <a href="{{ route('customer.katalog') }}"
                       class="btn btn-outline-dark rounded-pill px-4 py-3">

                        ← Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-warning fw-bold rounded-pill px-5 py-3 shadow">

                        Lanjut Pembayaran →

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- SCRIPT --}}
<script>

const stok = {{ $equipment->stok }};

const dailyPrice = {{ $equipment->daily_price }};

const startDate = document.getElementById('start_date');
const endDate = document.getElementById('end_date');
const quantity = document.getElementById('quantity');
const plusBtn = document.getElementById('plus');
const minusBtn = document.getElementById('minus');
const operatorSwitch = document.getElementById('operator_needed');
const operatorBox = document.getElementById('operatorBox');

const operatorQty = document.getElementById('operator_quantity');

const operatorPlus = document.getElementById('operatorPlus');
const operatorMinus = document.getElementById('operatorMinus');

operatorSwitch.addEventListener('change', function(){

    if(this.checked){

        operatorBox.classList.remove('d-none');

    }else{

        operatorBox.classList.add('d-none');

        operatorQty.value = 1;

        calculateTotal();

    }

});

operatorPlus.addEventListener('click', function(){

    operatorQty.value = parseInt(operatorQty.value) + 1;

    calculateTotal();

});

operatorMinus.addEventListener('click', function(){

    if(parseInt(operatorQty.value) > 1){

        operatorQty.value = parseInt(operatorQty.value) - 1;

        calculateTotal();

    }

});
function calculateTotal() {

    let qty = parseInt(quantity.value) || 1;

    const warning = document.getElementById('stokWarning');

    // VALIDASI STOK
    if(qty > stok){

        warning.classList.remove('d-none');

        quantity.classList.add('is-invalid');

    } else {

        warning.classList.add('d-none');

        quantity.classList.remove('is-invalid');

    }

    if(qty < 1){

        qty = 1;
        quantity.value = 1;
    }

    if(startDate.value && endDate.value) {

        const start = new Date(startDate.value);
        const end = new Date(endDate.value);

        const diffTime = end - start;

        const days =
            Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;

        if(days > 0){

            document.getElementById('durasi').innerText = days;

            document.getElementById('qtyDisplay').innerText = qty;

            // Biaya sewa
            let biayaSewa =
                dailyPrice * days * qty;

            // Operator
            let biayaOperator = 0;

            if(operatorSwitch.checked){

                biayaOperator =
                    500000 *
                    days *
                    parseInt(operatorQty.value || 1);
            }

            // Delivery
            let biayaDelivery = 0;

            if(document.getElementById('delivery_needed').checked){

                biayaDelivery = 1000000 * qty;
            }

            // Subtotal
            let subtotal =
                biayaSewa +
                biayaOperator +
                biayaDelivery;

            // Pajak
            let tax = subtotal * 0.11;

            // Total
            let total = subtotal + tax;

            // Render
            document.getElementById('sewa').innerText =
                biayaSewa.toLocaleString('id-ID');

            document.getElementById('operatorCost').innerText =
                biayaOperator.toLocaleString('id-ID');

            document.getElementById('deliveryCost').innerText =
                biayaDelivery.toLocaleString('id-ID');

            document.getElementById('subtotal').innerText =
                subtotal.toLocaleString('id-ID');

            document.getElementById('tax').innerText =
                Math.round(tax).toLocaleString('id-ID');

            document.getElementById('total').innerText =
                Math.round(total).toLocaleString('id-ID');
        }
    }
}

plusBtn.addEventListener('click', () => {

    let currentQty = parseInt(quantity.value);

    if(currentQty < stok){

        quantity.value = currentQty + 1;

        calculateTotal();

    } else {

        alert(
            `Stok tidak mencukupi.\n\n` +
            `Stok tersedia hanya ${stok} unit`
        );
    }
});

minusBtn.addEventListener('click', () => {

    let currentQty = parseInt(quantity.value);

    if(currentQty > 1){

        quantity.value = currentQty - 1;

        calculateTotal();
    }
});

startDate.addEventListener('change', calculateTotal);
endDate.addEventListener('change', calculateTotal);
quantity.addEventListener('input', calculateTotal);
quantity.addEventListener('blur', function(){

    if(parseInt(quantity.value) > stok){

        quantity.value = stok;
    }

    if(parseInt(quantity.value) < 1){

        quantity.value = 1;
    }

    calculateTotal();

});

document.getElementById('operator_needed')
    .addEventListener('change', calculateTotal);

document.getElementById('delivery_needed')
    .addEventListener('change', calculateTotal);

</script>
@endsection