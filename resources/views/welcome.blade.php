<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="needs-validation"
            novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Das" required>
                <div class="invalid-feedback">Please enter your full name.</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                    required>
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+91-7362924077"
                    pattern="[0-9]{10}" required>
                <div class="invalid-feedback">Please enter a valid 10-digit contact number.</div>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select class="form-select" id="city" name="city" required>
                    <option selected disabled value="">Select City</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bangalore">Bangalore</option>
                </select>
                <div class="invalid-feedback">Please select a city.</div>
            </div>

            <div class="mb-3">
                <label for="Profile_Picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="Profile_Picture" name="profile_picture" accept="image/*"
                    required>
                <div class="invalid-feedback">Please upload your profile picture.</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
        integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous">
    </script>
    <script>
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>


</body>

</html>
