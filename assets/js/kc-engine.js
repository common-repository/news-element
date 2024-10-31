(function ($) {
 
			var magListss = $('.xl-mag-wrap'); 
			var id2 	= '';
			magListss.each(function(){
				var el 		= $(this);
				var topbar	= el.find('.kb-filter-bar');
				var drDown	= el.find('.kb_more_list');
				var btns	= topbar.find('a');
				var pag		= el.find('.khobish_pagination');
				var id 		= pag.data('id');
				var loader_htm = '<div class="load-wrap"><div class="loader"></div></div>';

				var post_count = topbar.data('post-count');
				var xlopt	= topbar.data('xlopt');
				var pagi_type = xlopt['pagi_type'];
				 
				btns.on('click',function(){
					var element = $(this);
					var pagi_type = 'onlyapend';
					//console.log(pagi_type);
					if(element.hasClass('active')) {return false;}
					id2 = element.data('ajax-catid');
					btns.removeClass('active');
					drDown.removeClass('active');
					element.addClass('active');
					if(element.parent().parent().parent().parent().hasClass('kb_more_list')){
						drDown.addClass('active');
					}
					var parent = topbar.parent();
					parent.find('.khobish-ajax-wrap').append(loader_htm);
					parent.find('.khobish-ajax-wrap').addClass('loading');
					doAjaxCall(id2, 1, parent,xlopt,pagi_type);
					pag.attr('data-id',id2);
					pageNumber = 1;
					return false;

				});
				var el2 = el.find('.khobish_pagination');
				var wrapper = el2.parent();
				var pageNumber = 1;
				
				el2.find('a.next').on('click', function(){
					if($(this).hasClass('inactive')) {return false;}
					wrapper.find('.khobish-ajax-wrap').addClass('loading');
					var currentcat = topbar.find('a.active').data('ajax-catid');
					pageNumber++;
					//console.log(pagi_type);
					if ( pagi_type === 'prev_next' ){
						wrapper.find('.khobish-ajax-wrap').append(loader_htm);
					}
					if ( pagi_type === 'load_more' ){
						$(this).addClass('xlspin');
					}					
					doAjaxCall(currentcat, pageNumber, wrapper,xlopt,pagi_type);
					return false;
				});
				el2.find('a.prev').on('click', function(){
					if($(this).hasClass('inactive')) {return false;}
					wrapper.find('.khobish-ajax-wrap').addClass('loading');
					var currentcat = topbar.find('a.active').data('ajax-catid');
					pageNumber--;	
					if ( pagi_type === 'prev_next' ){
						wrapper.find('.khobish-ajax-wrap').append(loader_htm);
					}									
					doAjaxCall(currentcat, pageNumber, wrapper,xlopt,pagi_type);
					return false;
				});
			});

		// AJAX CALL
		function doAjaxCall(currentCategory, page, wrapper,xlopt,pagi_type){

			var requestData = {
				action: 'khobish_filter_tax',
				nonce: newselement.nonce,
				khobish_fn_cat: currentCategory,
				khobish_fn_page: page,
				xlxtra_data:xlopt
			};
			
			$.ajax({
				type: 'POST',
				url: newselement.ajaxurl,
				cache: true,
				data: requestData,
				success: function(data, textStatus, XMLHttpRequest) {
					KhobishAjaxProcess(data,wrapper,pagi_type);

				},
				error: function(MLHttpRequest, textStatus, errorThrown) {
					console.log('Error');
				}
			});	
		};
		
		function KhobishAjaxProcess(data, wrapper,pagi_type){
			//console.log(pagi_type);
			var fnQueriedObj = $.parseJSON(data);
			if ( pagi_type === 'load_more' ){
				wrapper.find('.khobish-ajax-wrap').append(fnQueriedObj.xl_fn_data);
				wrapper.find('.next').removeClass('xlspin');
			} else {
				wrapper.find('.khobish-ajax-wrap').html(fnQueriedObj.xl_fn_data);
				wrapper.find(".khobish-ajax-wrap .anim-fade").velocity("transition.slideDownIn", { stagger: 150 });
			}
			wrapper.find('.khobish-ajax-wrap').removeClass('loading');
            if ( wrapper.find('.khobish-ajax-wrap').hasClass('mason-on')) {
                var contain = wrapper.find('.khobish-ajax-wrap');
                //contain.imagesLoaded(function() {
                    contain.masonry({
                        itemSelector: '.masonitm',
                        isAnimated: false,
                        transitionDuration: 0
                    });
                //});

                contain.masonry('reloadItems');
                contain.masonry('layout');

				contain.imagesLoaded( function() {
				  contain.masonry('layout');
				});

            }

			
			//hide or show prev
			if ( true === fnQueriedObj.khobish_fn_hide_prev ) {
				wrapper.find('.khobish_pagination a.prev').addClass('inactive');
			} else {
				wrapper.find('.khobish_pagination a.prev').removeClass('inactive');
			}

			//hide or show next
			if ( true === fnQueriedObj.khobish_fn_hide_next ) {
				wrapper.find('.khobish_pagination a.next').addClass('inactive');
			} else {
				wrapper.find('.khobish_pagination a.next').removeClass('inactive');
			}
		};			



		$('.khbcommentload').click( function(){
				var button = $(this);
		 
				// decrease the current comment page value
				cpage--;
		 
				$.ajax({
					url : ajaxurl, // AJAX handler, declared before
					data : {
						'action': 'cloadmore', // wp_ajax_cloadmore
						'post_id': parent_post_id, // the current post
						'cpage' : cpage, // current comment page
					},
					type : 'POST',
					beforeSend : function ( xhr ) {
						button.text('Loading...'); // preloader here
					},
					success : function( data ){
						if( data ) {
							$('ol.commentlist').append( data );
							button.text('More comments'); 
							 // if the last page, remove the button
							if ( cpage == 1 )
								button.remove();
						} else {
							button.remove();
						}
					}
				});
				return false;
			});


	  var ThmBgCar2 = function ($scope, $) {
  
        $scope.find('.khobishthmbslider2').each(function () {

		    var slider_elem = $(this);
		    var data_container = $(this).find("> div");
		    var settings = data_container.data('slick');

	        var prev = slider_elem.find('.khbprev');
	        var next = slider_elem.find('.khbnxt');
			data_container.slick({
				arrows: true,
				fade: true,
				infinite: true,
				speed: 10,				
				autoplay: true,
				autoplaySpeed: 500,										
			}); 
			next.click(function() {
				data_container.slickPrev();
			});
        });

    };

	  var KhbTaxLyst2 = function ($scope, $) {

	    $scope.find('.khbtaxlist2').each(function () { 

	    	var slider_elem = $(this);
	    	if ( slider_elem.hasClass('grid') ){
	    		return;
	    	}

	        var settings = $(this).data('slick');
	        var prev = slider_elem.parent().parent().find('.khbnxt');
	        var next = slider_elem.parent().parent().find('.khbprev');

	          $(this).owlCarousel({
	            margin: settings['itmsp'],
	            loop: true, 
	            dots: false,
	            autoplay: settings['auto'],
	            autoplayTimeout: settings['speed'],	            	            
	            nav: false,
	            navText: [prev,next],
			    responsive:{
			        480:{
			            items:2,
			        },			    	
			        768:{
			            items:settings['item_tab'],
			        },
			        1024:{
			            items:settings['items'],
			        },			        
			    }	            
	          });

	    });    

	  };

	  var ThmBgCar = function ($scope, $) {

	    $scope.find('.xldthumbgpost').each(function () { 

	        var settings = $(this).data('slick');
	        var slider_elem = $(this);
	        var prev = slider_elem.parent().parent().find('.khbnxt');
	        var next = slider_elem.parent().parent().find('.khbprev');

	          $(this).owlCarousel({
	            margin: settings['space'],
	            center:settings['center'],
	            loop: true, 
	            dots: true,
	            autoplay: settings['auto'],
	            autoplayTimeout: settings['speed'],	            	            
	            nav: true,
	            navText: [prev,next],
			    responsive:{
			        480:{
			            items:1,
			        },			    	
			        768:{
			            items:settings['item_tab'],
			        },
			        1024:{
			            items:settings['items'],
			        },			        
			    }	            
	          });

	    });    

	  };


	  var ThmCar = function ($scope, $) {

	    $scope.find('.news24-swiper').each(function () { 

	        var settings = $(this).find('.swiper-wrapper').data('slick');
	        var prev = $(this).find('.khbprev');
	        var nxt = $(this).find('.khbnxt');
			var pagination = $(this).find('.swiper-pagination');

            var options = {

               loop: true,
               navigation: {
                    nextEl: prev[0],
                    prevEl: nxt[0],
                }, 		
                 pagination: {
                    el: pagination[0],
                    clickable: true,
                    type: 'bullets',
                },		

                 breakpoints: {
                    480: {
                        slidesPerView: 1,
                    }
                }, 																
                //mousewheel: true,
            };

			if ( settings['item_tab']){
				var dataOptions = {
					breakpoints: {
						768: {
							slidesPerView: settings['item_tab'],
						}
					}
				}
				options = $.extend({}, options, dataOptions)
			}

			if (settings['items']){
				var dataOptions = {
					breakpoints: {
						1025: {
							slidesPerView: settings['items'],
						}
					}
				}
				options = $.extend({}, options, dataOptions)
			}

			if (settings['space']){
				var dataOptions = {
					spaceBetween: settings['space'],
				}
				options = $.extend({}, options, dataOptions)
			}

			if (settings['center']){
				var dataOptions = {
					centeredSlides: settings['center'],
				}
				options = $.extend({}, options, dataOptions)
			}

			if (settings['transition']){
				var dataOptions = {
					effect: settings['transition'],
				}
				options = $.extend({}, options, dataOptions)
			}

			if ( settings['auto'] ){		
				var dataOptions = {
					autoplay: {
						delay: settings['speed'],
						enabled: true,					
					}
				}
				options = $.extend({}, options, dataOptions)
			}

			if ('undefined' === typeof Swiper) {
                const asyncSwiper = elementorFrontend.utils.swiper;
                new asyncSwiper($(this), options).then((newSwiperInstance) => {
                    var swiper = newSwiperInstance;
                });

            } else {
                var swiper = new Swiper($(this), options);
            }

	    });    

	  };

	  var KhoTick = function ($scope, $) {
		$scope.find('.trending-now').each(function () {
			var slider_elem = $(this).find('.post-ticker');
			var settings = slider_elem.data('slick');
			var prev = $(this).find('.newsticker-prev');
			var nxt = $(this).find('.newsticker-next');			
			slider_elem.slick({
				slidesToShow: settings['items'],
				slidesToScroll: 1,
				autoplay: settings['auto'],
				autoplaySpeed: settings['speed'],
				variableWidth: settings['var_width'],
				vertical: settings['vertical'],
				speed: 0,
				arrows: true,
				prevArrow: prev,
				nextArrow: nxt,
				fade: settings['transition'],								
			});
		});
	  };

	  var KhoCcarsl = function ($scope, $) {

	    $scope.find('.khobish-cntr-sldr').each(function () { 

	        var slider_elem = $(this);
	        var settings = slider_elem.data('slick');

	        var prev = slider_elem.parent().parent().find('.khbnxt');
	        var next = slider_elem.parent().parent().find('.khbprev');
            var options = {
                spaceBetween: 10,
                loop: true,
                centeredSlides: true,
                navigation: {
                    nextEl: next[0],
                    prevEl: prev[0]
                },	
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    type: 'bullets',
                },							
                breakpoints: {
                    1025: {
                        slidesPerView: 2.5,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    480: {
                        slidesPerView: 1,
                    },
                },
            };

			if (settings['speed']){
				options.autoplay = settings['speed'];
			}

            if ('undefined' === typeof Swiper) {
                const asyncSwiper = elementorFrontend.utils.swiper;
                new asyncSwiper(slider_elem, options).then((newSwiperInstance) => {
                    var swiper = newSwiperInstance;
                });

            } else {
                var swiper = new Swiper(slider_elem, options);
            }  
	    });    

	  };

	  var ThmSync = function ($scope, $) {

	    $scope.find('.khobishsync').each(function () { 

	        var slider_elem = $(this);        
	        var settings = slider_elem.data('xld');
	        var prev = slider_elem.find('.khbprev');
	        var nxt = slider_elem.find('.khbnxt');
		    var sliderImages = slider_elem.find('.sync1');
		    var sliderThumbnails = slider_elem.find('.sync2');
		    
		    var sliderConfiguration = {
		        arrows: true,
		        prevArrow: nxt,
		        nextArrow: prev,		        
		        asNavFor: slider_elem.find('.slider'),
		        autoplay: settings['auto'],
		        speed: 500,
		        autoplaySpeed: settings['speed'],
		        fade: settings['transition'],
		    } 
			
		    
		    var sliderThumbnailsConfig = $.extend( {}, sliderConfiguration, {
		        slidesToShow: settings['items'],
		        focusOnSelect: true,
		        centerMode: settings['center'],
		        fade: false,
		        responsive: [
		            {
		              breakpoint: 1025,
		              settings: {
		                slidesToShow:settings['tabitem'],
		                centerMode: false,
		              }
		            },
		            {
		              breakpoint: 768,
		              settings: {
		                slidesToShow:2,
		                centerMode: false,
		              }
		            }
		        ] 		        
		    });
		    
		    sliderImages.slick(sliderConfiguration);   
		    sliderThumbnails.slick(sliderThumbnailsConfig);


	    });    

	  };


	  var VidPlayList = function ($scope, $) {

	    $scope.find('.khobishvidplaylist').each(function () { 

	        var slider_elem = $(this);        
	        var settings = slider_elem.data('xld');

		    const sliderThumbnails = slider_elem.find('.slider--thumbnails');
		    
		    const sliderConfiguration = {
		        arrows: false,
		        autoplay: settings['auto'],
		        speed: 500,
		        autoplaySpeed: settings['speed'],
		        slidesToShow: settings['item'],
		        focusOnSelect: true,
		        vertical:settings['vertical'],
		          responsive: [
		            {
		              breakpoint: 1025,
		              settings: {
		                slidesToShow:settings['item_tab'],
		              }
		            },
		            {
		              breakpoint: 768,
		              settings: {
		                slidesToShow:3,
		              }
		            }
		          ]		        
		    } 
		    
		    sliderThumbnails.slick(sliderConfiguration);   

	    });    
	  };

	  var KhbThmcar2 = function ($scope, $) {

	    $scope.find('.khobishthumbsync').each(function () { 

	        var slider_elem = $(this);        
	        var settings = slider_elem.data('xld');
	        var prev = slider_elem.find('.khbprev');
	        var nxt = slider_elem.find('.khbnxt');

		    const sliderImages = slider_elem.find('.slider--images');
		    const sliderThumbnails = slider_elem.find('.slider--thumbnails');
		    
		    const sliderConfiguration = {
		        arrows: true,
		        prevArrow: prev,
		        nextArrow: nxt,		        
		        asNavFor: slider_elem.find('.slider'),
		        autoplay: settings['auto'],
		        speed: 500,
		        autoplaySpeed: settings['speed'],
		        fade: settings['fade'],
		    } 
		    
		    const sliderThumbnailsConfig = $.extend( {}, sliderConfiguration, {
		        slidesToShow: settings['item'],
		        focusOnSelect: true,
		        centerMode: settings['center'],
		        fade: false,
		        responsive: [
		            {
		              breakpoint: 1025,
		              settings: {
		                slidesToShow:settings['item_tab'],
		                centerMode: false,
		              }
		            },
		            {
		              breakpoint: 768,
		              settings: {
		                slidesToShow:settings['item_mob'],
		                centerMode: false,
		              }
		            }
		        ] 		        
		    });
		    
		    sliderImages.slick(sliderConfiguration);   
		    sliderThumbnails.slick(sliderThumbnailsConfig);

	    });    
	  };

	  var ThmVSync = function ($scope, $) {

	    $scope.find('.khobishvsync').each(function () { 

	        var slider_elem = $(this);        
	        var settings = slider_elem.data('xld');
	        //console.log(settings);

		    const sliderImages = slider_elem.find('.slider--images');
		    const sliderThumbnails = slider_elem.find('.slider--thumbnails');
		    
		    const sliderConfiguration = {
		        arrows: false,
		        asNavFor: slider_elem.find('.slider'),
		        autoplay: settings['auto'],
		        speed: 500,
		        autoplaySpeed: settings['speed'],
		        fade: true,
		        center: true,
		    } 
		    
		    const sliderThumbnailsConfig = $.extend( {}, sliderConfiguration, {
		        slidesToShow: settings['items'],
		        slidesToScroll: 1,
		        focusOnSelect: true,
		        fade: false,
		        vertical:true,

		    });
		    
		    sliderImages.slick(sliderConfiguration);   
		    sliderThumbnails.slick(sliderThumbnailsConfig);

	    });    
	  };

    var MasonGridBg = function ($scope, $) {

/*        $scope.find('.khobish-ajax-wrap').each(function () {
		    if ( $(this).hasClass('mason-on') ) {
		        var contain = $(this);
		        console.log(contain);
		        contain.imagesLoaded(function() {
		            contain.masonry({
		                itemSelector: '.masonitm',
		                isAnimated: false,
		                transitionDuration: 0
		            });
		        });
		    }

        });*/

    };


    var KhbpstShare = function ($scope, $) {

        $scope.find('.xld_share_post').each(function () {
             var togle = $(this).find('.xld_btn-toggle');
             var main = $(this);
             togle.on('click', function(e){
                main.toggleClass("show-secondary");
                e.preventDefault();
            });

        });

    };


    var KhbSlider2 = function ($scope, $) {

        $scope.find('.khobish-slider-two').each(function () {

		    var slider_elem = $(this);
		    var color_target = slider_elem.find('.swiper-slide');
		    var settings = slider_elem.data('xld');

	        var swiper = new Swiper(slider_elem, {
	             // effect: settings['effect'],
	              loop: false,
	              centeredSlides: settings['center'],
	              slidesPerView: settings['items'],
	              keyboardControl: true,
	              mousewheel: settings['mouse'],
	              lazyLoading: true,
	              preventClicks: false,
	              preventClicksPropagation: false,
	              lazyLoadingInPrevNext: true,
	              autoplay: {
	                delay: settings['speed'],
	                enabled: settings['auto'],
	              },
			      navigation: {
			        nextEl: '.khbprev',
			        prevEl: '.khbnxt',
			      },
	              pagination: {
	                el: ".swiper-pagination",
	                clickable: true,
	                type: 'bullets',
	              },			      
	              loop: true,
	              breakpoints: {

	                  767: {
	                      slidesPerView: settings['item_tab'],
	                      spaceBetween: 10,
	                  },
	                  575: {
	                      slidesPerView: 1,
	                      spaceBetween: 5,
	                  }
	              },	              

	            });

        });

    };


    var KhbSlider4 = function ($scope, $) {
  
        $scope.find('.khobish-four-slide').each(function () {

		    var slider_elem = $(this);
		    var data_container = $(this).find("> div");
		    var settings = data_container.data('xld'); 
		    var prev = slider_elem.find('.khbprev');
	        var nxt = slider_elem.find('.khbnxt');      
	        var centerpad = settings['centerpadding'] + 'px';

		    const sliderThumbnails = slider_elem.find('.slider--thumbnails');
		    
		    const sliderConfiguration = {

		        autoplay: settings['auto'],
		        speed: 500,
		        autoplaySpeed: settings['speed'],
		        slidesToShow: settings['item'],
		        focusOnSelect: true,
		        vertical:settings['vertical'],
		        centerPadding: centerpad,
		        fade: settings['transition'],
		        dots: true,
		        centerMode: settings['center'],
		        arrows: true,
		        prevArrow: nxt,
		        nextArrow: prev,		        
		          responsive: [
		            {
		              breakpoint: 1025,
		              settings: {
		                slidesToShow:settings['item_tab'],
		                centerMode: false,
		              }
		            },
		            {
		              breakpoint: 768,
		              settings: {
		                slidesToShow:1,
		                centerMode: false,
		              }
		            }
		          ]		        
		    } 
		    
		    sliderThumbnails.slick(sliderConfiguration); 

        });

    };


    var KhbSlider6 = function ($scope, $) {
  
        $scope.find('.khobish-slider-six-wrap').each(function () {

		    var slider_elem = $(this).find('.khobish-slider-six');
		    var data_container = $(this).find("> div");
		    var settings = data_container.data('xld');

	        var prev = slider_elem.find('.khbprev');
	        var next = slider_elem.find('.khbnxt');
			var pagination = slider_elem.find('.swiper-pagination');

            var options = {
                spaceBetween: settings['space'],
                loop: true,
                navigation: {
                    nextEl: prev[0],
                    prevEl: next[0],
                },	
	
                autoplay: {
                    delay: settings['speed'],
                    enabled: settings['auto'],
                },										
                mousewheel: true,
                breakpoints: {
                    1025: {
                        slidesPerView: settings['item'],
                    },
                    768: {
                        slidesPerView: settings['item_tab'],
                    },
                    480: {
                        slidesPerView: 1,
                    },
                },
            };

			if ('undefined' === typeof Swiper) {
                const asyncSwiper = elementorFrontend.utils.swiper;
                new asyncSwiper(slider_elem, options).then((newSwiperInstance) => {
                    var swiper = newSwiperInstance;
                });

            } else {
                var swiper = new Swiper(slider_elem, options);
            }   

        });

    };

    var KhbSlider5 = function ($scope, $) {
  
        $scope.find('.khobish-slider-five-wrap').each(function () {

		    var slider_elem = $(this).find('.khobish-slider-five');
		    var data_container = $(this).find("> div");
		    var settings = data_container.data('xld');

	        var prev = slider_elem.find('.khbprev');
	        var next = slider_elem.find('.khbnxt');
			var pagination = slider_elem.find('.swiper-pagination');

            var options = {
                spaceBetween: settings['margin'],
                loop: true,
                centeredSlides: settings['center'],
                navigation: {
                    nextEl: prev[0],
                    prevEl: next[0],
                },	
                pagination: {
                    el: pagination[0],
                    clickable: true,
                    type: 'bullets',
                },	
                autoplay: {
                    delay: settings['speed'],
                    enabled: settings['auto'],
                },										
                mousewheel: true,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: settings['item_tab'],
                    },
                    1025: {
                        slidesPerView: settings['item'],
                    },										
                },
            };

			if ('undefined' === typeof Swiper) {
                const asyncSwiper = elementorFrontend.utils.swiper;
                new asyncSwiper(slider_elem, options).then((newSwiperInstance) => {
                    var swiper = newSwiperInstance;
                });

            } else {
                var swiper = new Swiper(slider_elem, options);
            }

        });

    };

    var KhbhvrTax = function ($scope, $) {

        $scope.find('.khbtaxlist').each(function () {
             var hvrelm = $(this).find('li');

			  hvrelm.mouseover(function(){
			      var $this = $(this);
			      var color = $this.find('.tag-cat').data('color');
			      var maintrgt = $this.find('.khbcat');
			      //console.log(color);
			      maintrgt.css('color', color);
			    }
			  ); 

			  hvrelm.mouseout(function(){
			      var $this = $(this);
			      var color = $this.find('.tag-cat').data('color');
			      var maintrgt = $this.find('.khbcat');
			      //console.log(color);
			      maintrgt.css('color', 'initial');
			    }
			  );

             
        });

    };

    var KhbBlogComment = function ($scope, $) {
  
        $scope.find('.khb-commentwrap').each(function () {

		   $(this).find(".khbcomment-field").wrapAll('<div class="inr"></div>');

        });

    };

	  var KhbPostGalSync = function ($scope, $) {

	    $scope.find('.content-builder').each(function () { 

	        var slider_elem = $(this).find('.khbpostgallaerysync');        
	        var settings = slider_elem.data('xld');
	        
	        if (typeof settings  !== "undefined"){

		        var prev = slider_elem.find('.khbprev');
		        var nxt = slider_elem.find('.khbnxt');
			    const sliderImages = slider_elem.find('.khbpostmain');
			    const sliderThumbnails = slider_elem.find('.khbpostsync');		        

			    const sliderConfiguration = {
			        arrows: true,
			        prevArrow: nxt,
			        nextArrow: prev,		        
			        asNavFor: slider_elem.find('.slider'),
			        autoplay: settings['auto'],
			        speed: 500,
			        autoplaySpeed: settings['speed'],
			    } 
			    
			    const sliderThumbnailsConfig = $.extend( {}, sliderConfiguration, {
			        slidesToShow: settings['items'],
			        focusOnSelect: true,
			        fade: false,
			        arrows:false, 		

			          responsive: [
			            {
			              breakpoint: 768,
			              settings: {
			                slidesToShow:settings['itemstab'],
			                centerMode: false,
			              }
			            }
			          ]	

			    });
			    
			    sliderImages.slick(sliderConfiguration);   
			    sliderThumbnails.slick(sliderThumbnailsConfig);

	        }


	        var float_me = $(this).find('.sidebar'); 
	        if (float_me.length ) {

				var floatPosStart = float_me.offset().top - parseFloat(float_me.css('marginTop').replace(/auto/, 0));

				var leftPos  = float_me[0].getBoundingClientRect().left   + $(window)['scrollLeft']();

				var floatPosEnd = $(this).offset().top + $(this).innerHeight() - float_me.outerHeight(true);

				  $(window).scroll(function () {
				    var y = $(this).scrollTop();
				    if (y >= floatPosStart && y <= floatPosEnd) {
				      float_me.removeClass('sidebar-top').addClass('sidebar-fixed').css("left", leftPos);
				    } else if ( y >= floatPosEnd){
				      float_me.removeClass('sidebar-fixed').addClass('sidebar-bottom').removeAttr('style');
				    } else {
				      float_me.removeClass('sidebar-fixed').addClass('sidebar-top').removeAttr('style');
				    }
				  });
			  
			}

	    });    

	  };

    $(document).on('click','.khobishvidplaylist .slider__item', function(event) {

        var me = $(this);
        //$(this).addClass("current").siblings().removeClass("current");
        xl_load_video(me);
    });

    //$(".khobishvidplaylist .slider--images").fitVids();

	  function xl_load_video(me) {
	        var xlurl = me.data('url');
	        var loader_htm = '<div class="load-wrap"><div class="loader"></div></div>';
	        var container = me.parent().parent().parent().parent().parent().parent().parent().prev().find('.slider--images');
	        container.append(loader_htm);
	        container.addClass('loading');

	        data = {
	            'action':'xl_vid_playlist',
	            'xlurl':xlurl,
	        }; 
	        $.ajax({
	            url: newselement.ajaxurl, // AJAX handler
	            data: data,
	            type: 'POST',
	            success: function(data) {              
	                if (data) {
	                   container.html(data);   
	                   container.removeClass('loading');
	                   $(".khobishvidplaylist .slider--images").fitVids();
	                   $(".khobishvidplaylist .slider--images").fitVids({ customSelector: "iframe[src^='http://dailymotion.com']"});
	                }
	            },


	        });

	    }

    $(document).on('click','.khb-single-video-poster .khbpopvideo', function(event) {

        var khb_url = $(this).data('url');
        var khb_parent = $(this).parent();
        var khb_wrap = $(this).parent().find('.khb-video-inner');
        

        data = {
            'action':'xl_vid_playlist',
            'xlurl':khb_url,
        }; 
        $.ajax({
            url: newselement.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
			beforeSend : function ( xhr ) {
				khb_parent.addClass('loading');
				khb_wrap.append('<div class="load-wrap"><div class="loader"></div></div>');
			},            
            success: function(data) {              
                if (data) {
                   khb_wrap.html(data);
                   khb_wrap.fitVids();   
                   khb_parent.removeClass('loading');
                }
            },


        });

    });

	    var KhbLoader = function ($scope, $) {
	      $scope.find('.khobishpreloader').each(function () {
	        var slider_elem = $(this);
	        $('body').removeClass('khbloaderactive');
	        var dElay = slider_elem.data('delay');
	        $(this).delay(dElay).queue('fx', function() {
	          $(this).addClass('loaded');
	        });
	      });

	    };

	    var Ne_Sticky_Column = function ($scope, $) {
			

			if ( $scope.hasClass('ne_sticky_column-yes')) {

				var $target  = $scope,
				settings = $target.data( 'settings' ),
				width = $("body").width(),
				stickyInstanceOptions = {
					topSpacing: settings['ne_top_spacing'],
					bottomSpacing: 50,
					containerSelector: '.elementor-section',
					innerWrapperSelector: '.elementor-widget-wrap'
				};
			

			if ( width > 1024 ) {

					stickyInstance = new StickySidebar( $target[0], stickyInstanceOptions );


			} 

			};
		  };


        $('.khobish-fullshare .xld_share_post').each(function () {
             var togle = $(this).find('.xld_btn-toggle');
             var main = $(this);
             togle.on('click', function(e){
                main.toggleClass("show-secondary");
                e.preventDefault();
            });

        });

		var XlMegamenu = function ($scope, $) {

			$scope.find('.khobishnav').each(function () {
				var slider_elem = $(this);
	
	/*            $('.navbar-toggle').on('click',function(){
					$('body').removeClass('menu-is-closed').addClass('menu-is-opened');
				});*/
	
				var hclass = $scope.find('.khobishnav');
				var hclassanim = $scope.find('.xlmega-sticky-wrapper');
	
				if (hclass.hasClass('xlmega-sticky')){
	
					 var c, currentScrollTop = 0;
	
					 $(window).scroll(function () {
						var a = $(window).scrollTop();
						var b = hclassanim.height();
					   
						currentScrollTop = a;             
	
						if (c < currentScrollTop && a > b + b) {
						  hclassanim.addClass("scrollUp");
						  var trnsht = 'translateY('+'-'+b+'px'+')';
						  hclassanim.css("transform", trnsht);
						} else if (c > currentScrollTop && !(a <= b)) {
						  hclassanim.removeClass("scrollUp");
						  hclassanim.css("transform", "none");
						}
						c = currentScrollTop;
	
						if (a > (b+150)){
						  hclassanim.addClass("fixed");
						} else {
						  hclassanim.removeClass("fixed");
						}
						
					});
	
				}
	
	
			  $('.navbar-toggle,.search-toggle').on('click',function(){
				var target = $(this);
				//console.log(target);
				if ( target.is( ".navbar-toggle" ) ) {
				  slider_elem.removeClass('menu-is-closed').addClass('menu-is-opened');
				} else {
				  slider_elem.removeClass('search-is-closed').addClass('search-is-opened');
				}
				
			  });
	
				$('.close-menu, .click-capture').on('click', function(){
				  slider_elem.removeClass('menu-is-opened search-is-opened').addClass('menu-is-closed search-is-closed');
				  $('.momenu-list ul').slideUp(300);
				});
	
				var a = $(".momenu-list");
				a.length && (a.children("li").addClass("menu-item-parent"), a.find(".menu-item-has-children > a").on("click", function(e) {
					e.preventDefault();
					$(this).toggleClass("opened");
					var n = $(this).next(".sub-menu"),
						s = $(this).closest(".menu-item-parent").find(".sub-menu");
					a.find(".sub-menu").not(s).slideUp(250), n.slideToggle(250)
				}));
							
				$('#my-s').keyup(function() {
					if ($.trim($("#my-s").val()).length > 0) {
						xlmega_ajaxsearch();
						$(".searching").addClass('loading');
						}
				});
		
			});
	
		};
				
    // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {

        if (elementorFrontend.isEditMode()) { 

        	elementorFrontend.hooks.addAction('frontend/element_ready/khbpgldr.default', KhbLoader);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_carousel.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_ticker.default',KhoTick);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thmpost.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thmbgpost.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbtslydr2.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thbsync.default',ThmSync);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_vthbsync.default',ThmVSync);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_txtcrsl.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbthumbsyn2.default',KhbThmcar2);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_cntrsld.default',KhoCcarsl);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbvidplay.default',VidPlayList);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_pshar.default', KhbpstShare);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbtxlyst.default', KhbhvrTax);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr2.default', KhbSlider2);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr4.default', ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr5.default', KhbSlider5);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr6.default', KhbSlider6);
             

            elementorFrontend.hooks.addAction('frontend/element_ready/khbtxlyst2.default', KhbTaxLyst2);
            elementorFrontend.hooks.addAction('frontend/element_ready/kbsh-msbgg.default', MasonGridBg);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbpcmmnt.default',KhbBlogComment);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbthmpstcont.default',KhbPostGalSync);
			elementorFrontend.hooks.addAction('frontend/element_ready/xlmega1.default', XlMegamenu);
        }

        else {

        	elementorFrontend.hooks.addAction('frontend/element_ready/khbpgldr.default', KhbLoader);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_carousel.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_ticker.default',KhoTick);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thmpost.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thmbgpost.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbtslydr2.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_thbsync.default',ThmSync);
            elementorFrontend.hooks.addAction('frontend/element_ready/ae_vthbsync.default',ThmVSync);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_txtcrsl.default',ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbthumbsyn2.default',KhbThmcar2);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_cntrsld.default',KhoCcarsl);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbvidplay.default',VidPlayList);
            
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_pshar.default', KhbpstShare);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbtxlyst.default', KhbhvrTax);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr2.default', KhbSlider2);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr4.default', ThmCar);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr5.default', KhbSlider5);
            elementorFrontend.hooks.addAction('frontend/element_ready/khb_slydr6.default', KhbSlider6);
     
            elementorFrontend.hooks.addAction('frontend/element_ready/khbtxlyst2.default', KhbTaxLyst2);
            elementorFrontend.hooks.addAction('frontend/element_ready/kbsh-msbgg.default', MasonGridBg); 
            elementorFrontend.hooks.addAction('frontend/element_ready/khbpcmmnt.default',KhbBlogComment);
            elementorFrontend.hooks.addAction('frontend/element_ready/khbthmpstcont.default',KhbPostGalSync);
			elementorFrontend.hooks.addAction('frontend/element_ready/xlmega1.default', XlMegamenu);

			//TODO: Sticky sidebar
			//elementorFrontend.hooks.addAction('frontend/element_ready/column', Ne_Sticky_Column);

        }
    });



    if ( $('.khobish-ajax-wrap').hasClass('mason-on') ) {

        $('.khobish-ajax-wrap.mason-on').imagesLoaded(function() {
            $('.khobish-ajax-wrap.mason-on').masonry({
                itemSelector: '.masonitm',
                isAnimated: false,
                transitionDuration: 0
            });
        });
    }


	$('body').on('click', '.khbbtnsubs', function(e) {
	    e.preventDefault();
	    var email	= $(this).parent().find('#email').val();
	    var main	= $(this).parent().parent();
	    if(isEmail(email)) {
	    	main.addClass('onloader');
	        var data = {
	            'action': 'subscribe_user',
	            'email': email,
	            'security': aw.security
	        };
	  
	        $.post(aw.ajaxurl, data, function(response) {
	        	main.removeClass('onloader');
	            if (response == 200) {
	                main.find('.mailchimpresponse').html('You have subscribed successfully.').hide().fadeIn().delay(3000).fadeOut();
	            } else {
	                main.find('.mailchimpresponse').html(response).hide().fadeIn().delay(3000).fadeOut();
	            }
	        });
	    } else {
	        main.find('.mailchimpresponse').html('This is not a valid email');
	    }
	});

	  
	function isEmail(email) {
	    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    return regex.test(email);
	}

	//$(".ne-page-loader-wrap").fadeOut("slow");

})(jQuery);