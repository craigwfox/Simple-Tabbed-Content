jQuery(document).ready(function($){
    var transTime = 200, // Controls transition speed
        stcCon = $('.stc-content');

  // Hiding tabs and showing first items
  // This allows for the css not to handle the hiding
  // meaning that if js is disable the content is still shown
    stcCon.hide();
    stcCon.first().show();
    $('.stc-nav-item').first().addClass('stcNav-active');

  // Main Function for the tabbed content
    $('.stc-nav-item').on('click', function(){
      var navItem = $(this),
          clickItem = navItem.attr('data-stc-nav');

      $('.stc-nav-item').removeClass('stcNav-active');
      navItem.addClass('stcNav-active');


      stcCon.fadeOut(transTime).delay(transTime);
      $('div[data-stc-content="'+ clickItem +'"]').fadeIn(transTime * 2);
    });
});