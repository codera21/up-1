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
                    <h2><input type="button" onclick="printCertificate('print_english_certificate')" value="Print Certificate" /></h2>
                <div id="print_english_certificate">
					<div class="certificate_outer">
					<img src="https://www.dnasbookdigimarket.com/uploads/new-cer-eng.jpg" height="100%" width="100%"/>
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
				</div>	
                    <h2>Click <em><strong>NEXT</strong></em>&nbsp; to register!</h2>
                    </p>
                </div>
            </div>
        </div>
        <div class="distributor">
            <button
                class="btn btn-primary registerlink"
                style="color: black;cursor:grab">Next
            </button>
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
					 <h2><input type="button" onclick="printCertificate('print_french_certificate')" value="
Certificat d'impression" /></h2>
                <div id="print_french_certificate">
                    <div class="certificate_outer_french">
					<img src="https://www.dnasbookdigimarket.com/uploads/french-cer-eng.jpg"/>
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
				 </div>	
                    <h2>Cliquez sur <em><strong>SUIVANT</strong></em>&nbsp; enregistrer!</h2>
                    </p>
                </div>
            </div>
        </div>
     <div class="distributor">
         <button href="{{$baseUrl}}/register/?id=<?php echo $_GET["id"] ?>"
                 class="btn btn-primary registerlink"
                 style="color: black;cursor:grab">Next</button>
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


</style>
 <link rel="stylesheet" href="{{ asset('/frontend/josh/css/certificate.css') }}" type="text/css" /> 
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


function printCertificate(divid) {
	
	var data = $("#"+divid).html();
    var mywindow = window.open('');
    mywindow.document.write('<html><head><title>Certificate</title>');
	var style_url="{{ asset('/frontend/josh/css/certificate.css') }}";
    mywindow.document.write('<link rel="stylesheet" href="'+style_url+'" type="text/css" />');  

    mywindow.document.write(data);
    mywindow.document.write('</body></html>');
    mywindow.document.close();
	mywindow.print();
                            
}

</script>
