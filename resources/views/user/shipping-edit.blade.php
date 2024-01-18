<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NNN.vn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/shipping-edit.css') }}" rel="stylesheet">
</head>

<body>
    <div class="shipping_edit_header">
        <a href="{{url('/')}}">
            <img src="{{asset('image/Logo.svg')}}" alt="Logo" />
        </a>
        <p class="shipping_edit_title">Shipping information</p>
    </div>
    <div class="shipping_edit_body">
        <div class="address_list_container">
            <div class="address_list">
                <div class="row">
                    @foreach($shippingData as $data)
                    <div class="col-6 address_list_col">
                        <div class="address_box_container">
                            <h5>{{$data->receiver_name}}</h5>
                            <p class="address_detail">Address: {{$data->address}}</p>
                            <p>Phone number: {{$data->receiver_phone}}</p>
                            <div class="shipping_option_button">
                                <button type="button" class="edit_address_button" data-bs-toggle="modal" data-bs-target="#editAddressModal" data-name="{{$data->receiver_name}}" data-phone="{{$data->receiver_phone}}" data-address="{{$data->address}}" data-id="{{$data->shipping_information_id}}">
                                    Edit
                                </button>
                                <button style="margin-left: 10px;" onclick="window.location.href='/cart/shipping-information-edit/delete/{{$data->shipping_information_id}}'">Delete</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <p>Or
                <button type="button" class="add_address_button" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                    ADD
                </button>
                an address
            </p>
        </div>
    </div>
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="add_address_title">Add an address</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/cart/shipping-information-edit/add" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input_container">
                            <label for="receiver_name" class="form-label">Receiver name</label>
                            <input type="text" class="form-control" id="receiver_name" name="receiver_name">
                        </div>
                        <div class="input_container">
                            <label for="receiver_phone" class="form-label">Receiver phone</label>
                            <input type="text" class="form-control" id="receiver_phone" name="receiver_phone">
                        </div>
                        <div class="input_container">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                    <div class="modal-footer add_address_button_options">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="add_address_title">Edit an address</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input_container">
                            <label for="receiver_name" class="form-label">Receiver name</label>
                            <input type="text" class="form-control" id="receiverName" name="receiver_name">
                        </div>
                        <div class="input_container">
                            <label for="receiver_phone" class="form-label">Receiver phone</label>
                            <input type="text" class="form-control" id="receiverPhone" name="receiver_phone">
                        </div>
                        <div class="input_container">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="addressEdit" name="address">
                        </div>
                    </div>
                    <div class="modal-footer add_address_button_options">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
    document.querySelectorAll('.edit_address_button').forEach(button => {
        button.addEventListener('click', function() {
            // Extract data from the button
            var name = this.getAttribute('data-name');
            var phone = this.getAttribute('data-phone');
            var address = this.getAttribute('data-address');
            var id = this.getAttribute('data-id');

            // Populate the modal's inputs
            document.getElementById('receiverName').value = name;
            document.getElementById('receiverPhone').value = phone;
            document.getElementById('addressEdit').value = address;
            var form = document.querySelector('#editAddressModal form');
            form.action = '/cart/shipping-information-edit/edit/' + id;
        });
    });
</script>
</html>