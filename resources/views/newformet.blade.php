<!DOCTYPE html>
<html>
<head>
    <title>City Dropdown</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoLGwCGEB9K-vsiJw1rAs-ltaXhV3Wf8A&libraries=places"></script>
</head>
<body>
   <input type="text" id="location">

    <script type="text/javascript">
         $(document).ready(function () {
            var autocomplete;
            var id = 'location';

            autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
                types:['geocode'],
            });

            google.maps.event.addListener(autocomplete,'place_changed', function(){
                var near_place = autocomplete.getPlace();
            });
         });
    </script>
</body>
</html>
