/* global $  */
/* Данный слайдер был написан на нативном JS в целях обучения и является примером 
быстрого написания слайдера на JS.# javascript-plugin-slider-native  */

 /*window.onload = function(e){

  new Slider({
    images: '.gallery-1 .photo .slide img',
   // images: '.gallery-1 .photo .slide img',
    next: '.gallery-1 .tabs .next',
    prev: '.gallery-1 .tabs .prev',
    interval: '5000'
  });

 /* new Slider({
    images: '.gallery-1 .photo img',
    next: '.gallery-1 .tabs .next',
    prev: '.gallery-1 .tabs .prev',
    interval: '5000'
  });*/


  /*function Slider(images){

    this.images = document.querySelectorAll(images.images);
    this.btPrev = document.querySelector(images.prev);
    this.btNext = document.querySelector(images.next);
    this.interval = images.interval;

    var i = 0;

    this.prev = function() {
      this.images[i].className = "";
       i--;
       if( i < 0){
         i = this.images.length - 1;
       }
       this.images[i].className = "shown";
      },

    this.next = function() {
      this.images[i].className = "";
      i++;
      if( i >= this.images.length){
        i = 0;
      }
      this.images[i].className = "shown";
    }

    this.btPrev.addEventListener('click', this.prev.bind(this));
    this.btNext.addEventListener('click', this.next.bind(this));

    setInterval(this.next.bind(this), this.interval);

   }

}*/

$(function () {
	var elWrap = $('#slider'),
		//el =  elWrap.find('img'),
		el =  elWrap.find('li'),
		indexImg = 1,
		indexMax = el.length,
		phase = 3000;
	
	function change () {
		el.fadeOut(500);
		el.filter(':nth-child('+indexImg+')').fadeIn(500);
	}	
		
	function autoCange () {	
		indexImg++;
		if(indexImg > indexMax) {
			indexImg = 1;
		}			
		change ();
	}	
	var interval = setInterval(autoCange, phase);

	elWrap.mouseover(function() {
		clearInterval(interval);
	});
	elWrap.mouseout(function() {
		interval = setInterval(autoCange, phase);
	});
	
	elWrap.append('<span class="next"></span><span class="prev"></span>');
	var	btnNext = $('span.next'),
		btnPrev = $('span.prev');
		
	btnNext.click(function() {
		indexImg++;
		if(indexImg > indexMax) {
			indexImg = 1;
		}
		change ();
	});
	btnPrev.click(function() {
		indexImg--;
		if(indexImg < 1) {
			indexImg = indexMax;
		}
		change ();
	});	
});
