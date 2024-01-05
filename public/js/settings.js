(function($) {
  'use strict';
  $(function() {
    $(".nav-settings").on("click", function() {
      $("#right-sidebar").toggleClass("open");
    });
    $(".settings-close").on("click", function() {
      $("#right-sidebar,#theme-settings").removeClass("open");
    });

    $("#settings-trigger").on("click" , function(){
      $("#theme-settings").toggleClass("open");
    });


    //background constants
    var navbar_classes = "navbar-danger navbar-success navbar-warning navbar-dark navbar-light navbar-primary navbar-info navbar-pink";
    var sidebar_classes = "sidebar-light sidebar-dark";
    var $body = $("body");
    var sidebar_theme = localStorage.getItem('sidebar_theme');
    var navbar_theme = localStorage.getItem('navbar_theme');

    function changeTheme(){
    if (sidebar_theme === 'dark') {
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-dark");
      $(".sidebar-bg-options").removeClass("selected");
      var a = document.getElementById('sidebar-dark-theme');
      a.classList.add('selected');
    } else {
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-light");
      $(".sidebar-bg-options").removeClass("selected");
      var a = document.getElementById('sidebar-light-theme');
      a.classList.add('selected');
    }
    
    if (navbar_theme === 'primary') {
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-primary");
      $(".tiles").removeClass("selected");
      $(".tiles.primary").addClass("selected");
    } else if(navbar_theme === 'success'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-success");
      $(".tiles").removeClass("selected");
      $(".tiles.success").addClass("selected");
    } else if(navbar_theme === 'warning'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-warning");
      $(".tiles").removeClass("selected");
      $(".tiles.warning").addClass("selected");
    } else if(navbar_theme === 'danger'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-danger");
      $(".tiles").removeClass("selected");
      $(".tiles.danger").addClass("selected");
    } else if(navbar_theme === 'light'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-light");
      $(".tiles").removeClass("selected");
      $(".tiles.light").addClass("selected");
    } else if(navbar_theme === 'info'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-info");
      $(".tiles").removeClass("selected");
      $(".tiles.info").addClass("selected");
    } else if(navbar_theme === 'dark'){
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-dark");
      $(".tiles").removeClass("selected");
      $(".tiles.dark").addClass("selected");
    } else{
      $(".navbar").removeClass(navbar_classes);
      $(".tiles").removeClass("selected");
      $(".tiles.default").addClass("selected");
    }
    }

    changeTheme();

    //sidebar backgrounds
    $("#sidebar-light-theme").on("click" , function(){
      localStorage.setItem('sidebar_theme', 'light');
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-light");
      $(".sidebar-bg-options").removeClass("selected");
      $(this).addClass("selected");
    });
    $("#sidebar-dark-theme").on("click" , function(){
      localStorage.setItem('sidebar_theme', 'dark');
      $body.removeClass(sidebar_classes);
      $body.addClass("sidebar-dark");
      $(".sidebar-bg-options").removeClass("selected");
      $(this).addClass("selected");
    });


    //Navbar Backgrounds
    $(".tiles.primary").on("click" , function(){
      localStorage.setItem('navbar_theme', 'primary');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-primary");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.success").on("click" , function(){
      localStorage.setItem('navbar_theme', 'success');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-success");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.warning").on("click" , function(){
      localStorage.setItem('navbar_theme', 'warning');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-warning");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.danger").on("click" , function(){
      localStorage.setItem('navbar_theme', 'danger');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-danger");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.light").on("click" , function(){
      localStorage.setItem('navbar_theme', 'light');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-light");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.info").on("click" , function(){
      localStorage.setItem('navbar_theme', 'info');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-info");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.dark").on("click" , function(){
      localStorage.setItem('navbar_theme', 'dark');
      $(".navbar").removeClass(navbar_classes);
      $(".navbar").addClass("navbar-dark");
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
    $(".tiles.default").on("click" , function(){
      localStorage.setItem('navbar_theme', 'default');
      $(".navbar").removeClass(navbar_classes);
      $(".tiles").removeClass("selected");
      $(this).addClass("selected");
    });
  });
})(jQuery);
