<?php
// On indique au navigateur qu'on utilise l'encodage UTF-8
header('Content-type: text/html; charset=utf-8');

// Paramètres de connexion à la base
define('DB_HOST' , '127.0.0.1');
define('DB_NAME' , 'algeriainvest_v1');
define('DB_USER' , 'algeriainvest_v1');
define('DB_PASS' , 'Toe7huTp2n_ty2Xs');

// Connexion à la base avec PDO
try{
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e) {
    echo "Impossible de se connecter à la base de données '".DB_NAME."' sur ".DB_HOST." avec le compte utilisateur '".DB_USER."'";
    echo "<br/>Erreur PDO : <i>".$e->getMessage()."</i>";
    die();
}






// On prépare les données à insérer
$ip   = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
$date = date('Y-m-d');           // La date d'aujourd'hui, sous la forme AAAA-MM-JJ

// Mise à jour de la base de données
// 1. On initialise la requête préparée

$query = $pdo->prepare("
        INSERT INTO stats_visites (ip , date_visite , pages_vues) VALUES (:ip , :date , 1)
        ON DUPLICATE KEY UPDATE pages_vues = pages_vues + 1
    ");
// 2. On execute la requête préparée avec nos paramètres
$visit = $query->execute(array(
    ':ip'   => $ip,
    ':date' => $date
));
//echo $visit;






?>
<div id="algeria-main-section" style="background-image: linear-gradient(0.25turn, #f0f0f0, #ffffff, #ffffff, #ffffff, #f0f0f0)">
      @php
      $facebook_url = null;
      $linkedin_url = null;
      $youtube_url = null;
      $twitter_url = null;
      $settings = getHeaderInfo();
      foreach($settings as $setting){
      if($setting->key == 'facebook_url')
      $facebook_url= $setting->value;
      if($setting->key == 'linkedin_url')
      $linkedin_url= $setting->value;
      if($setting->key == 'youtube_url')
      $youtube_url= $setting->value;
      if($setting->key == 'twitter_url')
      $twitter_url= $setting->value;

      }
      $discover_algeria_menus = getDiscoverAlgeriaContent();
      $resource_menu = getResourcesContent();
     
      @endphp
      <table class="headertoplink" style="border:0;background-color:#000000;color:#FFFFFF" width="100%">
         <tr>
            
			
		
            <td style="text-align:right" style="background-color:#000000">

			    <font style="font-size:12px;color:#FFFFFF">
                <a style="font-size:12px;color:#FFFFFF" href="{{ route('customer-home')}}">Home |</a>

                    <a class="nav-link1" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:12px;color:#FFFFFF">@lang('footer.who_we_are') | </a>
                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al" style="font-size:12px;color:#777a7c;float:right;background-color:#bfc0ba!important" >
                        <a class="dropdown-item" style="font-size:12px;color:#FFFFFF;font-weight:bold" href="{{ route('gallery')}}"> @lang('navbar.discover')</a>
                        <a class="dropdown-item" style="font-size:12px;color:#FFFFFF;font-weight:bold" href="{{ route('qhse')}}"> QHSE</a>
                    </div>

                    <style>
                        .nav-link1 {
                            display: inline-block;
                            padding: 0rem 0rem;
                        }
                    </style>

                <!-- <a style="font-size:12px;color:#FFFFFF" href="{{ route('gallery')}}">@lang('navbar.discover') | </a> -->

          <!--      <a style="font-size:12px;color:#FFFFFF" href="{{ route('sitemap')}}">@lang('navbar.sitemap') | </a> -->

             	<a style="font-size:12px;color:#FFFFFF" href="{{ route('presse')}}">@lang('navbar.presse') | </a>

                <a style="font-size:12px;color:#FFFFFF" href="{{route('contactus')}}">@lang('navbar.contact') | </a>
                </font>



               <!-- Social -->
               <!-- <a href="#"><i class="fab fa-pinterest-p"></i></a>&nbsp -->
              
               @if($linkedin_url != null)
               <a href="{{ $linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in" style="color:#FFFFFF"></i></a>&nbsp
               @endif
               
               @if($twitter_url != null)
               <a href="{{ $twitter_url }}" target="_blank"><i class="fab fa-twitter" style="color:#FFFFFF"></i></a>&nbsp
		      @endif
		    @if($facebook_url != null)
               <a href="{{ $facebook_url }}" target="_blank"><i class="fab fa-facebook-f" style="color:#FFFFFF"></i></a>&nbsp
		   @endif
		   
		    @if($youtube_url != null)
               <a href="{{ $youtube_url }}" target="_blank"><i class="fab fa-youtube" style="color:#FFFFFF"></i></a>&nbsp&nbsp
               @endif
            </td>
         </tr>
         <tr>
            <td>
               <div class="header-top">
                  <div class="container-fluid">
                     <div class="col-xl-12">
                        <table style="border:0;" width="100%">
                           <tr class="headerflex">
                              <td class="d-none d-lg-block" width="32%">
                                 <a href="{{route('customer-home')}}">
								 <img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_invest.png')}}">
								 </a>
                              </td>
                             
							
						
							
							
                              <td width="68%">
                                   <table style="border:0;" width="100%">
                                       <tbody>
                                           <tr class="headerright">
                                              <td>
                                                <ul>
                                                    <li class="d-none d-lg-block">
                
	<form class="search-header-form" method="get" action="{{route('search')}}">
                    <input class="headerserchbar" type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text">
                    <input class="headerserchbar" type="text" style="width: 310px" name="Search" placeholder="@lang('navbar.search_placeholder')" id="search-box" name="search" style="background-color:#000000;border-color:black">
              
           
		
                                <button type="submit" color="#008000" style="background-color: #000000; border: none">&nbsp
								<img src="{{asset('css/images/search.svg')}}" class="img-fluid">&nbsp&nbsp
								</button>
 
		  

													</form> 
													
													
													
                                                    </li>
                                                 </ul> 
                                              </td>
                                              @if(Auth::guard('customer')->check())
                                              <td class="d-none d-lg-block">
                                                 <ul>
                                                    <li><a class="genric-btn success radius" href="{{route('customer-logout')}}" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;@lang('navbar.signout')</a></li>
                                                 </ul>
                                                 <form action="{{route('customer-logout')}}" id="customer_logout_form" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                 </form>
                                              </td>
                                              <td>
                                                 <ul>
                                                    <li><a href="{{route('customer-account')}}" class="genric-btn success radius my-account-web"><i class="fa fa-user"></i> @lang('my_account.myAccount')</a>
                                                    </li>
                                                 </ul>
                                              </td>
                                              @else
                                              <td class="d-none d-lg-block">
                                                 <ul>
                                                    <li><a href="{{route('subscription-pack')}}" class="genric-btn success radius"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;@lang('navbar.test_for_free')</a></li>
                                                 </ul>
                                              </td>
                                              <td>
                                                 <ul>
                                                    <li><a href="#" class="login-in genric-btn success-border radius" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer" id="loign_formshow" class="genric-btn success-border radius"><i class="fa fa-user"></i> @lang('navbar.toLoginIn')</a>
                                                       @include('frontend.layouts.login')
                                                    </li>
                                                 </ul>
                                              </td>
                                              @endif
                                       



									   <td class="d-none d-lg-block">
									   
                                              <div class="dropdown show">
                                                    <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid globe"></a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                                       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                             <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                             {{ $properties['name'] }}
                                                          </a>
                                                       @endforeach
                                                    </div>
                                                 </div> 
                                             


    



											 </td>
											  
											  
											  
											  
											  
											  
											  
                                           </tr>
                                       </tbody>
                                   </table>
                               </td>
                           </tr>
                        </table>
                        
                     </div>
                  </div>
               </div>
            </td>
         </tr>
      </table>
	  
      <div class="header-bottom header-sticky" style="background:#000000">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-12 p-0">
               <!-- logo 2 -->
                  <div class="logo2">
                     <a href="{{route('customer-home')}}"><img src="assets/img/logo/logo.png" alt=""></a>
                  </div>
               <!-- logo 3 -->
                  <div class="logo3 d-block d-lg-none">
                     <a href="{{route('customer-home')}}"><img src="{{ asset('css/front-end/home_page_styles/assets/img/logo/logo_algeria_invest.png')}}" alt=""></a>
                  </div>
				  
               <!-- Main-menu -->
              				 <div class="main-menu text-center d-none d-lg-block" style="background-color: #000000">
                     <nav>
                     
                     
                     <script>
								$(document).ready(function() {
									$('.popup-youtube').magnificPopup({
										type: 'iframe'
									});
								});
							</script>
                     
                        <ul id="navigation">
                           <li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle" href="https://algeriainvest.com/AlgeriaIC/public/discover-algeria/about-algeria" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.discoverAlgeria')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                              <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al" style="bacground-color:#FFFFFF">
                                 @foreach($discover_algeria_menus as $menu)
                                 <a class="dropdown-item" href="{{route('discover-algeria',$menu->content_key)}}">{{ $menu->localeAll[0]->title }}</a>
                                 @endforeach
                              </div>
                           </li>


                           
                           @if(!Auth::guard('customer')->check())
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment2')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.business_environment')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
                                                    <a class="dropdown-item" href="{{route('business-environment2',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a>
                                                @endforeach
                                            @endif
                                        @endif
						 <!--    <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a> -->
                                    </div>
                                </li>
                                @else
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.business_environment')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                        
                                        @if($resource_menu != null)
                                            @if(!$resource_menu->isEmpty())
                                                @foreach($resource_menu as $resource)
                                                    <a class="dropdown-item" href="{{route('business-environment',['key'=>$resource->page_key])}}">{{ $resource->localeAll[0]->title }}</a>
                                                @endforeach
                                            @endif
                                        @endif
						 <!--    <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('home.premium')</a> -->
                                    </div>
                                </li>
                                @endif

                           <li class="nav-item dropdown ">
                                  <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">@lang('navbar.businessOpportunities')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                   <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                    <a class="dropdown-item" href="{{route('business-opportunity')}}">@lang('business_opportunity.breadcrumb_check_business_opportunities')</a>
                                    <a class="dropdown-item" href="/add-business-opportunity">@lang('business_opportunity.breadcrumb_add_business_opportunities')</a>
                              </div>
                            </li>

                            <li class="nav-item dropdown ">
                                       <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" 
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('home.premium')</a>
                                       <span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                       <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                          <a class="dropdown-item" href="{{route('premium-news-list')}}">@lang('navbar.consult_expert_advice')</a>
                                          <a class="dropdown-item" href="{{route('add-premium-news')}}">@lang('navbar.propose_contribution')</a>
                                                                           </div>
                                </li>
                       
					   <li class="nav-item dropdown ">
                              <a class="nav-link dropdown-toggle" href="{{route('business-environment')}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('navbar.news')</a><span class="drop-ar-down" id="discover-al"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                              <div class="dropdown-menu" id="dr-al" aria-labelledby="discover-al">
                                 <a class="dropdown-item" href="{{route('news-list')}}">@lang('navbar.news1')</a>
                                 <a class="dropdown-item" href="{{route('event-list')}}">@lang('navbar.events')</a>
                              </div>
                           </li>
                          <style>
                             .header-bottom .main-menu ul li:hover > a {
                                 color: #f9b634;
                                 text-decoration: underline;
                              }
                            


                          </style>
						
						

                             


 <li style="float:right;color:FFFFFF;border-bottom:2px solid #ffb400">
