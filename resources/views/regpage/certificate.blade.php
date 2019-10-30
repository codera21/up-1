@extends('layouts.frontend.default')

@section('page_title')
    {{ trans('about') }}
@endsection
<?php $baseUrl = URL::to('/');?>
@section('content')
    @if($lang == 'en')
    <div class="row">
        <div class="col-md-12" id="content">
            <div class="row1">
                <h1 id="heading">{{$pagesData->title}}</h1>
                <br>
                <div id="contentpara">
                    <p id="para">
                    <h2><em>Please, Print your Certificate!</em></h2>
                    <div class="certificate_outer">
                        <div class="certi_top">
                            <div class="certificate_inner1">
                                <h2>This acknowledges that</h2>
                                @if(@isset($name))
                                    <h1>{{  $name  }}</h1>
                                @else
                                    <h1>[Name of the person]</h1>
                                @endif
                                <h3>Has successfully finished opportunity "4" training!..</h3>
                            </div>
                            <div class="certificate_inner2">
                                <div class="ceo">
                                    <p class="pra">SIGNED BY <span>T.Y AHLADJIPE</span></p>
                                    <p class="bottom_ceo">CEO</p>
                                </div>
                                <div class="date">
                                    <p class="pra">{{  $date  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>Click <em><strong>NEXT</strong></em>&nbsp; to register!</h2>
                    </p>
                </div>
            </div>
        </div>
        <div class="distributor">
            <button
               class="btn btn-primary registerlink"
               style="color: black;cursor:grab">Next</button>
        </div>
    </div>
@elseif ($lang == 'fr')
 <div class="row">
        <div class="col-md-12" id="content">
            <div class="row1">
                <h1 id="heading">{{$pagesData->title}}</h1>
                <br>
                <div id="contentpara">
                    <p id="para">
                    <h2><em>S'il vous plaît, imprimez votre certificat!</em></h2>
                    <div class="certificate_outer_french">
                        <div class="certi_top">
                            <div class="certificate_inner1">
                                <h2>Ceci reconnaît que</h2>
                                @if(@isset($name))
                                    <h1>{{  $name  }}</h1>
                                @else
                                    <h1>[Name of the person]</h1>
                                @endif
                                <h3>A terminé avec succès l'entraînement "4"!..</h3>
                            </div>
                            <div class="certificate_inner2">
                                <div class="ceo">
                                    <p class="pra">SIGNÉ PAR <span>T.Y AHLADJIPE</span></p>
                                    <p class="bottom_ceo">CEO</p>
                                </div>
                                <div class="date">
                                    <p class="pra">{{  $date  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>Cliquez sur <em><strong>SUIVANT</strong></em>&nbsp; enregistrer!</h2>
                    </p>
                </div>
            </div>
        </div>
        <div class="distributor">
            <button
               class="btn btn-primary registerlink"
               style="color: black;cursor:grab">SUIVANT</button>
        </div>
    </div>
@endif	
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

    .certificate_outer {
        height: auto;
        background-image: url(https://www.dnasbookdigimarket.com/uploads/new-cer-eng.jpg);
        text-align: center;
        background-size: contain;
        width: 100%;
        position: relative;
        background-position: top center;
        color: #505251;
        background-repeat: no-repeat;
    }
    
	

	.certificate_outer_french {
		background-size: contain;
	}
	
	.certificate_outer_french {
        height: auto;
        background-image: url(https://www.dnasbookdigimarket.com/uploads/french-cer-eng.jpg);
        text-align: center;
        background-size: contain;
        width: 100%;
        position: relative;
        background-position: top center;
        color: #505251;
        background-repeat: no-repeat;
    }
    
	

	.certificate_outer_french {
		background-size: contain;
	}
    .certi_top {
        height: 900px;
    }

    .certificate_inner1 {
        position: absolute;
        top: 33%;
        left: 0;
        right: 0;
    }

    .ceo p.bottom_ceo {
        border-bottom: 0;
        font-size: 16px;
        font-weight: 600;
    }

    .ceo p.pra {
        padding-bottom: 10px;
    }

    .certificate_inner1 h3 {
        text-transform: uppercase;
        font-size: 18px;
        color: #505251;
        font-style: italic;
        font-weight: 600;
    }

    .certificate_inner1 h2 {
        font-size: 22px;
        text-transform: uppercase;
    }

    .certificate_inner1 h1 {
        font-size: 60px;
    }

    .certificate_inner2 {
        margin: auto;
        left: 0;
        right: 0;
        bottom: 35%;
        position: absolute;
        display: flex;
        width: 70%;
        align-items: baseline;
    }

    .date p {
        padding-bottom: 15px;
    }

    .certificate_inner2 p {
        text-align: center;
        border-bottom: 1px solid #505251;
        font-size: 10px;
    }

    .ceo, .date {
        width: 48%;
        padding: 0 20px;
    }

    .ceo span {
        color: #788d84;
        font-size: 22px;
        font-weight: 600;
    }

    @media screen and (max-width: 980px) {
        .ceo span {
            font-size: 14px;
        }

        p.bottom_ceo {
            border-bottom: 0;
            font-size: 16px;
            font-weight: 600;
        }

        p.pra {
            padding-bottom: 10px;
        }

        .ceo, .date {
            width: 100%;
        }

        

        .certificate_inner1 h1 {
            font-size: 30px;
            margin: 5px 0;
        }

        .certificate_inner1 h2 {
            font-size: 16px;
            margin: 0;
        }

        .certificate_inner1 h3 {
            margin: 0;
            font-size: 12px;
        }
    }

    @media screen and (max-width: 767px) {
        .certificate_inner2 {
            bottom: 33%;
        }

        .certi_top {
            height: 700px;
        }

        .certificate_inner1 h2 {
            font-size: 10px;
        }

        .certificate_inner1 h3 {
            font-size: 9px;
        }

        .certificate_inner1 h1 {
            font-size: 26px;
        }

        .ceo span {
            font-size: 9px;
        }

        .certificate_inner2 p {
            font-size: 6px;
        }

        .certificate_inner1 {
            top: 36%;
        }

        p.bottom_ceo {
            font-size: 16px;
            border-bottom: none;
            font-weight: 600;
        }

        p.pra {
            padding-bottom: 3px;
        }

        @media screen and (max-width: 600px) {
            .certificate_inner1 {
                top: 29%;
            }

            .certificate_inner2 {
                bottom: 46%;
            }

            p.bottom_ceo {
                font-size: 12px;
            }

            .certi_top {
                height: 300px;
            }

            .ceo span {
                font-size: 8px;
            }

            .ceo p.pra {
                padding-bottom: 0;
            }
        }
        @media screen and (max-width: 480px) {
            .certificate_inner1 {
                top: 20%;
            }

            .certificate_inner2 {
                bottom: 62.5%;
            }

            p.bottom_ceo {
                font-size: 12px;
            }

            .certi_top {
                height: 300px;
            }

            .certificate_inner1 h1 {
                font-size: 15px;
            }

            .certificate_inner1 h3 {
                font-size: 6px;
            }

            .ceo p.bottom_ceo {
                font-size: 8px;
            }

            .ceo span {
                font-size: 5px;
            }

            .certificate_inner2 p {
                font-size: 4px;
            }

            .ceo, .date {
                padding: 0 8px;
            }

            p.pra {
                margin: 0;
            }
        }

        @media screen and (max-width: 375px) {
            .certificate_inner1 {
                top: 17%;
            }

            .certificate_inner2 {
                bottom: 68%;
            }

            .certificate_inner1 h1 {
                font-size: 13px;
                margin: 0;
            }

            .ceo, .date {
                padding: 0 5px;
            }
        }
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".distributor button").click(function () {
            var baseURL = "<?php echo $baseUrl ?>";
            var getID = "<?php echo $_GET['id'] ?>";
            document.cookie = "certificate=1;path=/";
            window.location = baseURL + "/register/" + getID;
        });
    })
</script>
