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
	
	init_recherche();
	init_about();
	scroll_top();
	openChoice(evt, name);
	init_map();

	$('#map').CustomMap();
}

function init_mobile() {
	var attachFastClick = Origami.fastclick;
	attachFastClick(document.body);
}

function loaded() {
	wresize();
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
	
		$('#localite').customSelect({
			transition: 400,
			includeValue: true
		});
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
		$('#loc_rayon').customSelect({
			transition: 400,
			includeValue: true,
			placeholder: '<span style="color: #91d900;">Rayon</span>'
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


function init_map(){

	$.fn.CustomMap = function(options){
	var settings = $.extend({
		home: { latitude: 50.026278, longitude: 5.373316 },
		text: "<div class='map-popup'><p><strong>Service Culture et Sport</strong></p><p>Place de l'Abbaye 12 - 6870 Saint-Hubert</p></div>",
		icon_url: 'http://agendaplusgg.graphisteriegenerale.com/wp-content/themes/agenda/img/marker.png',
		zoom: 16
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
						"color": "#929292"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"color": "#929292"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#f2f2f2"
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
						"color": "#f2f2f2"
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
						"color": "#f2f2f2"
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
						"visibility": "on"
					},
					{
						"lightness": 700
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"color": "#dedede"
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

