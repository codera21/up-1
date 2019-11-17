@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    <div class="row">
        <div class="col-md-12" id="content">
            <div class="row1">
                <h1 id="heading">{{$pagesData->title}}</h1>
                <br>
                <p>{!! $pagesData->content !!}</p>
                <br>
                <div id="contentpara">
                    <form>
                        <?php for ($i = 1;$i <= 13;$i++): ?>
                        <p>{{$i}}) {{trans('question.q_'.$i)}}<br>
                            <input type="radio" class="{{$i}}" name="{{$i}}"
                                   value="{{$i."_a"}}"> {{trans('question.q_'.$i.'_a')}}
                            <br>
                            <input type="radio" class="{{$i}}" name="{{$i}}"
                                   value="{{$i."_b"}}"> {{trans('question.q_'.$i.'_b')}}
                            <br>
                            <input type="radio" class="{{$i}}" name="{{$i}}"
                                   value="{{$i."_c"}}"> {{trans('question.q_'.$i.'_c')}}
                            <br>
                            <input type="radio" class="{{$i}}" name="{{$i}}"
                                   value="{{$i."_d"}}"> {{trans('question.q_'.$i.'_d')}}</p>
                        <br>
                        <?php endfor; ?>
                        <div class="text-center">
                            <input type="submit" id="submitAnswer" class="btn btn-warning"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
                <p id="alert-content" class="text-center text-primary"
                   style="font-size: 2rem; background: greenyellow"></p>
            </div>
        </div>
        <div class="distributor">
            <button href="{{$baseUrl}}/pages/dnasbook-distributor-training-certificate?id=<?php echo $_GET["id"] ?>"
               class="btn btn-primary registerlink"
               style="color: black;cursor:grab">Next</button>
        </div>
    </div>
    <br>
@endsection
<style>

    body > div.container > div > div > div > div > div a {
        color: blue;
    }

    #content > a {
        background: blue;
        color: white;
    }

    #heading {
        color: black;
        font-size: 2.3rem;
        text-align: center;
    }

    #para {
        font-size: 1.5rem;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var arraysMatch = function (arr1, arr2) {
        if (arr1.length !== arr2.length) return false;
        for (var i = 0; i < arr1.length; i++) {
            if (arr1[i] !== arr2[i]) return false;
        }
        return true;

    };

    $(document).ready(function () {
        var checked = true;
        $(".distributor button").attr("disabled", "disabled");
        var rightAnswer = ["1_b", "2_d", "3_c", "4_a", "5_b", "6_d", "7_b", "8_d", "9_b", "10_a", "11_c", "12_b", "13_d"];
        var answers = [];
        $('form').on('submit', function (event) {
            event.preventDefault();
            var currentAnswer;
            for (i = 1; i <= 13; i++) {
                if (!document.querySelector('input[name="' + i + '"]:checked')) {
                    checked = false;
                }
                if (checked) {
                    currentAnswer = document.querySelector('input[name="' + i + '"]:checked').value;
                    answers.push(currentAnswer);
                } else {
                    $('#alert-content').html("You have to Give All Answer");
                    $(".distributor button").attr("disabled", "disabled");
                    break;
                }
            }
            if (arraysMatch(rightAnswer, answers)) {
                $('#alert-content').html("You can click Next to Go further");
                $(".distributor button").removeAttr("disabled");
                answers = [];
            } else {
                $('#alert-content').html("You have to Give Correct Answer");
                $(".distributor button").attr("disabled", "disabled");
                answers = [];
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".distributor button").click(function () {
            var baseURL = "<?php echo $baseUrl ?>";
            var getID = "<?php echo $_GET['id'] ?>";
            document.cookie = "questions=1;path=/";
            window.location = baseURL+"/pages/dnasbook-distributor-training-certificate?id="+getID;
        })
    })
</script>



