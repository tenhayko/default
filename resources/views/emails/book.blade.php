<div style="    width: 800px;
    margin: 0 auto;background: url('http://embracetransfers.com/frontend_asset/images/back.png');background-repeat: no-repeat;background-position: right bottom; ">
	<div style="width: 100%;
	    background: #15254b;position: relative;height: 84px;">
		<div style="background: #15254b;
	    padding-top: 20px;
	    padding-bottom: 20px;
	    float: right;
	    margin-right: 50px;
	    color: #fff;
	    font-size: 12px;">
			<img width="8px;" src="http://embracetransfers.com/frontend_asset/images/location.png"><span>  R410, CT13A, Ciputra, Vo Chi Cong Str, Tay Ho Dist, Hanoi</span><br>
			<img width="8px;" src="http://embracetransfers.com/frontend_asset/images/phone.png"><span>  (+84)98.3603.108 / (+84)98.972.0986</span><br>
			<img width="8px;" src="http://embracetransfers.com/frontend_asset/images/mail.png"><span>  bookings@guidetransfers.com</span>
		</div>
		<div style="position: absolute;
	    z-index: 9999;">
			<img src="http://embracetransfers.com/frontend_asset/images/logoet-01.png" width="100px" style="margin-top: 30px;margin-left: 30px;">
		</div>
	</div>
	<div>
		<h2 style="color: #386fc1;
	    text-align: center;
	    margin-top: 52px;font-size: 20px;">BOOKING CONFIRMATION</h2>
	    <div style="text-align: right;
    padding-right: 100px;font-size: 14px;">Booking Number: <b>{{ $book->code }}</b></div>
    	<div style="padding-left: 50px;">
    		<h4 style="font-size: 15px;font-weight: 100;margin-top:5px;margin-bottom:5px">PASSENGER INFORMATION</h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Customer Name: <b>{{ $book->customer_name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Email: <b>{{ $book->customer->email }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Mobile Phone: <b>{{ $book->customer_phone }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Nationality: <b>{{ $book->customer->country }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Language: <b>{{ $book->customer->language }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Airlines: <b>{{ $book->air->name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Flight Number: <b>{{ $book->flightCode }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Contact Method: <b>{{ $book->contact_type }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Notes for driver: <b>{{ $book->note }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick up sign: <b>{{ $book->name_table }}</b></h4>

    		<h4 style="font-size: 15px;font-weight: 100;margin-bottom:5px">BOOKING INFORMATION</h4>
    		@if($book->round_trip == 1 || $book->round_trip==2)
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick-up: <b>{{ $book->origin_from_airport == 1 ? 'Noi Bai International Airport Hanoi (HAN)' :'Tan Son Nhat International Airport - Ho Chi Minh city' }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Drop-off: <b>{{ $book->destination_from_airport }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick-up time: <b>{{ $book->time_from_airport }} {{ date('d-M-Y', strtotime($book->date_from_airport)) }}</b></h4>
    		
    		@endif
    		@if($book->round_trip == 0 || $book->round_trip==2)
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick-up: <b>{{ $book->origin_to_airport }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick-off: <b>{{ $book->destination_to_airport == 1 ? 'Noi Bai International Airport Hanoi (HAN)' :'Tan Son Nhat International Airport - Ho Chi Minh city' }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Pick-up time: <b>{{ $book->time_to_airport }} {{ date('d-M-Y', strtotime($book->date_to_airport)) }}</b></h4>
    		
    		@endif
    		
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Car: <b>{{ $book->car->name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Total Amount: <b>
				@if($book->round_trip == 0)
					{{ $book->car->price_to_airport_en }}
				@endif
				@if($book->round_trip == 1)
					{{ $book->car->price_from_airport_en }}
				@endif
				@if($book->round_trip == 2)
					{{ $book->car->price_round_trip_en }}
				@endif
				USD - 
    			{{ number_format($book->amount) }}VND</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Payment Method: <b>{{ $book->payment_method == 1 ? 'Cash payment' : 'International payments' }}</b></h4>
            <hr style="margin-top:30px;">
    	</div>
	</div>
    
	<div>
		<h2 style="color: #386fc1;
	    text-align: center;
	    margin-top: 52px;font-size: 20px;">XÁC NHẬN ĐẶT XE</h2>
	    <div style="text-align: right;
    padding-right: 100px;font-size: 14px;">Mã đặt xe: <b>{{ $book->code }}</b></div>
    	<div style="padding-left: 50px;">
    		<h4 style="font-size: 15px;font-weight: 100;margin-top:5px;margin-bottom:5px">THÔNG TIN KHÁCH HÀNG</h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Họ và tên: <b>{{ $book->customer_name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Email: <b>{{ $book->customer->email }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Điện thoại: <b>{{ $book->customer_phone }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Quốc tịch: <b>{{ $book->customer->country }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Ngôn ngữ: <b>{{ $book->customer->language }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Hãng hàng không: <b>{{ $book->air->name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Mã chuyến bay: <b>{{ $book->flightCode }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Phương thức liên lạc: <b>{{ $book->contact_type }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Lưu ý cho lái xe: <b>{{ $book->note }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Thông tin biển đón: <b>{{ $book->name_table }}</b></h4>

    		<h4 style="font-size: 15px;font-weight: 100;margin-bottom:5px">THÔNG TIN ĐẶT XE</h4>
    		@if($book->round_trip == 1 || $book->round_trip==2)
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Đón từ: <b>{{ $book->origin_from_airport == 1 ? 'Noi Bai International Airport Hanoi (HAN)' :'Tan Son Nhat International Airport - Ho Chi Minh city' }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Đón đến: <b>{{ $book->destination_from_airport }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Thời gian đón: <b>{{ $book->time_from_airport }} {{ date('d-M-Y', strtotime($book->date_from_airport)) }}</b></h4>
    		
    		@endif
    		@if($book->round_trip == 0 || $book->round_trip==2)
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Đón từ: <b>{{ $book->origin_to_airport }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Đón đến: <b>{{ $book->destination_to_airport == 1 ? 'Noi Bai International Airport Hanoi (HAN)' :'Tan Son Nhat International Airport - Ho Chi Minh city' }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Thời gian đón: <b>{{ $book->time_to_airport }} {{ date('d-M-Y', strtotime($book->date_to_airport)) }}</b></h4>
    		
    		@endif
    		
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Loại xe: <b>{{ $book->car->name }}</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Thanh toán: <b>
				@if($book->round_trip == 0)
					{{ $book->car->price_to_airport_en }}
				@endif
				@if($book->round_trip == 1)
					{{ $book->car->price_from_airport_en }}
				@endif
				@if($book->round_trip == 2)
					{{ $book->car->price_round_trip_en }}
				@endif
				USD - 
    			{{ number_format($book->amount) }}VND</b></h4>
    		<h4 style="font-size:13px;font-weight: 100;margin-top:5px;margin-bottom:5px">Phương thức thanh toán: <b>{{ $book->payment_method == 1 ? 'Tiền mặt' : 'Chuyển khoản' }}</b></h4>
                        <div style="text-align: center;text-align: center;
    margin-top: 50px;
    font-size: 11px;margin-bottom: 50px;">
                <span>- - - - - - - - - - - - - - - - - -</span><br>
                <span>For more Infomation please visit our website at www.embracetransfers.com</span><br>
                <span>Or Hotline: (+84)98.3603.108 / (+84)98.972.0986</span><br>
                <span>Thank you for choosing us.</span>
            </div>
    		<div style="text-align: center;text-align: center;
    margin-top: 50px;
    font-size: 11px;margin-bottom:50px;">
    			<span>- - - - - - - - - - - - - - - - - -</span><br>
    			<span>Để biết thêm thông tin, vui lòng truy cập website www.embracetransfers.com</span><br>
    			<span>Hoặc Hotline: (+84)98.3603.108 / (+84)98.972.0986</span><br>
    			<span>Cảm ơn bạn đã lựa chọn đồng hành cùng chúng tôi.</span>
    		</div>
    	</div>
	</div>
	<div style="    background: #15254b;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 50px;color:#fff">
		<span>HQTS</span><br>
		<span style="font-size:11px;">High Quantity Tourist Services Team</span>
	</div>
</div>
