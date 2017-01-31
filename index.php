<?php
header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html ng-app="MyApp" >
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <title>IPA Store</title>
    	<base href="//uaepro.me/ipa/ipa3/" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.3.1/css/framework7.ios.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.3.1/css/framework7.ios.colors.min.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	 <link href="css/please-wait.css" rel="stylesheet">
    <!-- Scripts -->
    
  </head>
  <body ng-controller="IndexPageController">
      <div class="inner" ng-view>
	</div>
    <div class="statusbar-overlay"></div>
    <div class="panel-overlay"></div>
    <div class="views ">
      <div class="view view-main ">
        
        <!-- Navbar -->
        <div class="navbar " ng-controller="IndexPageController">
          <div class="navbar-inner">
            <div class="left"></div>
            <div class="center sliding">{{client.name}} Store</div>
            <div class="right"></div>
          </div>
          <div class="navbar-inner cached" data-page="groupsPage">
            <div class="left sliding">
              <a href="index" class="link back">
                <i class="icon icon-back"></i><span>Back</span>
              </a>
            </div>
            <div class="center sliding" ng-controller="GroupsPageController">{{group.name}}</div>
            <div class="right"></div>
          </div>
          <div class="navbar-inner cached" data-page="detailsPage">
            <div class="left sliding">
              <a href="index" class="link back">
                <i class="icon icon-back"></i><span>Back</span>
              </a>
            </div>
            <div class="center sliding" ng-controller="DetailPageController">{{app.name}}</div>
            <div class="right"></div>
          </div>
        </div>
        
        <!-- Pages -->
        <div class="pages navbar-through">

          <!-- Page 1 -->
          <div data-page="index" class="page" ng-controller="IndexPageController">
            <!-- Page content-->
            <div class="page-content" ng-if="client">
			
				<div class="content-block" ng-if="client.block1">
				  <div class="content-block-inner ">
					<center dir='rtl'><p >{{client.block1}}</p></center>
				  </div>
				</div>
				
				<div ng-if="client.premium" google-adsense='' class="center">
				</div> 
				
				<div ng-if="client.groupsAvailable">
					<!-- now we will show groups because client is available -->
				  <div class="content-block-title">Groups</div>
					<div class="list-block">
					  <ul>
						<li ng-repeat="group in groups">
						  <a href="#groupsPage" ng-click="onGroupClicked(group)" class="item-link item-content">
						  <div class="item-media"><i class="fa fa-users fa-2x"></i></div>
							<div class="item-inner">
								<div class="item-title">{{group.name}}</div>
								<div class="item-after"></div>
							</div>
						  </a>
						</li>
					  </ul>
					</div>
				</div>
				
				<div ng-if="client.groupsAvailable == false">
					<!-- now we will show apps because there is no group is available -->
					<div class="content-block-title">Apps</div>
					<div class="list-block media-list">
					  <ul ng-repeat="app in apps">
						<li>
						  <a href="#detailsPage" ng-click="onItemClicked(app)" class="item-link item-content">
							<div class="item-media"><img class="appImage" ng-src="{{app.image}}" width="55"></div>
							<div class="item-inner">
							  <div class="item-title-row">
								<div class="item-title">{{app.name}}</div>
								<div class="item-after">info</div>
							  </div>
							  <div class="item-subtitle">{{app.version}}</div>
							  <div class="item-text">{{app.comment | limitTo:100 }}</div>
							</div>
						  </a>
						</li>
					  </ul>
					</div>
				</div>


			<div class="content-block" ng-if="client.block2">
			  <div class="content-block-inner">
				<center dir='rtl'><p >{{client.block2}}</p></center>
			  </div>
			</div>
			
			<div class="content-block-title">Contact</div>
			<div class="list-block">
			  <ul>
				<li ng-if="client.email" >
				<a ng-herf="#" ng-click="openlink('mailto:'+ client.email)" class="item-link item-content" target="_blank">
				  <div class="item-media"><i class="fa fa-envelope fa-2x"></i></div>
				  <div class="item-inner">
					<div class="item-title">{{client.email}}</div>
				  </div>
				 </a>
				</li>
				<li ng-if="client.number">
				<a ng-herf="#" ng-click="openlink('http://uaepro.me/vcard?number=' + client.number + '&email=' + client.email + '&user=' + client.name)" class="item-link item-content" target="_blank">
				  <div class="item-media"><i class="fa fa-whatsapp fa-2x" ></i></div>
				  <div class="item-inner">
					<div class="item-title">{{client.number}}</div>
				  </div>
				</a>
				</li>

				<li ng-if="client.snapchat">
				<a ng-herf="" ng-click="openlink('snapchat://add/'+ client.snapchat)" class="item-link item-content" target="_blank">
				  <div class="item-media"><i class="fa fa-snapchat fa-2x" ></i></div>
				  <div class="item-inner">
					<div class="item-title">{{client.snapchat}}</div>
				  </div>
				  </a>
				</li>
				<li ng-if="client.twitter">
				<a ng-herf="" ng-click="openlink('twitter://user?screen_name=' + client.twitter)" class="item-link item-content" target="_blank">
				  <div class="item-media"><i class="fa fa-twitter fa-2x" ></i></div>
				  <div class="item-inner">
					<div class="item-title">{{client.twitter}}</div>
				  </div>
				  </a>
				</li>
			  </ul>
			</div>
			
            <div class="content-block-title">لعمل صفحتك الخاصة</div>
			<p><a ng-href="" ng-click="openlink('http://uaepro.me/ipa/admin')" class="button button-big button-fill color-gray">اضغط هنا</a></p>
				<div ng-if="client.premium" should-appear></div>
			<div class="toolbar"  ng-if="!client.premium">
				<div class="toolbar-inner" dir='rtl'> 
					<a></a>
					<a ng-herf="" onclick="window.open( 'twitter://user?screen_name=UAEpro' , '_self')">برمجة UAEpro</a>
					<a></a>
				</div> 
			</div>

			</div>
		</div>
		  <!-- Groups Page -->
          <div data-page="groupsPage" class="page cached" ng-controller="GroupsPageController">
			  <div class="page-content" ng-if="groups">
				<div class="content-block-title">Apps</div>
				<div class="list-block media-list">
				  <ul ng-repeat="app in groupsApps">
					<li ng-if="app.groupid == group.id">
					  <a href="#detailsPage" ng-click="onItemClicked(app)" class="item-link item-content">
					  <div class="item-media"><img class="appImage" ng-src="{{app.image}}" width="55"></div>
						<div class="item-inner">
						  <div class="item-title-row">
							<div class="item-title">{{app.name}}</div>
							<div class="item-after">info</div>
						  </div>
						  <div class="item-subtitle">{{app.version}}</div>
						  <div class="item-text">{{app.comment | limitTo:100 }}</div>
						</div>
					  </a>
					</li>
				  </ul>
				</div>
			  </div>
		  </div>
          <!-- Page 2 -->
          <div data-page="detailsPage" class="page cached" ng-controller="DetailPageController" >
            <!-- Page content-->
            <div class="page-content">
                <div class="card" >
                <img class="appImage2 center" ng-src="{{app.image}}" width="128">

                  <div class="card-header" style=""><h3 class="center">{{app.name}}</h3></div>
                  <div class="card-content">
                    <div class="card-content "><center><p class="center" style="white-space: pre-line;">{{app.comment}}</p></center></div>
                  </div>
				<div class="card-footer"><a  ng-href="" ng-click="redirectToGoogle(app.id,app.owner)" class="button center" >Download</a> </div>
				<div ng-if="client.premium" google-adsense='' class="center">
            </div>
                </div>
              </div>
          </div>

        </div>
		
			<div class="toolbar"  ng-if="client.premium">
				<div class="toolbar-inner" dir='rtl'> 
					<a></a>
					<a ng-herf="" onclick="window.open( 'twitter://user?screen_name=UAEpro' , '_self')" data-confirm="للعلم UAEpro هو مبرمج الموقع فقط وليس له علاقة بالبرامج قطعا" data-confirm-title="فهمت" >برمجة UAEpro</a>
					<a></a>
				</div> 
			</div>
			
      </div>
    </div>
	    <script type="text/javascript" src="js/please-wait.min.js"></script>
    <script type="text/javascript">
      window.loading_screen = window.pleaseWait({
       logo: "logo.png",
        backgroundColor: '#00bcd4',
		loadingHtml: '<div class="spinner"><div class="dot1"></div> <div class="dot2"></div></div>'
		});
	  
	   
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/framework7/1.3.1/js/framework7.min.js"></script>
    <script type="text/javascript" src="js/config.js"></script>
    <script type="text/javascript" src="js/service/InitService.js"></script>
    <script type="text/javascript" src="js/service/DataService.js"></script>
    <script type="text/javascript" src="js/controller/IndexPageController.js"></script>
    <script type="text/javascript" src="js/controller/DetailPageController.js"></script>
    <script type="text/javascript" src="js/controller/GroupsPageController.js"></script>
    <script type="text/javascript">window.setTimeout(function () { loading_screen.finish(); }, 5000);</script>
	

	<script type="text/javascript">
	function downloadJSAtOnload() {
	var element = document.createElement("script");
	element.src = "http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
	document.body.appendChild(element);
	}
	if (window.addEventListener)
	window.addEventListener("load", downloadJSAtOnload, false);
	else if (window.attachEvent)
	window.attachEvent("onload", downloadJSAtOnload);
	else window.onload = downloadJSAtOnload;

	</script>


<script>

</script>


  </body>
</html>

