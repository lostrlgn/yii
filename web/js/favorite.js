(() => {
    $('#favorite-pjax').on('click', '.btn-favorite', function(e) {
        e.preventDefault()

        const btn = $(this)
        
        $.ajax({
            url: btn.attr('href'),
            success(data) {
                if (data) {
                    $.pjax.reload('#favorite-pjax', {
                        replace: false,
                        push: false, 
                        timeout: 5000
                    })
                }
            }
        })
    })
})