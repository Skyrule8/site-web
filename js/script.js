    $(function () {
      "use strict";
      var div = document.getElementById("test");
      div.style.fill = 'black'
      var sidebarIconToggle = document.getElementsByClassName('sidebarIconToggle')[0];
      var open = document.getElementById("openSidebarMenu");
      var test = document.getElementsByClassName("spinner")[0];
      var test1 = document.getElementsByClassName("spinner")[1];
      var test2 = document.getElementsByClassName("spinner")[2];


      function uncheckBox() {
        var isChecked = $("#openSidebarMenu").prop("checked");
        if (isChecked) {
          $("#openSidebarMenu").prop("checked", false);
          div.style.fill = 'black'
          test.style.visibility = 'visible'
          test1.style.visibility = 'visible'
          test2.style.visibility = 'visible'
          sidebarIconToggle.style.cursor = 'pointer'
          setTimeout(() => {  open.disabled = false; }, 1);
        }
      }

      $("body").on("click", function () {
        uncheckBox();
        div.style.fill = 'black'
        test.style.visibility = 'visible'
        test1.style.visibility = 'visible'
        test2.style.visibility = 'visible'
        sidebarIconToggle.style.cursor = 'pointer'
        setTimeout(() => {  open.disabled = false; }, 1);
      });

      $("#openSidebarMenu,label").on("click", function (e) {
        e.stopPropagation();
        div.style.fill = 'white'
        test.style.visibility = 'hidden'
        test1.style.visibility = 'hidden'
        test2.style.visibility = 'hidden'
        sidebarIconToggle.style.cursor = 'default' 
        setTimeout(() => {  open.disabled = true; }, 1);
      });
    });

    $(function() {
      $(window).scroll(function () {
       if ($(this).scrollTop() > 50) {
        $('spinner').addClass('colorChange')
      } 
      if ($(this).scrollTop() < 50) {
        $('spinner').removeClass('colorChange')
      } 
    });
    });