@extends('layoutAdmin')
@section('title', 'Edit Order')
@section('content')
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="In process" {{ $order->status == 'In process' ? 'selected' : '' }}>In process</option>
                    <option value="On the way" {{ $order->status == 'On the way' ? 'selected' : '' }}>On the way</option>
                    <option value="Delivered" {{ $order->status == 'Food Arrived' ? 'selected' : '' }}>Food Arrived</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>
@endsection