<a href="{{route('our-services')}}">@lang('navbar.ourServices')</a>            
		</li>
					 
					 
					 
					 </ul>
                     </nav>
                  </div>
               </div>
               <!-- Mobile Menu -->
               <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="mobileheadbottom">
         <div class="mobileheadleft">
            <div class="mobileheadsearch">
                <form class="search-header-form" method="get" action="{{route('search')}}">
                    <input type="hidden" name="_token" value="3sdhSaOUIExthWYi4zQBA4umcTToLKYrhc1X89A4" id="search-text">
                    <input type="text"  name="Search" placeholder="@lang('navbar.search_placeholder')" id="search-box" name="search">
                </form>
            </div>
         </div>
         <div class="mobileheadright">
            <div class="site-user">
               <div class="btn-group">
                  <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user-circle" aria-hidden="true"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                     @if(!Auth::guard('customer')->check())
                     <button class="dropdown-item login_btn" data-toggle="modal" data-target=".bd-example-modal-lg" type="button" id="mobile-login"> @lang ('navbar.toLoginIn')</button>
                     <a href="{{route('subscription-pack')}}" class="register register_btn">@lang('navbar.test_for_free')</a>
                     @else
                     <a href="{{route('customer-logout')}}" class="register" onclick="event.preventDefault();document.getElementById('customer_logout_form').submit();">@lang('navbar.signout')</a>
                     <a href="{{route('customer-account')}}" class="register">@lang('my_account.myAccount')</a>
                     @endif
                  </div>
               </div>
            </div>
            <div class="dropdown show">
               <a href="#" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('css/images/web-icon.svg')}}" alt="search" class="img-fluid globe"></a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                     <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['name'] }}
                     </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>


       <!--      Cookies      -->
   <?php
/*
    if (!isset($_COOKIE['count1'])) {
        //echo " En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies";
        $cookie = 1;
        setcookie("count1", $cookie);

    }else
        if((($_COOKIE['count1'])) <= 1 || ($_COOKIE['count1']) >=4 ){


        ?>

    <div class="container-fluid cookies2">
        <div class="container">
            <span> En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies. <a href="https://policies.google.com/technologies/partner-sites?hl=fr" target="_blank" class=""> En savoir plus</a></span>
            <!--<span class="accept"><a href="" class="btn btn-primary" onclick="setCookies();">Accept</a></span>-->

            | <a href="#" class="close-div accept" onclick="setCookies();"> Accepter </a>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--cookies accept hide or show-->
    <script>
        $('.close-div').click(function () {
            $(".cookies2").hide();
        });
    </script>

    
</div>
<?php

    $cookie = ++$_COOKIE['count1'];
    setcookie("count1", $cookie);
    //echo "You have viewed this page ".$_COOKIE['count']." times.";
}
?>
<!-- Header End -->

