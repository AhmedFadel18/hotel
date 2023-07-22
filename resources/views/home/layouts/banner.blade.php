<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                @if (Session::has('message'))
                    <div class="alert-success">
                        <h3>{{ session('message') }}</h3>
                    </div>
                @elseif(Session::has('fail'))
                    <div class="alert-danger">
                        <h3>{{ session('fail') }}</h3>
                    </div>
                @else
                    <h6>Away from monotonous life</h6>
                    <h2>Relax Your Mind</h2>
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference
                        in
                        price. You may see some for as low as $.17 each.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Book<br> Your Room</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <form action="{{ route('home.booking.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <div class='input-group'>
                                                <input type="date" name="checkin_date"
                                                    class="form-control checkin-date">
                                            </div>
                                            @error('checkin_date')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class='input-group'>
                                                <input type="date" name="checkout_date"
                                                    class="form-control checkout-date">
                                            </div>
                                            @error('checkout_date')
                                                <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control">
                                        <div class="input-group">
                                            <input type="number" name="total_adults" placeholder="Total Adults"
                                                class="form-control">
                                        </div>
                                        @error('total_adults')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="input-group">
                                            <input type="number" name="total_children" placeholder="Total Children"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="input-group">
                                            <select name="room_id" class="form-control room-list">
                                                <option value="0">Choose Room</option>
                                            </select>
                                            <p>Price:<span class="show-room-price"></span></p>
                                        </div>
                                        @error('room_id')
                                            <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" name="room_pirce" class="room-price">
                                        <input type="submit" class="book_now_btn button_hover" value="Book Now">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $(".checkin-date").on('blur', function() {
            var _checkinDate = $(this).val();
            $.ajax({
                url: "{{ url('booking') }}/available-rooms/" + _checkinDate,
                dataType: 'json',
                beforeSend: function() {
                    $(".room-list").html('<option>--Loading--</option>');
                },
                success: function(res) {
                    var _html = '';
                    $.each(res.data, function(index, row) {
                        _html += '<option data-price="' + row.roomType.price +
                            '" value="' + row.room.id + '">' + row.room
                            .title + ' - ' + row.roomType.title +
                            '<option/>';
                    });
                    $(".room-list").html(_html);
                }
            });
        });
        $(document).on("change", ".room-list", function() {
            var _roomPrice = $(this).find('option:selected').attr('data-price');
            $(".room-price").val(_roomPrice);
            $(".show-room-price").text(_roomPrice);
        })
    });
</script>
