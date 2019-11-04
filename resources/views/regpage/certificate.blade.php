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
					<div class="certificate_outer" style="    text-align: center;  width: 100%;    height: 100%;
    background-size: contain; position: relative; background-position: top center; color: #505251; background-repeat: no-repeat;">
					<img class="cert-img" style=" position: absolute;left: 0;top: 0;" src="https://www.dnasbookdigimarket.com/uploads/new-cer-eng.jpg" height="100%" width="100%"/>
                        <div style=" position: relative; top: 0; height: 100%;"  class="certi_top">
                            <div class="certificate_inner1" style="position: absolute; top: 38%; left: 0; right: 0;">
                                <h2 style="font-size: 22px;text-transform: uppercase; margin-top: 10px; margin-bottom: 5px;">This acknowledges that</h2>
                                @if(@isset($name))
                                    <h1 style="font-size: 60px; margin-top: 10px; margin-bottom: 5px;">{{  $name  }}</h1>
                                @else
                                    <h1 style="font-size: 60px; margin-top: 10px; margin-bottom:5px;">[Name of the person]</h1>
                                @endif
                                <h3 style="text-transform: uppercase;font-size: 18px;color: #505251;font-style: italic; font-weight: 600; margin-top: 10px; margin-bottom: 5px;">Has successfully finished opportunity "4" training!..</h3>
                            </div>
                            <div class="certificate_inner2" style="margin: auto;left: 0;right: 0;bottom: 20%;position: absolute;display: flex;width: 70%;align-items: baseline;">
                                <div class="ceo" style=" width: 48%; padding: 0 20px;">
                                    <p class="pra" style="padding-bottom: 10px; text-align: center;border-bottom: 1px solid #505251;font-size: 14px; margin: 0 0 10px;">SIGNED BY <span style="color: #788d84;font-size: 22px;font-weight: 600; margin: 0 0 10px;">T.Y AHLADJIPE</span></p>
                                    <p class="bottom_ceo" style="border-bottom: 0;font-size: 16px;font-weight: 600;     margin: 0 0 10px; text-align:center;">CEO</p>
                                </div>
                                <div class="date" style="border-bottom: 0;font-size: 16px;font-weight: 600;  width: 48%; padding: 0 20px;">
                                    <p class="pra" style="    text-align: center;border-bottom: 1px solid #505251;font-size: 14px; padding-bottom: 15px;">{{  $date  }}</p>
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
					<div class="certificate_outer_french" style="    text-align: center;  width: 100%;    height: 100%;
    background-size: contain; position: relative; background-position: top center; color: #505251; background-repeat: no-repeat;">
					<img class="cert-img" style=" position: absolute;left: 0;top: 0;" src="https://www.dnasbookdigimarket.com/uploads/french-cer-eng.jpg" height="100%" width="100%"/>
                        <div style=" position: relative; top: 0; height: 100%;"  class="certi_top">
                            <div class="certificate_inner1" style="position: absolute; top: 38%; left: 0; right: 0;">
                                <h2 style="font-size: 22px;text-transform: uppercase; margin-top: 10px; margin-bottom: 5px;">Ceci reconnaît que</h2>
                                @if(@isset($name))
                                    <h1 style="font-size: 60px; margin-top: 10px; margin-bottom: 5px;">{{  $name  }}</h1>
                                @else
                                    <h1 style="font-size: 60px; margin-top: 10px; margin-bottom:5px;">[Nom de la personne]</h1>
                                @endif
                                <h3 style="text-transform: uppercase;font-size: 18px;color: #505251;font-style: italic; font-weight: 600; margin-top: 10px; margin-bottom: 5px;">A terminé avec succès l'entraînement "4"!..</h3>
                            </div>
                            <div class="certificate_inner2" style="margin: auto;left: 0;right: 0;bottom: 20%;position: absolute;display: flex;width: 70%;align-items: baseline;">
                                <div class="ceo" style=" width: 48%; padding: 0 20px;">
                                    <p class="pra" style="padding-bottom: 10px; text-align: center;border-bottom: 1px solid #505251;font-size: 14px; margin: 0 0 10px;">SIGNÉ PAR <span style="color: #788d84;font-size: 22px;font-weight: 600; margin: 0 0 10px;">T.Y AHLADJIPE</span></p>
                                    <p class="bottom_ceo" style="border-bottom: 0;font-size: 16px;font-weight: 600;     margin: 0 0 10px;text-align:center;">CEO</p>
                                </div>
                                <div class="date" style="border-bottom: 0;font-size: 16px;font-weight: 600;  width: 48%; padding: 0 20px;">
                                    <p class="pra" style="    text-align: center;border-bottom: 1px solid #505251;font-size: 14px; padding-bottom: 15px;">{{  $date  }}</p>
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
<link media="print" href="{{ asset('/frontend/josh/css/print.css') }}" />
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
    mywindow.document.write('<style>@page { size: landscape; }</style>');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');	
	mywindow.print();
    mywindow.top.close();	
}



</script>
