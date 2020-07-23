$(function () {
    
    // Ubicar el cursor en el campo de búsqueda
    var searchLength = $('.poke-search').val().length;
    $('.poke-search').focus();
    $('.poke-search')[0].setSelectionRange(searchLength, searchLength);

    // Cambiar URL del navegador y mostrar indicador de búsqueda en proceso
    $('.poke-search').on('input', function (event) {
        var search = event.target.value.trim().toLowerCase();

        window.history.pushState(null, null, '/' + search);
        $('.ui.search').addClass('loading');
    });

    // Realizar búsqueda con un espacio de 500 ms para evitar saturación de consultas
    $('.poke-search').on('input', debounce(function (event) {
        var search = event.target.value.trim().toLowerCase();

        // Si la búsqueda está vacía, ocultar indicador de búsqueda en proceso y terminar
        if (search.length === 0 || !search.trim()) {
            $('.ui.search').removeClass('loading');
            $('.ui.cards').empty();
            return;
        }

        $.ajax({
            url: '/search/' + search,
            method: 'GET',
        }).done(function(data) {
            $('.ui.search').removeClass('loading');
            $('.ui.cards').replaceWith(data);
        });
    }, 500));

    // Función para espaciar en el tiempo la ejecución de otras funciones
    // Basada en http://underscorejs.org/#debounce
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

});
