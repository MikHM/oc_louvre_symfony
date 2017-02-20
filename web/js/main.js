$(document).ready(function(){
    $( function() {
        $( ".datepicker" ).datepicker({
            minDate: new Date(),
            beforeShowDay: function (date) {
                var holidays = [
                    [5, 1], // 1st May
                    [11, 1], // 1st Nov
                    [12, 25] // 25 Dec
                ];

                var dayOfTheWeek = date.getDay();
                var dayOfTheMonth = date.getDate(); //start from 1
                var month = date.getMonth() + 1; //start from 0

                var checkNotTuesday = function(){
                    return dayOfTheWeek != 2;
                }

                var checkNotHolidays = function (){
                    var result = true;
                    holidays.forEach(function(holiday, i){
                        //console.log(holiday + ' - '+  month + ' /' + dayOfTheMonth);
                        if(month == holiday[0] && dayOfTheMonth ==  holiday[1])
                            result = false;
                    })
                    return result;
                }

                var dayEnabled = checkNotTuesday() && checkNotHolidays()
                return [dayEnabled];
            }
        });
    } );
});
