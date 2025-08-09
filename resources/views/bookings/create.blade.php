  @include('dashboard.layout')
  <body class="">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
          </div>
      </div>    
    </div>
    <!-- loader END -->
    @include('dashboard.sidebar')
    @include('dashboard.header')
   

<div class="conatiner-fluid content-inner mt-n5 py-0">
@if ($errors->any())
    <div class="alert alert-warning fade-in-up">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success fade-in-up">
        {{ session('success') }}
    </div>
@endif 
      <div>
         <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="header-title">
             <h4>Create New Booking</h4>
        </div>
    </div>

    <div class="card-body">
  <form method="POST" action="{{ route('bookings.store') }}">
    @csrf

    <div class="card shadow-sm p-4">
        <div class="row">

            <!-- Unit Type -->
            <div class="col-md-6 mb-3">
                <label for="unitType" class="form-label">Unit Type</label>
                <select id="unitType" class="form-control" required>
                    <option value="">Select Unit Type</option>
                    @foreach($unitTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Unit -->
            <div class="col-md-6 mb-3">
                <label for="unitDropdown" class="form-label">Unit</label>
                <select name="unit_id" id="unitDropdown" class="form-control" required>
                    <option value="">Select Unit</option>
                </select>
            </div>

            <!-- Customer Search -->
            <div class="col-md-12 mb-3">
                <label for="customerSearch" class="form-label">Search Customer (Name or Email)</label>
                <input type="text" id="customerSearch" class="form-control" placeholder="Type to search...">
                <select name="customer_id" id="customerDropdown" class="form-control mt-2" required>
                    <option value="">Select Customer</option>
                </select>
            </div>

            <!-- Check-in Date -->
            <div class="col-md-6 mb-3">
                <label for="check_in_date" class="form-label">Check-in Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control" required>
            </div>

            <!-- Check-out Date -->
            <div class="col-md-6 mb-3">
                <label for="check_out_date" class="form-label">Check-out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="form-control" required>
            </div>

            <!-- Guests -->
            <div class="col-md-6 mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" name="guests" id="guests" class="form-control" required>
            </div>

            <!-- Total Price -->
            <div class="col-md-6 mb-3">
                <label for="total_price" class="form-label">Total Price (Auto-calculated)</label>
                <input type="number" name="total_price" id="total_price" class="form-control" readonly step="0.01" required>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>

    </div>
</div>

      </div>
    </div>
  @include('dashboard.footer')
<script>
    document.querySelector('form').addEventListener('submit', function (e) {
    const totalPrice = parseFloat(document.getElementById('total_price').value);
    if (isNaN(totalPrice) || totalPrice <= 0) {
        e.preventDefault();
        alert('Please select valid check-in/check-out dates and a unit so the total price can be calculated.');
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const customers = {!! json_encode(\App\Models\User::select('id', 'fname', 'lname', 'email')->get()) !!};
    const unitTypes = @json($unitTypes);

    const customerSearch = document.getElementById('customerSearch');
    const customerDropdown = document.getElementById('customerDropdown');
    const unitTypeSelect = document.getElementById('unitType');
    const unitDropdown = document.getElementById('unitDropdown');
    const checkInInput = document.getElementById('check_in_date');
    const checkOutInput = document.getElementById('check_out_date');
    const totalPriceInput = document.getElementById('total_price');

    let selectedUnitPrice = 0;

    // Search users
    customerSearch.addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const matches = customers.filter(user =>
            user.fname.toLowerCase().includes(query) || user.email.toLowerCase().includes(query)
        );

        customerDropdown.innerHTML = '';
        matches.forEach(user => {
            const option = document.createElement('option');
            option.value = user.id;
            option.textContent = `${user.fname} ${user.lname} (${user.email})`;
            customerDropdown.appendChild(option);
        });
    });

    // Populate units based on unit type
    unitTypeSelect.addEventListener('change', function () {
        const typeId = this.value;
        const type = unitTypes.find(t => t.id == typeId);
        unitDropdown.innerHTML = '<option value="">Select Unit</option>';
        selectedUnitPrice = 0;

        if (type && type.units) {
            type.units.forEach(unit => {
                const option = document.createElement('option');
                option.value = unit.id;
                option.dataset.price = unit.price_per_day; // store price
                option.textContent = `${unit.name} - K ${unit.price_per_day}`;
                unitDropdown.appendChild(option);
            });
        }

        calculateTotalPrice(); // reset if unit changes
    });

    // Get selected unit price
    unitDropdown.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        selectedUnitPrice = parseFloat(selected.dataset.price || 0);
        calculateTotalPrice();
    });

    checkInInput.addEventListener('change', calculateTotalPrice);
    checkOutInput.addEventListener('change', calculateTotalPrice);

    function calculateTotalPrice() {
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);

        if (!isNaN(checkIn) && !isNaN(checkOut) && selectedUnitPrice > 0) {
            const diffTime = checkOut - checkIn;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (diffDays > 0) {
                const total = diffDays * selectedUnitPrice;
                totalPriceInput.value = total.toFixed(2);
            } else {
                totalPriceInput.value = '';
            }
        }
    }
});
</script>