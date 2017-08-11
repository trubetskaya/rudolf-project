/**
 * Created by aleksandra on 19.07.17.
 */

$( document ).ready(function() {
    /**
     * Управление прозрачностью зафиксированного навигационного меню
     * если это необходимо
     */
    if ($('nav').data('transparent')) {
        if ($(window).scrollTop() > (650 -70)) {
            $('nav').removeClass('transparent');
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() > (650 -70)) {
                $('nav').removeClass('transparent');
            } else {
                $('nav').addClass('transparent');
            }
        });
    }

   $("select").dropdown();
    $("input[type=checkbox], input[type=radio]").checkbox();
});