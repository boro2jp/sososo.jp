
$('#blog-pickup-list').slick({
    dots: true,
    arrows: true,
    centerMode: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 3000,
    // swipe: true,
    // speed: 100,
    centerPadding: '0',
    speed: 500,
    lazyLoad: 'progressive',
    // variableWidth: true,
    cssEase: "ease-out",
    pauseOnFocus: false,
    pauseOnHover: false,
    appendArrows: "#section-top-key-visual__arrow",
    appendDots: "#section-top-key-visual__dots",
    prevArrow: "<div class='arrow-list-item white'><i class='fa-sharp fa-solid fa-chevron-left'></i></div>",
    nextArrow: "<div class='arrow-list-item white'><i class='fa-sharp fa-solid fa-chevron-right'></i></div>",
    responsive:[
        {
            breakpoint: 2100,
            settings:{
                initialSlide: 0,
                slidesToShow: 4,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings:{
                initialSlide: 0,
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            centerPadding: '0px',
            settings:{
                initialSlide: 0,
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }
    ]
});

$('#hamburger').on('click', function(){
    $('#sp-menu').addClass('active');
    $('#sp-menu-close').addClass('active');
    $('#grayscale').addClass('active');
});

$('#grayscale, #sp-menu-close').on('click', function(){
    $('#sp-menu').removeClass('active');
    $('#sp-menu-close').removeClass('active');
    $('#grayscale').removeClass('active');
});

$(function(){
    // #で始まるa要素をクリックした場合に処理（"#"←ダブルクォーテンションで囲むのを忘れずに。忘れるとjQueryのバージョンによっては動かない。。）
    $('a[href^="#"]').click(function(){
        // 移動先を0px調整する。0を30にすると30px下にずらすことができる。
        var adjust = 0;
        // スクロールの速度（ミリ秒）
        var speed = 300;
        // アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
        var href= $(this).attr("href");
        // 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
        var target = $(href == "#" || href == "" ? 'html' : href);
        // 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
        var position = target.offset().top + adjust;
        // スムーススクロール linear（等速） or swing（変速）
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });
});

// #page-topをクリックした際の設定
$('#go-top').click(function () {
    $('body,html').animate({
        scrollTop: 0//ページトップまでスクロール
    }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
    return false;//リンク自体の無効化
});
