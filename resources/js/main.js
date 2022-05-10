import '../scss/main.scss'
import $ from 'jquery';
import 'bootstrap';
import videojs from 'video.js';

global.jQuery = $;
global.$ = $;

$('.header__mobile-menu-btn').on('click', () => {
    $('.header__menu--mobile').toggleClass('header__menu--open')
    $('body').css({overflow: 'hidden'})
    $('.overlay').fadeToggle(1000)
})
$('.overlay').on('click', () => {
    $('.overlay').fadeOut(500);
    $('.header__menu--mobile').removeClass('header__menu--open')
    $('.modal').removeClass('modal--show')
    $('body').css({overflowY: 'scroll'})
})

$('.close-modal').on('click', () => {
    $('.overlay').fadeOut(500);
    $('.modal').removeClass('modal--show')
})

function handler() {
    $('.header-menu__link:not(.header-menu__link--auth)').off('click', handler)
    $('.header-menu__link').removeClass('active')
    $('.header__menu--mobile').removeClass('header__menu--open')
    $('body').css({overflowY: 'scroll'})
    $('.overlay').fadeOut(500);
    const page = $(this).data('page')
    $('.page.page--active').fadeOut({
        duration: 500,
        complete: () => {
            $(`.header__menu`).removeClass('header__menu--dark')
            if(page != 'home-page'){
                $(`.header__menu`).addClass('header__menu--dark')
            }
            $('.page.page--active').removeClass('page--active')
            $(`#${page}`).fadeIn({
                duration: 500,
                complete: () => {
                    $(`#${page}`).addClass('page--active')
                    $('.header-menu__link:not(.header-menu__link--auth)').on('click', handler)
                }
            })
        }
    })

    $(this).addClass('active')
}

function setActivePage(page){
    $('.header-menu__link:not(.header-menu__link--auth)').off('click', handler)
    $('.page.page--active').fadeOut({
        duration: 500,
        complete: () => {
            $(`#${page}`).fadeIn({
                duration: 500,
                complete: () => {
                    $(`.header__menu`).removeClass('header__menu--dark')
                    if(page != 'home-page'){
                        $(`.header__menu`).addClass('header__menu--dark')
                    }
                    $(`#${page}`).addClass('page--active')
                    $('.header-menu__link:not(.header-menu__link--auth)').on('click', handler)
                }
            })
            $('.header__menu a').removeClass('active')
            $(`a[data-page=${page}]`).addClass('active')
        }
    }).removeClass('page--active')
}

$(() => {

    const hash = window.location.hash.substr(1);

    const pages = ['about-page', 'course-page', 'reviews-page']

    if(pages.includes(hash)){
        setActivePage(hash)
    } else {
        $('#home-page').fadeIn(500)
    }

    if($('.video-js').length){
        videojs(document.querySelector('.video-js'));
    }

    $('#curryear').text(new Date().getFullYear())

    const openModal = () => {
        $('.header__menu--mobile').removeClass('header__menu--open')
        $('.overlay').fadeIn(1000)
        $('.modal').addClass('modal--show')
    }

    $('.header-menu__link:not(.header-menu__link--auth)').on('click', handler)
    $('.header-menu__link--auth').on('click', openModal)

    $('#about-btn').on('click', setActivePage.bind(this, 'about-page'))
    $('#course-btn').on('click', setActivePage.bind(this, 'course-page'))
})

$(window).on("scroll", function() {
    if($(this).scrollTop() > 40) {
        $('.header').addClass('header--sticky')
    } else {
        $('.header').removeClass('header--sticky')
    }
});
