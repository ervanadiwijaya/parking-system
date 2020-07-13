(function ($) {
  'use strict';
  $(function () {
    var sidebar = $('.sidebar');
    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required
    // var current2 = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    var current = (location.href).replace(location.origin, '');
    // console.log(location)
    // console.log('current: ' + current)
    $('.nav li a', sidebar).each(function () {
      var $this = $(this);
      var target = $this.attr('href')

      //  remove url parameters
      const remove_param = (str) => {
        if (str.indexOf("?") < 0) {
          return str.substr(0, str.length)
        }
        return str.substr(0, str.indexOf("?"))
      }

      const merge = (target, current) => {
        // check if home
        if (target === '/') {
          return false
        }

        const clear_target = remove_param(target)
        const clear_current = remove_param(current)

        if ((clear_current.split('/')).length > 0) {
          let sisa = clear_current.replace(clear_target, '');
          // return sisa;

          // switch
          if (clear_target + sisa === current) {
            return true
          } else {
            return false
          }
        }

        return false
      }

      if (current === "/") {
        // console.log(true)
        //for root url
        if ($this.attr('href') === current) {
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      } else {

        // console.log('---------------')
        // console.log('target: ' + target)
        // console.log('current: ' + current)
        // console.log(merge(target, current))
        // console.log($this.attr('href'))
        // console.log(target.substr(0, remove_param(target)))

        //for other url
        if (target === current) {
          // console.log($this.attr('href'))
          $(this).parents('.nav-item').last().addClass('active');
          if ($(this).parents('.sub-menu').length) {
            $(this).closest('.collapse').addClass('show');
            $(this).addClass('active');
          }
        }
      }
    })

    //Close other submenu in sidebar on opening any
    sidebar.on('show.bs.collapse', '.collapse', function () {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if ($('.scroll-container').length) {
        const ScrollContainer = new PerfectScrollbar('.scroll-container');
      }
    }

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');


    $(".purchace-popup .popup-dismiss").on("click", function () {
      $(".purchace-popup").slideToggle();
    });
  });
})(jQuery);