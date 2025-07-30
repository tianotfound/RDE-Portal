<div class="container mb-2 responsive-hide">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/header.png') }}" alt="" style="max-width: 500px; height: auto;">
            </div>
            <div class="col-md-6">
                <div class="float-end">
                    <h4 class="float-end">Philippine Standard Time</h4>
                    <h4 class="text-center">{{ $currentDate }}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 id="philippine-time"></h6>
                        </div>
                        <div class="col-md-6">
                            <h6 id="current-day" class="day float-end"></h6>
                        </div>
                    </div>
                </div>
                <script>
                    function updatePhilippineTime() {
                        const utcDate = new Date();
                        const philippinesTime = new Date(utcDate.getTime() + (8)); // UTC+8
            
                        const options = {
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            hour12: true,
                        };
                        document.getElementById('philippine-time').textContent = philippinesTime.toLocaleTimeString('en-US', options);
            
                        // Get the current day
                        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                        const currentDay = days[philippinesTime.getDay()];
                        document.getElementById('current-day').textContent = "It's " + currentDay + "!";
                    }
            
                    setInterval(updatePhilippineTime, 1000);
                    updatePhilippineTime();
                </script>
            </div>            
        </div>
    </div>
</div>
<div>
    <div style="height: 10px; background-color: #00296b;"></div>
</div>
