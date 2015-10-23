$(function(){

	/**
	 * Function menu home
	 */
	var $menu = $('nav#main_home ul');

	//Comprobamos click [i.fa-bars]
	$('nav#main_home > i.fa-bars').on('click', this, function(event) {
		event.preventDefault();
		//Toggle add class menu
		$menu.toggleClass('open');
	});

	// Comprobamos click [i.fa-times-circle]
	$('nav#main_home ul > li.m_head > i.fa-times-circle').on('click', this, function(event) {
		event.preventDefault();
		//Toggle add class menu
		$menu.removeClass('open')
	});

	//Comprabamos si el mouse a salido del contenedor
	$menu.mouseleave(function(event) {
		//Comprobamos si el nav#main_home ul tiene la clase open
		if( $menu.hasClass('open') ) {
			//Removemos la clase open
			$menu.removeClass('open');
		}
	});




	/**
	 * Function slider home
	 * Add classactive first item
	 */
	 $('.slider_home').carousel({
	 	pause: "hover",
	 	keyboard: true
	 });
	 //
	 $('.carousel-inner>.item:nth-child(1)').addClass('active');

});


/**
* Hightlight Current actuall page
* Add class=active
*/
$(function(){
  $('a').each(function() {
    if ($(this).prop('href') == window.location.href) {
      $(this).addClass('active');
    }
  });
});



/**
 * Center column 
 * Layout (Three columns)
 */
$(document).ready(function(){
    
    columnResponsive();
    
    $(window).resize(function(){    
        columnResponsive();
        
    });/* RESIZE END */
});/* DOM END */
$(window).bind('load', function(){
    
    
});/* LOAD END */
$( window ).on( "orientationchange", function( event ) {
    
    /*location.reload();*/
    
});/* ORIENTATION END */

/* CONTROLA EL ANCHO DE LA VENTANA DEL NAVEGADOR, YA SEA MOVIL, TABLET O PC PARA MOVER LAS COLUMNAS CENTRAL E IZQUIERDA */
function columnResponsive(){

    if( $(window).width() >= 992 ){
        
        /* SI EL ANCHO DEL NAVEGADOR ES MAYOR O IGUAL A 992PX ( RESOLUCION DE TABLETS EN LANDSCAPE Y TODOS LOS MONITORES DE PC ) COLOCA LA COLUMNA CENTRAL DESPUES DE LA COLUMNA IZQUIERDA */
        $('.center-column').insertAfter('.left-column');
        
    }else{
    
        /* EN CASO CONTRARIO ( MOVILES Y TABLETS EN PORTRAIT O DISPOSITIVOS CON RESOLUCIONES MENORES A 992PX ) COLOCA LA COLUMNA IZQUIERDA DESPUES DE LA COLUMNA CENTRAL */
        $('.left-column').insertAfter('.center-column');
    
    }
}
