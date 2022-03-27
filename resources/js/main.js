import '../scss/main.scss'
import $ from 'jquery';
import 'bootstrap';

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

$(() => {
    $('#home-page').fadeIn(500)
    $('#curryear').text(new Date().getFullYear())
    var flag = true;

    const handler = function() {
        if(flag){
            flag = false
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
                            flag = true
                        }
                    })
                }
            })

            $(this).addClass('active')
        }
    }

    const openModal = () => {
        $('.header__menu--mobile').removeClass('header__menu--open')
        $('.overlay').fadeIn(1000)
        $('.modal').addClass('modal--show')
    }

    $('.header-menu__link:not(.header-menu__link--auth)').on('click', handler)
    $('.header-menu__link--auth').on('click', openModal)

    $('#signup-btn').on('click', function (e) {
        e.preventDefault()
        $.ajax({
            url:     '/signup',
            type:     "POST",
            data: $("#signup-form").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               if(response.success){
                   $('.modal-alert').empty()
                   $('.modal-alert').html('<div class="alert alert-success">Вы успешно зарегистрировались. Перенаправляем вас в кабинет...</div>')
                   $('.modal-alert').slideDown()
                   setTimeout(function(){
                        document.location = '/user/account'
                    }, 3000)
                }
            },
            error: function(response) {
                $('.modal-alert').empty()
                $('.modal-alert').html('<div class="alert alert-danger">' + response.responseJSON.message + '</div>')
                $('.modal-alert').slideDown()
                setTimeout(function(){
                    $('.modal-alert').slideUp()
                }, 3000)
            }
         });
    })
    $('#login-btn').on('click', function (e) {
        e.preventDefault()
        $.ajax({
            url:     '/login',
            type:     "POST",
            data: $("#login-form").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               if(response.success){
                   $('.modal-alert').empty()
                   $('.modal-alert').html('<div class="alert alert-success">Вы успешно вошли. Перенаправляем вас в кабинет...</div>')
                   $('.modal-alert').slideDown()
                    document.location = '/user/account'
                }
            },
            error: function(response) {
                $('.modal-alert').empty()
                $('.modal-alert').html('<div class="alert alert-danger">' + response.responseJSON.message + '</div>')
                $('.modal-alert').slideDown()
                setTimeout(function(){
                    $('.modal-alert').slideUp()
                }, 3000)
            }
         });
    })
})

$(window).on("scroll", function() {
    if($(this).scrollTop() > 40) {
        $('.header').addClass('header--sticky')
    } else {
        $('.header').removeClass('header--sticky')
    }
});
