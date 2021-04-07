$(document).ready(function() {
  "use strict";

  /* 

	1. Vars and Inits

	*/

  var menuActive = false;
  var header = $(".header");

  setHeader();

  initCustomDropdown();
  initPageMenu();
  initImage();

  $(window).on("resize", function() {
    setHeader();
    featuredSliderZIndex();
    initTabLines();
  });

  /* 

	2. Set Header

	*/

  function setHeader() {
    //To pin main nav to the top of the page when it's reached
    //uncomment the following

    // var controller = new ScrollMagic.Controller(
    // {
    // 	globalSceneOptions:
    // 	{
    // 		triggerHook: 'onLeave'
    // 	}
    // });

    // var pin = new ScrollMagic.Scene(
    // {
    // 	triggerElement: '.main_nav'
    // })
    // .setPin('.main_nav').addTo(controller);

    if (window.innerWidth > 991 && menuActive) {
      closeMenu();
    }
  }

  function initCustomDropdown() {
    if ($(".custom_dropdown_placeholder").length && $(".custom_list").length) {
      var placeholder = $(".custom_dropdown_placeholder");
      var list = $(".custom_list");
    }

    placeholder.on("click", function(ev) {
      if (list.hasClass("active")) {
        list.removeClass("active");
      } else {
        list.addClass("active");
      }

      $(document).one("click", function closeForm(e) {
        if ($(e.target).hasClass("clc")) {
          $(document).one("click", closeForm);
        } else {
          list.removeClass("active");
        }
      });
    });

    $(".custom_list li").on("click", function(ev) {
      ev.preventDefault();
      var index = $(this)
        .parent()
        .index();

      placeholder.text($(this).text()).css("opacity", "1");

      if (list.hasClass("active")) {
        list.removeClass("active");
      } else {
        list.addClass("active");
      }
    });

    $("select").on("change", function(e) {
      placeholder.text(this.value);

      $(this).animate({ width: placeholder.width() + "px" });
    });
  }

  function initModelSlider() {
    if ($(".custom_dropdown_placeholder").length && $(".custom_list").length) {
      var placeholder = $(".custom_dropdown_placeholder");
      var list = $(".custom_list");
    }

    placeholder.on("click", function(ev) {
      if (list.hasClass("active")) {
        list.removeClass("active");
      } else {
        list.addClass("active");
      }

      $(document).one("click", function closeForm(e) {
        if ($(e.target).hasClass("clc")) {
          $(document).one("click", closeForm);
        } else {
          list.removeClass("active");
        }
      });
    });

    $(".custom_list li").on("click", function(ev) {
      ev.preventDefault();
      var index = $(this)
        .parent()
        .index();

      placeholder.text($(this).text()).css("opacity", "1");

      if (list.hasClass("active")) {
        list.removeClass("active");
      } else {
        list.addClass("active");
      }
    });

    $("select").on("change", function(e) {
      placeholder.text(this.value);

      $(this).animate({ width: placeholder.width() + "px" });
    });
  }

  function initPageMenu() {
    if ($(".page_menu").length && $(".page_menu_content").length) {
      var menu = $(".page_menu");
      var menuContent = $(".page_menu_content");
      var menuTrigger = $(".menu_trigger");

      //Open / close page menu
      menuTrigger.on("click", function() {
        if (!menuActive) {
          openMenu();
        } else {
          closeMenu();
        }
      });

      //Handle page menu
      if ($(".page_menu_item").length) {
        var items = $(".page_menu_item");
        items.each(function() {
          var item = $(this);
          if (item.hasClass("has-children")) {
            item.on("click", function(evt) {
              evt.preventDefault();
              evt.stopPropagation();
              var subItem = item.find("> ul");
              if (subItem.hasClass("active")) {
                subItem.toggleClass("active");
                TweenMax.to(subItem, 0.3, { height: 0 });
              } else {
                subItem.toggleClass("active");
                TweenMax.set(subItem, { height: "auto" });
                TweenMax.from(subItem, 0.3, { height: 0 });
              }
            });
          }
        });
      }
    }
  }

  function openMenu() {
    var menu = $(".page_menu");
    var menuContent = $(".page_menu_content");
    TweenMax.set(menuContent, { height: "auto" });
    TweenMax.from(menuContent, 0.3, { height: 0 });
    menuActive = true;
  }

  function closeMenu() {
    var menu = $(".page_menu");
    var menuContent = $(".page_menu_content");
    TweenMax.to(menuContent, 0.3, { height: 0 });
    menuActive = false;
  }

  function initImage() {
    var images = $(".image_list li");
    var selected = $(".image_selected img");

    images.each(function() {
      var image = $(this);
      image.on("click", function() {
        var imagePath = new String(image.data("image"));
        selected.attr("src", imagePath);
      });
    });
  }
});
