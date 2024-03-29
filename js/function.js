//variables
var windowWidth = $(window).width(),
	windowHeight = $(window).height();


//functions

function init() {
	wresize();
	$(window).off("resize", wresize);
	$(window).on("resize", wresize);
	
	init_menu();
	$(".hamburger").on("click",openNav);
	
	$('.accordion > dt:not(.active) + dd').hide();
	$('.tab2 button:first-child').addClass('active');
	
	$.fancybox.defaults.loop = true;
	$.fancybox.defaults.buttons = [
		"thumbs",
		"close"
	];
	
	init_recherche();
	init_about();

	scroll_top();

	if(window.location.pathname=="/agenda/" && window.location.search!=""){
        scroll_bottom();
    }
	
	init_map();
	init_archives();
	validation_formulaire();
	
	$('#map').CustomMap();
	
	openChoice(evt, name);


	
}

function init_mobile() {
	var attachFastClick = Origami.fastclick;
	attachFastClick(document.body);
}

function loaded() {
	wresize();
	init_recherche();

}

function wresize() {
	windowWidth = $(window).width();
	windowHeight = $(window).height();
}

function openNav() {

	$("#affichage-navigation").toggleClass("open");
	
	$('#affichage-navigation').on('scroll touchmove mousewheel', function(e){
		e.preventDefault();
		e.stopPropagation();
		return false;
	});
}

function init_menu() {
	$(".hamburger").off("click", clickmenu);
	$(".hamburger").on("click", clickmenu);
}

function clickmenu() {
	$(this).toggleClass("is-active");
}



function init_recherche(){
	
	if($('#formulaire-recherche').length){

		$('#quoi').customSelect({
			transition: 400,
			includeValue: true,
			placeholder: '<span style="color: #91d900;">Quoi ?</span>'
		});
		$('#datefork').customSelect({
			transition: 400,
			includeValue: true,
			placeholder: '<span style="color: #91d900;">Quand ?</span>'
		});
		$('#commune').customSelect({
			transition: 400,
			includeValue: true,
			placeholder: '<span style="color: #91d900;">Où ?</span>'
		});
		$('#loc_rayon').customSelect({
			transition: 400,
			includeValue: true,
			placeholder: '<span style="color: #91d900;">Distance ?</span>'
		});
	
	}
}

function openChoice(evt, name){
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(name).style.display = "block";
	evt.currentTarget.className += " active";
}


function init_about(){
	if($('.accordion').length){
		$('.accordion > dt').off("click", clickAccordion);
		$('.accordion > dt').on("click", clickAccordion);
	}
}

function clickAccordion(){
	$('.accordion > dt').off("click", clickAccordion);
	$(this).next('dd').stop(true).slideToggle('fast', function() {
		$('.accordion > dt').on("click", clickAccordion);
	});
	$(this).toggleClass("active");

}


function scroll_top(){
	
	var scrolltop = $( '.bloc-scroll-top' );
	scrolltop.on( 'click', function() {
		$( 'html, body' ).animate( {scrollTop: 0}, 50 );
		return false;
	} );
	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 2 ) {
			scrolltop.fadeIn();
		} else {
			scrolltop.fadeOut();
		}
	} );
}

function scroll_bottom(){
	
	var elem = document.getElementById("liste");
	elem.scrollIntoView();

}



function init_archives(){
	
$('#accordion li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});
	
}


function init_map(){

	$.fn.CustomMap = function(options){
	var settings = $.extend({
		home: { latitude: 50.026278, longitude: 5.373316 },
		text: "<div class='map-popup'><p><strong>Service Culture et Sport</strong></p><p>Place de l'Abbaye 12 - 6870 Saint-Hubert</p></div>",
		icon_url:'https://dev.lagenda.plus/wp-content/themes/agenda/img/marker.png',
		zoom: 10
	}, options );
        
	var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);
             
	return this.each(function() {
		var element = $(this);
            
		var options = {
			zoom: settings.zoom,
			center: coords,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			mapTypeControl: true,
			scaleControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.DEFAULT
			},
			overviewMapControl: true,
		};
            
		var map = new google.maps.Map(element[0], options);

		var icon = {
			url: settings.icon_url,
			origin: new google.maps.Point(0, 0)
		};

		var marker = new google.maps.Marker({
			position: coords,
			map: map,
			icon: icon,
			draggable: false
		});
            
		var info = new google.maps.InfoWindow({
			content: settings.text
		});

		google.maps.event.addListener(marker, 'click', function() { 
			info.open(map, marker);
		});

		var styles = [
			{
				"featureType": "all",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "simplified"
					},
					{
						"color": "#91d900"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#000000"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#f2f7d4"
					}
				]
			},
			{
				"featureType": "landscape.natural",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#f2f7d4"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#fafcef"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
					{
						"lightness": 100
					},
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
					{
						"visibility": "off"
					},
					{
						"lightness": 400
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"color": "#f2f7d4"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			}
		];

		map.setOptions({styles: styles});
	});
 
	};
	
}





function validation_formulaire(){
	
	$( '#register-user' ).on( 'submit', function(e) {

		$( this ).find( 'input:required' ).each( function() {
			// On vÃ©rifie si les input requis sont remplis
			if ( $( this ).val().trim() == '' ) {
				e.preventDefault();
				$( this ).addClass( 'error' );
			}
		} );

		$( this ).find( 'input[type="email"]' ).each( function() {
			// Regex pour vÃ©rifier le champ email
			var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			if ( ! pattern.test( $( this ).val() ) ) {
				e.preventDefault();
				$( this ).addClass( 'error' );
			}
		} );

	} );
	
//	if ( $( '.message' ).length > 0 ) {
//		setTimeout( function() {
//			$( '.message' ).remove();
//		}, 6000 );
//	}

//	$( '#show-password' ).on( 'change', function() {
//		if ( $( this ).is( ':checked' ) ) {
//			changetype( $( '#pass-user' ), 'text' );
//		} else {
//			changetype( $( '#pass-user' ), 'password' );
//		}
//	} );

}

//
//	function changeType(x, type) {
//		if(x.prop('type') == type)
//			return x;
//		try {
//			return x.prop('type', type);
//		} catch(e) {
//			var html = $("<div>").append(x.clone()).html();
//			var regex = '/type=(\")?([^\"\s]+)(\")?/';
//			var tmp = $(html.match(regex) == null ?
//				html.replace(">", ' type="' + type + '">') :
//				html.replace(regex, 'type="' + type + '"') );
//			tmp.data('type', x.data('type') );
//			var events = x.data('events');
//			var cb = function(events) {
//				return function() {
//					for(i in events)
//					{
//						var y = events[i];
//						for(j in y)
//							tmp.bind(i, y[j].handler);
//					}
//				}
//			}(events);
//			x.replaceWith(tmp);
//			setTimeout(cb, 10);
//			return tmp;
//		}
//	}


