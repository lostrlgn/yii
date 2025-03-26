$(() => {
    $('#catalog-pjax').on('click', '.btn-catalog', function(e) {
        e.preventDefault()
        const btn = $(this)

        $.ajax({
            url: btn.attr('href'),
            success(data) {
                if (data) {
                    btn.html( data.status
                        ? '🧡'
                        : '🤍'
                    )
                }
            }
        })
    })
})

