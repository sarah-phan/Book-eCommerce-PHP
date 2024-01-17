<x-admin-layout>
    <h2 class="main_page_title">Edit Order Status</h2>
    <div class="form_container">
        <form method="POST" action="{{url('/redirect/admin-order-edit', $data->order_id)}}">
            @csrf

            <div class="input_container">
                <label style="width: 255px">Choose an order status</label>
                <select class="form-select" aria-label="Default select example" name="order_status">
                    <option value="Confirming" @if($data->order_status == "Confirming") selected @endif>
                        Confirming
                    </option>
                    <option value="Pending" @if($data->order_status == "Pending") selected @endif>
                        Pending
                    </option>
                    <option value="Paid" @if($data->order_status == "Paid") selected @endif>
                        Paid
                    </option>
                    <option value="Delivering" @if($data->order_status == "Delivering") selected @endif>
                        Delivering
                    </option>
                    <option value="Success" @if($data->order_status == "Success") selected @endif>
                        Success
                    </option>
                    <option value="Fail" @if($data->order_status == "Fail") selected @endif>
                        Fail
                    </option>
                </select>
            </div>
            @error('order_status')
            <div class="error_display">{{ $message }}</div>
            @enderror

            <div class="submit_form">
                <button type="submit">Save</button>
            </div>
        </form>
    </div>
</x-admin-layout>