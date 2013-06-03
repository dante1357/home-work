/*jshint strict:true, noarg:true, noempty:true, eqeqeq:true, bitwise:true, undef:true, unused:true, nonew:true, browser:true, devel:true, boss:true, curly:false, immed:false, latedef:true, newcap:true, plusplus:false, trailing:true, debug:false, asi:false, evil:false, expr:true, eqnull:false, esnext:false, funcscope:false, globalstrict:false, loopfunc:false */

(function($){
  "use strict";
  var
    $springLi = $('.season1'),
    $summerLi = $('.season2'),
    $fallLi = $('.season3'),
    $winterLi = $('.season4');
  $('.slideshow').each(function(){
    var
      $bodyHeight = $('body').height(),
      $bodyWidth = $('body').width(),
      $slideshow = $(this),
      $train = $slideshow.find('.train'),
      $list = $slideshow.find('li'),
      $slides = $train.find('div'),
      $nextBtn = $slideshow.find('.next'),
      $prevBtn = $slideshow.find('.prev'),
      $op = $slideshow.find('.op'),
      $h1 = $slideshow.find('h1'),
      Timing = 500,
      nextSlideTimeing = 5000,
      autoNext,
      currentSlide=0,
      innerDivsCss = function(){
        $slideshow.css({'height':$bodyHeight});
        $train.css({'width':$bodyWidth*4});
        $slides.css({'width':$bodyWidth});
      },
      fadeS = function(){
        $op.mouseover(function(){
          $(this).stop();
          $h1.stop();
          $(this).animate({'opacity':'0'},Timing);
          $h1.fadeOut(Timing);
        }).mouseout(function(){
          $(this).stop();
          $h1.stop();
          $(this).animate({'opacity':'0.5'},Timing);
          $h1.fadeIn(Timing);
        });
        $nextBtn.mouseover(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0'},Timing);
          $h1.fadeOut(Timing);
        }).mouseout(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0.5'},Timing);
          $h1.fadeIn(Timing);
        });
        $prevBtn.mouseover(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0'},Timing);
          $h1.fadeOut(Timing);
        }).mouseout(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0.5'},Timing);
          $h1.fadeIn(Timing);
        });
        $list.mouseover(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0'},Timing);
          $h1.fadeOut(Timing);
        }).mouseout(function(){
          $('.op').stop();
          $h1.stop();
          $('.op').animate({'opacity':'0.5'},Timing);
          $h1.fadeIn(Timing);
        });
      },
      goToSlide = function(i){
        if(i >= $slides.length) i=0;
        if(i < 0) i = $slides.length-1;
        $list.removeClass('active');
        $list.eq(i).addClass('active');
        $train.animate({'left':i*$bodyWidth*-1},Timing);
        currentSlide = i;
      },
      allKeys = function(){
        $list.click(function(){
          goToSlide( $(this).index() );
        });
        $nextBtn.click(nextSlide);
        $prevBtn.click(prevSlide);
      },
      nextSlide = function(){
        goToSlide(currentSlide+1);
      },
      prevSlide = function(){
        goToSlide(currentSlide-1);
      },
      autoPlay = function(){
        $slideshow.mouseout(function(){
          clearInterval(autoNext);
        }).mouseover(function(){
          autoNext = setInterval(nextSlide,nextSlideTimeing);
        });
      },
      allFunction = function(){
        innerDivsCss();
        fadeS();
        allKeys();
        goToSlide(0);
        autoPlay();
      };
    allFunction();
  });
 $springLi.click(function(){
    $('html, body').animate({scrollTop: $('.spring').offset().top},500);
 });
 $summerLi.click(function(){
    $('html, body').animate({scrollTop: $('.summer').offset().top},500);
 });
 $fallLi.click(function(){
    $('html, body').animate({scrollTop: $('.fall').offset().top},500);
 });
 $winterLi.click(function(){
    $('html, body').animate({scrollTop: $('.winter').offset().top},500);
 });
})(window.Zepto || window.jQuery);