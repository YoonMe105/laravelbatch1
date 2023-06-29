<!DOCTYPE html>
<html>
<head>
    <title>Employee Page</title>
</head>
<body>
    <h1>Welcome to Our Site</h1>
    <p>This is Employee Index</p>
    
    <?php
        // foreach($employeedata as $value){
        //     echo $value;
        // }
    ?>

    <!-- @php
        foreach($employeedata as $value){
            echo $value;
        }
    @endphp -->

    <ul>
        @foreach($employeedata as $value)
        <li>{{$value}}</li>
        <!-- <li>{!!$value!!}</li> -->
        @endforeach
    </ul>

    @php
        $city = "Yangon";
    @endphp

    @php
        echo $city;
    @endphp

    @if($city === "Yangon")
        <h3>You Correct</h3>
    @else
        <h3>You were wrong</h3>
    @endif

    {{$thanks}} {{$demo}}

</body>
</html>