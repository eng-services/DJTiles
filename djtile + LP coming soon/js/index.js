$(document).ready(function () {
  var imgs = [
    {
      image: "images/main-bg5.jpg",
      title: "Four Seasons Residences @ 706 Mission",
    },
    {
      image: "images/main-bg2.jpg",
      title: "Salesforce Tower",
    },
    {
      image: "images/main-bg6.jpg",
      title: "Four Seasons Residences @ 706 Mission",
    },
    {
      image: "images/main-bg7.jpg",
      title: "Four Seasons Residences @ 706 Mission",
    },
    {
      image: "images/main-bg8.jpg",
      title: "Four Seasons Residences @ 706 Mission",
    },
    {
      image: "images/main-bg9.jpg",
      title: "Four Seasons Residences @ 706 Mission",
    },
    // {
    //   	'image':'images/main-bg4.jpg',
    //    'title': 'Salesforce East'
    // },
  ];
  var randbg = imgs[Math.floor(Math.random() * imgs.length)],
    img = randbg.image,
    title = randbg.title;
  //console.log(randbg.image);
  $(".box-img-header").css("background-image", "url(" + img + ")");
  $(".banner-title").html(title);
  
  ///////////////// Coming soon /////////////////
  $("body").on("click", ".imagen-galeria", function () {
    console.log("click imagen galeria");
  })

  $("body").on("click", ".imagen-galeria", function () {
    console.log("click imagen galeria" + $(this).attr("data-pop"));
    $(".cont-frame-cont .img-pop img").attr("src", "./images/galeria-hydro/Finishes/" + $(this).attr("data-pop"));
    $(".pop-up-finishes").fadeIn("slow");
  });
  $("body").on("click", ".icon-close", function () {
    $(".pop-up-finishes").fadeOut("slow");
  });

  $("body").on("click", ".menu-galeria-hydro > div", function () {
    $(".menu-galeria-hydro > div").removeClass("active");
    $(this).addClass("active");
    let partesMenuNum = $(this).attr("data-element").split("-")
    console.log(partesMenuNum[1]);
    $(".galeria-inside").removeClass("active").animate({
      opacity: 0
    }, 300);
    $("#galeria-" + partesMenuNum[1]).addClass("active").animate({
      opacity: 1
    }, 300);
  });

  $("body").on("click", ".cont-text-links-tabs", function () {
    $(".cont-text-links-tabs").removeClass("active");
    $(this).addClass("active");
    let partesMenuNum = $(this).attr("data-element").split("-");
    //console.log(partesMenuNum[1]);
    $(".cont-tab-info .tabs-element").removeClass("active").animate({
      opacity: 0
    }, 300);
    let heightAjuste = $(".tab-info-" + partesMenuNum[1]).height();
    $(".cont-tab-info").animate({
      height: heightAjuste + "px"
    });
    $(".tab-info-" + partesMenuNum[1]).addClass("active").animate({
      opacity: 1
    }, 300);
  });

  $("body").on("click", ".cont-strech-frames .cont-frame", function (e) {
    e.preventDefault();
    let objTogo = $(this).attr("data-go");
    let topGo = $('#' + objTogo).offset().top - 20;
    let body = $("html, body");
    body.stop().animate({ scrollTop: topGo }, 500, 'swing', function () { });

  })


  $(window).resize(function () {
    let numero = $(".cont-text-links-tabs.active").attr("data-element").split("-");
    //console.log(numero[1]);
    let heightAjuste = $(".tab-info-" + numero[1]).height();
    $(".cont-tab-info").animate({
      height: heightAjuste + "px"
    });
  });

  ///////////////
});
