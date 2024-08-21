const editor = $('.editor')
const loader = $('.loader')

const hideEditor = async() => {
    await $.pjax.reload({container: '#pjax-list', timeout : false})
    editor.slideUp(() => {
        $('.to-hide').show()
        $('tr').removeClass('list__row-selected')
        $('body,html').animate({scrollTop: 0}, 'smooth')
        settingListElements()
    })
}

const deleteArticle = async (id) => {
    try {
        await requestDelete(id)
        await hideEditor()
    } catch (e) {
        console.log(e)
    }
}

const settingListElements = () => {
    $('tr').click(function () {
        $('tr').removeClass('list__row-selected')
        $(this).addClass('list__row-selected')
    });
}
settingListElements()

const settingEditorElements = () => {
    settingListElements()

    $('.editor__btn-cancel').off().click(async() => {
        await hideEditor()
    })

    $('.editor__btn-delete').off().click(function () {
        const id = $(this).attr('id');

        const confirmed = confirm('Are you sure?')
        if (confirmed) {
            deleteArticle(id)
        }
    })

    $('#image').change(e => $('.editor__preview').attr('src', URL.createObjectURL(e.target.files[0])))
}

const showEditor = async(id = null) => {
    try {
        $('body,html').animate({scrollTop: 0}, 'smooth')
        loader.show()
        const response = await requestGetEditorTemplate(id)
        $('.editor-content').html(response)
        $('.to-hide').hide()
        editor.slideDown(() => {
            settingEditorElements()
        })
    } catch (e) {
        console.log(e)
    } finally {
        loader.hide()
    }

    $('#pjax-editor').on('pjax:end', async() => {
        if ($('#pjax-editor').text() !== 'success') {
            settingEditorElements()
            return
        }

        await hideEditor()
        settingListElements()
    })
}